<?php

class BangdieukhienModule extends CWebModule
{
    public function init()
    {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application

        // import the module-level models and components
        $this->setImport(array(
        'bangdieukhien.models.*',
        'bangdieukhien.components.*',
        ));
    }

    public function beforeControllerAction($controller, $action)
    {
        if(parent::beforeControllerAction($controller, $action))
        {
            $user = Yii::app()->user;
            $isGuest = $user->isGuest;
            

            if ( $isGuest ) 
            {
                //luu 1 cookie de redirect lai sau khi login
                //Cookie::set('redriectAfterLogin',Yii::app()->request->getUrl(),30000);
                $user->setState('returnUrl',Yii::app()->request->url);    
                $linkToLogin =  Yii::app()->createAbsoluteUrl('khachhang/dangnhap');
                CController::redirect($linkToLogin);
            }
            // this method is called before any module controller action is performed
            // you may place customized code here
            return true;
        }
        else
            return false;
    }
}
