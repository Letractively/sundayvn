<?php

class KhachhangCanhanController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
     public $layout = '//layouts/main';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'dangnhap','dangky','captcha'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('admin','create', 'update','delete'),
                'roles' => array('canhan'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
            array(
            'captcha' => array(
                'class'    =>    'CCaptchaAction',
                'backColor'    =>'#fff'
            ),
            )                  
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new KhachhangCanhan;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['KhachhangCanhan'])) {
            $model->attributes = $_POST['KhachhangCanhan'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->idKhachhang_canhan));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['KhachhangCanhan'])) {
            $model->attributes = $_POST['KhachhangCanhan'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->idKhachhang_canhan));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('KhachhangCanhan');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new KhachhangCanhan('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['KhachhangCanhan']))
            $model->attributes = $_GET['KhachhangCanhan'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = KhachhangCanhan::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'khachhang-canhan-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionDangnhap() {
        $model = new DangnhapForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'dangnhap-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['DangnhapForm'])) {
            $model->attributes = $_POST['DangnhapForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }

        $this->render('dangnhap', array('model' => $model));
    }

    public function actionDangky() {
        $model = new Dangkiform;
        if($model->Gioi_tinh==NULL)
             $model->Gioi_tinh=0;
         if($model->Ladoanhgnhiep==NULL)
             $model->Ladoanhgnhiep=0;


            // $model->Gioi_tinh=0;
     // echo Yii::app()->getBaseUrl(true).'/images/user/upload/';
      //  echo Yii::app()->getBasePath().'\model';
        
         //echo $dir;
         //$dir = Yii::getPathOfAlias('webroot.images');
              //    echo $dir;

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'RegisterForm') {
           
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['Dangkiform'])) {
            $model->attributes = $_POST['Dangkiform'];

            if(isset($_POST['Ngay_sinh'])){

                 $temp=$_POST['Ngay_sinh'];

                     $model->Ngay_sinh=$temp;
                  }

                 

            //==== upload file

             $model->image=CUploadedFile::getInstance($model,'image');

             if($model->image)
             {
                 $model->Url_anh_dai_dien=$model->image;


             }

              
         
            
           
            if ($model->validate()) {



                if ($model->hasExistUserName()) {
                    $model->addError('Ten_dang_nhap', 'Tên đăng nhập đã tồn tại');
                   $this->render('dangkymoi', array('model' => $model));
                } elseif ($model->hasExistEmail()) {
                   $model->addError('Email', 'Email đã tồn tại');
                    $this->render('dangkymoi', array('model' => $model));
                } else {
                                   
                   $model->insert();
                 
                  $dir = Yii::getPathOfAlias('webroot.images\user\upload\\');
                 // echo $dir;
                  if($model->Url_anh_dai_dien)
                         $model->image->saveAs($dir.$model->Url_anh_dai_dien);
                 if($model->Ladoanhgnhiep==1)
                    $model->insertToThongtin_doanhnghiep();

             

                // redirect to success page
                     
                    $this->render('dangkymoi', array('model' => $model));

                }
                return;
            }
        }
        $this->render('dangkymoi', array('model' => $model));
    }

    public function actions() {
       return array(
            'captcha'    =>    array    (
                                        'class'    =>    'CCaptchaAction'
                                        


                                    ),
              
            );
    }

}
