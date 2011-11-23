<?php
/**
* Controller is the customized base controller class.
* All controller classes for this application should extend from this base class.
*/
class Controller extends CController
{/**
    * @var string the default layout for the controller view. Defaults to '//layouts/column1',
    * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
    */
    //public $layout='//layouts/column1';
    /**
    * @var array context menu items. This property will be assigned to {@link CMenu::items}.
    */
    public $menu=array();
    /**
    * @var array the breadcrumbs of the current page. The value of this property will
    * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
    * for more details on how to specify this property.
    */
    public $breadcrumbs=array();

    public function init()
    {
        $cs = App::getClientScript();
        $baseURL = App::getAbsoluteBaseUrl();
        $cs->registerCssFile ( $baseURL . '/css/addons.css' );
        $cs->registerCssFile ( $baseURL . '/css/main.css' );
        $cs->registerCssFile ( $baseURL . '/css/form.css' );
        $cs->registerCssFile ( $baseURL . '/css/star-light.css' );
        $cs->registerCssFile ( $baseURL . '/css/redmond/jquery-ui-1.8.16.custom.css' ); 
        $cs->registerScriptFile( $baseURL . "/js/jquery-ui-1.8.16.custom.min.js" );
        $cs->registerScriptFile( $baseURL . "/js/common-script.js" );
    }
    
    //
    //    public function beforeAction()
    //    {
    //dang ky css cho module nay
    //        $cs = App::getClientScript();

    //        $baseURL = App::getAbsoluteBaseUrl();
    //        
    //        Yii::app()->clientScript->registerCssFile ( $baseURL . '/css/main.css' );

    //    }
}	