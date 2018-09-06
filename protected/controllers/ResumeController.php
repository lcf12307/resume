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
        $model=new ResumeForm();
        if(isset($_POST['ResumeForm']))
        {
            $model->attributes=$_POST['ResumeForm'];
            var_dump($_POST);exit;
            if($model->validate())
            {
                $name='=?UTF-8?B?'.base64_encode($model->name).'?=';
                $subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
                $headers="From: $name <{$model->email}>\r\n".
                    "Reply-To: {$model->email}\r\n".
                    "MIME-Version: 1.0\r\n".
                    "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
                Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('index',array('model'=>$model));
    }

    public function actionTest()
    {
        $test = new Job51();
        $test->upload();
    }


}