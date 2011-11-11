<?php

class UserController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
    
    public function actionlogin()
    {
        $result = KhachhangCanhan::model()->findByAttributes(array('Ten_dang_nhap'=>'hqduy31912'));
        echo "<pre>";
        print_r($result);
        echo "</pre>";
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