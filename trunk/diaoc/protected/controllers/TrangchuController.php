<?php

class TrangchuController extends Controller
{
    
    
	public function actionIndex()
	{
        $cs = App::getClientScript();
        //đẩy script lên thẻ head
        $cs->registerScriptFile(App::getAbsoluteBaseUrl() . '/js/jquery.bxSlider.min.js');
       	$this->render('index');
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
    
    public function actionDangxuat()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }
    
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}