<?php
  	/*
  	* @author anguyen
  	* @date Mar 3, 2012
  	*/
class RequireLogin extends CBehavior
{
	public function attach($owner)
	{
	    $owner->attachEventHandler('onBeginRequest', array($this, 'handleBeginRequest'));
	}
	
	public function handleBeginRequest($event)
	{
		$excludes = Yii::app()->params["requireLoginExcludes"];		
		
		$controller = Yii::app()->controller->id;
		$action = Yii::app()->controller->action->id;
		$r = $controller."/".$action;
		var_dump($r); exit;
	    if (Yii::app()->user->isGuest && !in_array($r, $excludes)) {
	    	Yii::app()->user->returnUrl = $r;	    		    	
	        Yii::app()->user->loginRequired();
	    }
	}
}