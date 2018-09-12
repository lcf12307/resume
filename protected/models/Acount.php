<?php
/**
 * Created by PhpStorm.
 * User: cf
 * Date: 18-9-7
 * Time: 下午6:59
 */

class Acount extends CActiveRecord {

    const TABLE = 'account';
    private $loginname;
    private $password;
    private $type;
    public static function uploadAccount($filename, $type = 0){
        $dir = Yii::app()->params['uploadPath'];
        $myfile = fopen( $dir . $filename, "r") or die("Unable to open file!");
        while(!feof($myfile)) {
            $s = trim(fgets($myfile));
            $datas = preg_split("/\s/" , $s);
            $account = array();
            foreach ($datas as $data){
                $data = trim($data);
                if (!empty($data)){
                    $account[] = $data;
                }

            }
            return Yii::app()->Db->createCommand()
                ->insert(self::TABLE, array(
                    'loginname' => $account[0],
                    'password' => $account[1],
                    'type' => $type
                ));
        }

    }

    public static function getAccountByType($type){
        $sqlKey = "select * from %s where type = %d";
        $sql = vsprintf($sqlKey, array(self::TABLE, $type));
        return Yii::app()->Db->createCommand($sql)->queryAll();
    }
}