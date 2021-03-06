<?php

class RoleController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'role', 'division'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
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
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Role;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Role']))
		{
		    if ( Yii::app()->user->getDivision() != Yii::app()->params['adminDivision']){

                $_POST['Role']['did'] = Yii::app()->user->getDivision();
            }
			$model->attributes=$_POST['Role'];
			if($model->save())
			    $id = $model->id;
			    if ($model->type == 3){
			        $model->type = 2;
			        $model->did = $id;
			        if ($model->save()){
			            $user = new User;
			            $user->attributes = array(
			                'name' => $model->name,
                            'icon' => '/img/logo.png',
                            'rid' => $model->id,
                            'addtime' => time(),
                            'status' => 1,
                            'type' => 0,
                            'password' => 123456
                        );
			            if ($user->save()){
			                $this->redirect(array('/user/view', 'id'=> $user->id));
                        }
                    }
                }
				$this->redirect(array('view','id'=>$model->id));
		}
        $model->type = isset($_GET['type'])?$_GET['type']:2;
		$this->render('create',array(
			'model'=>$model,
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

		if(isset($_POST['Role']) && ($model['did'] == Yii::app()->user->getDivision() || Yii::app()->user->getDivision() == Yii::app()->params['adminDivision']))
		{

            $_POST['did'] = Yii::app()->user->getDivision();
            $model->attributes=$_POST['Role'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id));
		}
        $model->type = isset($_GET['type'])?$_GET['type']:0;
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
		$model = $this->loadModel($id);
		if  ($model['did'] == Yii::app()->user->getDivision() || Yii::app()->user->getDivision() == Yii::app()->params['adminDivision']){
		    $model->delete();
        }

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

//	/**
//	 * Lists all models.
//	 */
//	public function actionIndex()
//	{
//		$dataProvider=new CActiveDataProvider('Role');
//		$this->render('index',array(
//			'dataProvider'=>$dataProvider,
//		));
//	}

	/**
	 * Manages all models.
	 */
	public function actionRole()
	{
		$model=new Role('search');
		$model->unsetAttributes();  // clear any default values
        $_GET['Role']['type'] = 2;
        $did = Yii::app()->user->getDivision();
        if ($did != Yii::app()->params['adminDivision'] ){
            $_GET['Role']['did'] = $did;
        }
		if(isset($_GET['Role']))
			$model->attributes=$_GET['Role'];
		$this->render('admin',array(
			'model'=>$model,
		));
	}

    /**
     * Manages all models.
     */
    public function actionDivision()
    {
        $model=new Role('search');
        $model->unsetAttributes();  // clear any default values
        $_GET['Role']['type'] = 3;
        if(isset($_GET['Role']))
            $model->attributes=$_GET['Role'];

        $this->render('admin',array(
            'model'=>$model,
        ));
    }
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Role the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Role::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Role $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='role-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
