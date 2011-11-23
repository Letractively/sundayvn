<?php
class App
{
    public static function getUrl()
    {
        return Yii::app()->request->baseUrl;
    }
}
