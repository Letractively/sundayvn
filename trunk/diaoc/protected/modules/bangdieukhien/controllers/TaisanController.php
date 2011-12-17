<?php

class TaisanController extends Controller
{
    public function actionIndex()
    {
        $this->forward('dangtaisan');

    }
    public function actionDangTaiSan()
    {
                //dang ky css cho module nay
        $cs = Yii::app()->getClientScript();
        //css chung cho module
        $module_url = App::getAbsoluteBaseUrl() . '/css/bangdieukhien/dang_taisan.css'; 
        $cs->registerCssFile($module_url);
        $this->render('dangtaisan');
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