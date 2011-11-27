<?php

class DefaultController extends Controller
{
    public $layout='//layouts/quantri';
    
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }
    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('index','update'),
                'roles'=>array('admin'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }
	public function actionIndex()
	{   
        $curpage = Yii::app()->controller->module->id;
        $this->render('index',array('curpage'=>$curpage));
	}
}