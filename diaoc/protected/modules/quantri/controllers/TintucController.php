<?php

class TintucController extends Controller
{
	public $layout='//layouts/quantri';
    public $Hinh_anh;

    public function rules()
    {
        return array(
            array('image', 'file', 'types'=>'jpg, gif, png'),
        );
    }
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
                'actions'=>array('index','quanly','them','xem','capnhat','xoa'),
                'roles'=>array('admin'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionXem($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionThem()
	{
		$model=new TinTuc;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

        $danhmuc = CHtml::listData(DanhMuc::model()->findAll(), 'idDanhmuc', 'Ten_Danhmuc');
        
		if(isset($_POST['TinTuc']))
		{   
			$model->attributes=$_POST['TinTuc'];
            $model->Hinh_anh=CUploadedFile::getInstance($model,'Hinh_anh');
            if($model->save())
            {
                $model->Hinh_anh->saveAs('images/tintuc');
                // redirect to success page
            }
            
			if($model->save())
				$this->redirect(array('xem','id'=>$model->idTin_tuc));
		}

		$this->render('create',array(
			'model'=>$model,
            'danhmuc'=>$danhmuc,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TinTuc']))
		{
			$model->attributes=$_POST['TinTuc'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idTin_tuc));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('TinTuc');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TinTuc('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TinTuc']))
			$model->attributes=$_GET['TinTuc'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=TinTuc::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tin-tuc-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
