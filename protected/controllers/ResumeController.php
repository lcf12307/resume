<?php
/**
 * Created by PhpStorm.
 * User: cf
 * Date: 18-9-4
 * Time: 上午9:51
 */

class ResumeController extends Controller
{

    public function actions()
    {
        return array(
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    }

    public function actionIndex()
    {
        $util = new Util();
        $model = new ResumeForm();
        if (!empty($_POST)){
            $form = $_POST['ResumeForm'];
            switch ($form['sites']){
                case 0:
                    $data = Job51::handleData($form);
            }
           echo json_encode($_POST);exit;
            Yii::app()->user->setflash('result', $result);
            $this->refresh();
        }
        $this->render('index', array('sites' => $util->getSites(), 'selected' => 1, 'model' => $model));
    }

    public function actionUpload(){
        $util = new Util();
        if (!empty($_POST)){
            try{
                //上传成功
                Yii::app()->file->upload();
                $filename =  Yii::app()->file->getNameWithExtension();
                Acount::uploadAccount($filename, $_POST['sites']);
                $result = array(
                    'code' => 0,
                    'msg' => '上传成功'
                );
            }catch (CException $e){
                $result = Yii::app()->file->getError();
                $msg = $result[0];
                $result = array(
                    'code' => -10001,
                    'msg' => $msg
                );
                //errors错误信息数组
            }
            Yii::app()->user->setflash('result', $result);
            $this->refresh();
        }
        $this->render('upload', array('sites' => $util->getSites(), 'selected' => 1));
    }



    public function actionTest()
    {
        $test = new Job51();
        $test->upload();
    }


}