<?php

class DefaultController extends Controller
{
    public function actionIndex($page=1)
    {	
        $contact_model = new Contact();
        $user_id = Yii::app()->user->id;

        $page  = $page < 1 ? 1 : $page;
        $pageSize = 15;
        $data = $contact_model->get_all_contacts($user_id, ($page-1)*$pageSize, $pageSize);		

        $this->render('index', array(
        "contacts"=>$data["results"], 
        "total"=>$data["total"], 
        "page"=>$page, 
        "pageSize"=>$pageSize));
    }
    public function actionCreate()
    {
        $intUserId = Yii::app()->user->id;
        if (!empty($_POST['FormContact']))
        {
            $attr = array();
            foreach ($_POST['FormContact'] as $k=>$v)
            {
                $attr[$k] = $v;
            }
            $model = new FormContact();
            $model->setAttributes($attr);
            if($model->validate())
            {
                //ok create now
                $arrayModelData = $model->getAttributes();
                $modelUserContact = new UserContact();
                $modelUserContact->user_id = $intUserId;
                $modelUserContact->name = $arrayModelData['name'];
                $modelUserContact->account = $arrayModelData['account'];
                $modelUserContact->created_timestamp = date('Y-m-d H:i:s');
                $modelUserContact->save();
                $arrayModelData['id'] = ($modelUserContact->attributes['id']);
                if (!empty($arrayModelData['phone']))
                {
                    $objPhone = new UserContactPhone();
                    $objPhone->user_contact_id = $arrayModelData['id'];
                    $objPhone->phone = $arrayModelData['phone'];
                    $objPhone->save();
                }
                if (!empty($arrayModelData['address']))
                {
                    $objCAddress = new UserContactAddress();
                    $objCAddress->user_contact_id = $arrayModelData['id'];
                    $objCAddress->address = $arrayModelData['address'];
                    $objCAddress->save();
                }
                if (!empty($arrayModelData['email']))
                {
                    $objCEmail = new UserContactEmail();
                    $objCEmail->user_contact_id = $arrayModelData['id'];
                    $objCEmail->email = $arrayModelData['email'];
                    $objCEmail->save();
                }
                //clear data and generate new form
                $this->redirect($this->createUrl('default/index'));
            }
        }
        else
        {
            $model = new FormContact();
        }
        $this->render('crud',array(
        'model'=>$model
        ));
    }
    public function actionEdit()
    {
        $intUserId = Yii::app()->user->id;
        $model = new FormContact();
        $intId = intval($_GET['id']);
        $attr = array();
        $userContact = UserContact::model()->findByPk($intId);
        if ($userContact->attributes['user_id']!= $intUserId)
        {
            $this->redirect($this->createUrl('default/index'));
        }
        if ($userContact) 
        {
            $attr['name'] = $userContact->attributes['name'];
            $attr['account'] = $userContact->attributes['account'];
        }
        $userContactEmail = UserContactEmail::model()->find(" `user_contact_id`='$intId'");
        if ($userContactEmail)
        {
            $attr['email'] = $userContactEmail->attributes['email'];
        }
        $userContactAddress = UserContactAddress::model()->find(" `user_contact_id`='$intId'");
        if ($userContactAddress)
        {
            $attr['address'] = $userContactAddress->attributes['address'];
        }
        $userContactPhone = UserContactPhone::model()->find(" `user_contact_id`='$intId'");

        if ($userContactPhone)
        {
            $attr['phone'] = $userContactPhone->attributes['phone'];
        }
        if (Yii::app()->request->isPostRequest)
        {
            foreach ($_POST['FormContact'] as $k=>$v)
            {
                $attr[$k] = $v;
            }

            $attr['account'] = $userContact->attributes['account'];

            $model->setAttributes($attr);
            if ($model->validate())
            {

                $userContact->name = $attr['name'];

                if (!empty($attr['email']) && !$userContactEmail)
                {

                    $userContactEmail = new UserContactEmail();
                    $userContactEmail->user_contact_id = $intId;
                }
                $userContactEmail->email = $attr['email'];
                if (!empty($attr['address']) && !$userContactAddress)
                {
                    $userContactAddress = new UserContactAddress();
                    $userContactAddress->user_contact_id = $intId;
                }
                if (!empty($attr['phone']) && !$userContactPhone)
                {
                    $userContactPhone = new UserContactPhone();
                    $userContactPhone->user_contact_id = $intId;
                }
                $userContact->save();
                if($userContactEmail)
                {
                    $userContactEmail->email = $attr['email'];
                    $userContactEmail->save();
                }
                if($userContactAddress)
                {
                    $userContactAddress->address = $attr['address'];
                    $userContactAddress->save();
                }
                if($userContactPhone)
                {
                    $userContactPhone->phone = $attr['phone'];
                    $userContactPhone->save();
                }
                 $this->redirect($this->createUrl('default/index'));
            }
        }

        $model->setAttributes($attr);
        $this->render('crud',array(
        'model' => $model
        ));
    }
    public function actionDelete()
    {
        $intUserId = Yii::app()->user->id;
        $id = intval($_GET['id']);
        $userContact=UserContact::model()->findByPk($id); 
        if ($userContact->attributes['user_id'] != $intUserId)
        {
            $this->redirect($this->createUrl('default/index'));
    
        }
     
        $id = intval($_GET['id']);

        if ($userContact)
            $userContact->delete();
        $UserContactAddress=UserContactAddress::model()->find(" `user_contact_id` = '{$id}'"); 
        if ($UserContactAddress)
            $UserContactAddress->delete();        
        $UserContactEmail=UserContactEmail::model()->find(" `user_contact_id` = '{$id}'"); 
        if ($UserContactEmail)
            $UserContactEmail->delete();
        $UserContactPhone=UserContactPhone::model()->find(" `user_contact_id` = '{$id}'"); 
        if ($UserContactPhone)
            $UserContactPhone->delete();
        $this->redirect($this->createUrl('default/index'));
    }
}