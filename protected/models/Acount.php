<?php
/**
 * Created by PhpStorm.
 * User: cf
 * Date: 18-9-7
 * Time: 下午6:59
 */

class Acount extends CFormModel {

    public static function uploadAccount($filename){
        $dir = Yii::app()->params['uploadPath'];
        $myfile = fopen( $dir . $filename, "r") or die("Unable to open file!");
        while(!feof($myfile)) {
            $datas = explode(' ' , fgets($myfile));
            var_dump($datas);exit;
        }
    }
}