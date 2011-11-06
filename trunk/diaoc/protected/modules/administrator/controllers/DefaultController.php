<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
        $this->layout=NULL;
		$this->render('index');
	}
}