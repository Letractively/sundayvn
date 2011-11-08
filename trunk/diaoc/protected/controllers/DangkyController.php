<?php

class DangkyController extends Controller
{
	public function actionAddnew()
	{
           
               //$theTime = date("D M j G:i:s T Y");
           //     $myName = "My name is Kid";
           // $this->render('Addnew',array('time'=>$theTime,'name'=>$myName));
           // $this->layout="colum1";
		$this->render('Addnew');
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