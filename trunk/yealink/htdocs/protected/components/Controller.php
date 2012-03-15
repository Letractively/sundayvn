<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
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
	
	
	public function __construct($id,$module=null){
		parent::__construct($id,$module);
	}
	
	public function beforeAction($action){
		
		$route = array();
		$module = $this->getAction()->getController()->getModule();
		if( $module )
			$route["module"] = $module->getId();
			
		$route["controller"] = $this->getId();
		$route["action"] = $this->getAction()->getId();
		$current_action = implode('/', $route);
		
		$route["action"] = "*";
		$current_controller = implode('/', $route);
		
		$excludes = Yii::app()->params["requireLoginExcludes"];
		
		if (Yii::app()->user->isGuest && !in_array($current_action, $excludes) &&  !in_array($current_controller, $excludes)) {
	    	Yii::app()->user->returnUrl = Yii::app()->getRequest()->getRequestUri();	    		    	
	        Yii::app()->user->loginRequired();
	        return false;
	    }	    
	    
	    return true;
	}
	
	
}