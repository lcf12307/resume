<?php
/**
 * Created by PhpStorm.
 * User: cf
 * Date: 18-11-11
 * Time: 下午5:18
 */

class Translation {
    public  static function translate($key){
        $translations = array(
            'admin' => '管理员',
            'teacher' => '教师',
            'parent' => '家长',
            'role' => '角色',
            'division' => '部门',
            'score' => '评分',
            'question' => '问题',
            'repository' => '知识库'
        );
        return $translations[$key];
    }
}