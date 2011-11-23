<?php
class App
{
    public static function getUrl()
    {
        return Yii::app()->request->baseUrl;
    }
    public static function getAbsoluteBaseUrl($isHasSlash = False)
    {
        $url = '';
        if( Yii::app()->request->isSecureConnection )
        {
            $url .= 'https://'; 
        }
        else
        {
           $url .= 'http://';   
        }
        $url .= Yii::app()->request->serverName;
        $url .= Yii::app()->request->baseUrl;
        
        if( $isHasSlash )
        {
            $url .= '/';
        }
        return $url;
    }
    public static function getClientScript()
    {
        return Yii::app()->getClientScript();
    }
}
