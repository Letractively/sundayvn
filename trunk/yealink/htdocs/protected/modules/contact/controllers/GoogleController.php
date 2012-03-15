<?php
/*
* @author anguyen
* @date Mar 4, 2012
*/
class GoogleController extends Controller
{
    protected $config = null;
    protected $cache_key = '';

    public function __construct($id,$module=null){
        parent::__construct($id,$module);

        $this->config = Yii::app()->params["contact"]["google"];

        $this->cache_key = "_google_feed_".Yii::app()->user->id;

    }

    public function actionIndex()
    {
        $base_url = $this->config["auth_url"];

        $params = array(
        "scope" => $this->config["scope"],
        "response_type" => $this->config["response_type"],
        "client_id" => $this->config["client_id"],
        "redirect_uri" => $this->config["redirect_uri"],
        "access_type" => 'offline',        
        );

        $url = $base_url."?".http_build_query($params);


        $error = isset($_GET["error"]) ? $_GET["error"] : "";
        $errors = array();
        $feed = false;
        if( $error ){
            $errors[] = "Error: You have denied the access permission.";
        }else{
            //$feed = isset(Yii::app()->session["_google_feed"]) ? Yii::app()->session["_google_feed"] : false;
            $feed = Yii::app()->cache->get($this->cache_key);
        }

        $this->render('index', array("url"=>$url, "feed"=>$feed, "errors"=>$errors));
    }	

    public function actionImport(){
        $feed = Yii::app()->cache->get($this->cache_key);	
        if (!empty($_POST['selected']) && Yii::app()->request->isAjaxRequest)
        {
            $strselected = $_POST['selected'];
            $pieces = explode("|", $strselected);
            foreach ($pieces as &$p)
            {
                $p = intval($p);
            }
            $feedTemp = array();
            foreach ($feed->contacts as $k=>$v)
            {
                if (in_array($k,$pieces))
                {
                    $feedTemp[] = $v;
                }
            }
            $feed->contacts = $feedTemp;
        }
        
        $phone_total = 0;
        $email_total = 0;
        $address_total = 0;
        $phone_imported = 0;
        $email_impoted = 0;
        $address_imported = 0;

        if( $feed ){		
            $unknown_name = "_noname_";
            $idx = 0;
            foreach ($feed->contacts as $contact){
                $idx ++;
                $phone_total += count($contact->phones);
                $email_total += count($contact->emails);
                $address_total += count($contact->addresses);

                $contact_model = new UserContact();

                $contact_model->name = empty($contact->title) ? $unknown_name.$idx : $contact->title;				
                $contact_model->user_id = Yii::app()->user->id;
                $contact_model->account = $feed->id;
                $contact_model->created_timestamp = date('Y-m-d H:i:s');
                $existed = $contact_model->is_existed();

                if( $existed ){
                    $contact_model = $existed[0];
                }else{
                    $contact_model->save();
                }

                foreach($contact->phones as $p){
                    $model = new UserContactPhone();
                    $model->phone = $p;
                    $model->user_contact_id = $contact_model->id;
                    $existed = $model->is_existed();
                    if( empty($existed)  ){
                        $model->save();
                        $phone_imported ++ ;
                    }
                }

                foreach($contact->emails as $p){
                    $model = new UserContactEmail();
                    $model->email = $p;
                    $model->user_contact_id = $contact_model->id;
                    $existed = $model->is_existed();
                    if( empty($existed)  ){
                        $model->save();
                        $email_impoted ++;
                    }
                }

                foreach($contact->addresses as $p){
                    $model = new UserContactAddress();
                    $model->address = $p;
                    $model->user_contact_id = $contact_model->id;
                    $existed = $model->is_existed();
                    if( empty($existed)  ){
                        $model->save();
                        $address_imported ++;
                    }
                }
            }
        }

        Yii::app()->cache->delete($this->cache_key);

        $arr = array(
        "phone" => array("total"=>$phone_total, "imported"=>$phone_imported),
        "email" => array("total"=>$email_total, "imported"=>$email_impoted),
        "address" => array("total"=>$address_total, "imported"=>$address_imported),
        );

        echo json_encode($arr);

        return true;
    }


    public function actionCallback()
    {	
      
        $error = isset($_GET["error"]) ? $_GET["error"] : "";
        if( $error ){
            $this->redirect($this->createUrl('google/index')."?error=".$error);
        }

        $code = isset($_GET["code"]) ? $_GET["code"] : "";

        $access_token_arr = $this->get_access_token($code);		

        $feed = $this->retrieve_contacts($access_token_arr->access_token);

        //Yii::app()->session["_google_feed"] = $feed;
        Yii::app()->cache->set($this->cache_key, $feed);

        $this->redirect($this->createUrl('google/index'));
    }

    public function retrieve_contacts($access_token){

        $contact_url = $this->config["contact_url"];

        $params = array(
        "access_token" => $access_token,
        "alt"=>"json"
        );

        $contact_url .= "?".http_build_query($params);

        $curl = new Curl();
        $curl->option('SSL_VERIFYPEER',false);
        $curl->create($contact_url);
        $content = $curl->execute();

        $response = json_decode($content);

        $feed = $response->feed;

        $t = '$t';
        $obj = new stdClass();
        $obj->id = $feed->id->$t;
        $obj->title = $feed->title->$t;
        $obj->contacts = array();

        foreach ($feed->entry as $e){
            $contact = new stdClass();

            $_email = 'gd$email';
            $_phone = 'gd$phoneNumber';
            $_address = 'gd$postalAddress';
            $contact->id = $e->id->$t;
            $contact->updated = $e->updated->$t;
            $contact->title = $e->title->$t;
            $contact->emails = array();
            $contact->phones = array();
            $contact->addresses = array();

            if( isset($e->$_email) ){
                foreach ($e->$_email as $p)
                    $contact->emails[] = $p->address;
            }

            if( isset($e->$_phone)){
                foreach($e->$_phone as $p)
                    $contact->phones[] = $p->$t;
            }

            if( isset($e->$_address)){
                foreach($e->$_address as $p)
                    $contact->addresses[] = $p->$t;
            }

            $obj->contacts[] = $contact;
        }

        return $obj;
    }

    public function get_access_token($code){
        $request_token_url = $this->config["request_token_url"];		

        $params = array(
        "code" => $code,
        "scope" => $this->config["scope"],
        "client_secret" => $this->config["client_secret"],
        "client_id" => $this->config["client_id"],
        "redirect_uri" => $this->config["redirect_uri"],
        "grant_type" => "authorization_code",

        );

        $curl = new Curl();
        $curl->option('SSL_VERIFYPEER',false);
        $curl->create($request_token_url);

        $curl->post($params);				
        $content = $curl->execute();
		
        return json_decode($content);
    }
	 public function actionGAC(){
	    $request_token_url = $this->config["request_token_url"];		

        $params = array(
       
        "scope" => $this->config["scope"],
        "client_secret" => $this->config["client_secret"],
        "client_id" => $this->config["client_id"],
		  "refresh_token" => "1/-SCjaO0Jd3OhsX-7u1vXrPjMegbtcjKybjKJtJMqeWw",
       // "redirect_uri" => $this->config["redirect_uri"],
        "grant_type" => "refresh_token",
      

        );

        $curl = new Curl();
        $curl->option('SSL_VERIFYPEER',false);
 
        $curl->create($request_token_url);

        $curl->post($params);				
        $content = $curl->execute();
		$curl->debug();die;
		var_dump($content);
        return json_decode($content);
	 }
}