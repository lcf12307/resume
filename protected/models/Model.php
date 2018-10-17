<?php
/**
 * Created by PhpStorm.
 * User: cf
 * Date: 18-10-17
 * Time: 下午5:53
 */

class Model {

    private $table = '';
    private $pre = 'common_';

    public function __construct($table = '')
    {
        $this->table = $table;
    }

    public function delete($condition,$table = false, $limit = 0) {
        if (empty($condition)) {
            return false;
        } elseif (is_array($condition)) {
            $where = self::implode($condition, ' AND ');
        } else {
            $where = $condition;
        }
        $limit = dintval($limit);
        $sql = "DELETE FROM " . self::table($table) . " WHERE $where " . ($limit > 0 ? "LIMIT $limit" : '');
        return Yii::app()->Db->createCommand($sql)->execute();
    }

    public function insert($data,$table = false, $replace = false) {

        $sql = self::implode($data);
        $cmd = $replace ? 'REPLACE INTO' : 'INSERT INTO';
        $table = self::table($table);
        $sql = "$cmd $table SET $sql";
        return Yii::app()->Db->createCommand($sql)->execute();
    }

    public function update($data, $condition, $table = false, $low_priority = false) {
        $sql = self::implode($data);
        if(empty($sql)) {
            return false;
        }
        $cmd = "UPDATE " . ($low_priority ? 'LOW_PRIORITY' : '');
        $table = self::table($table);
        if (empty($condition)) {
            $where = '1';
        } elseif (is_array($condition)) {
            $where = self::implode($condition, ' AND ');
        } else {
            $where = $condition;
        }
        $sql = "$cmd $table SET $sql WHERE $where";
        return Yii::app()->Db->createCommand($sql)->execute();
    }


    public function select($data = '*', $condition, $append = '', $table = false) {
        $data = is_array($data)?implode(',', $data):$data;
        $cmd = "SELECT " . $data . ' FROM ';
        $table = self::table($table);
        if (empty($condition)) {
            $where = '1';
        } elseif (is_array($condition)) {
            $where = self::implode($condition, ' AND ');
        } else {
            $where = $condition;
        }
        $sql = "$cmd $table WHERE $where" . $append;
        return Yii::app()->Db->createCommand($sql)->queryAll();
    }

    public function selectOne($data, $condition, $append='', $table = false) {
        $data = is_array($data)?implode(',', $data):$data;
        $cmd = "SELECT " . $data . ' FROM ';
        $table = self::table($table);
        if (empty($condition)) {
            $where = '1';
        } elseif (is_array($condition)) {
            $where = self::implode($condition, ' AND ');
        } else {
            $where = $condition;
        }
        $sql = "$cmd $table WHERE $where" . $append;
        return Yii::app()->Db->createCommand($sql)->queryRow();
    }

    private function table($table){
        $table =  empty($table)?$this->table:$table;
        return $this->pre . $table;
    }

    public static function getAppends($params){
        if ($params['sort_field'] == 'like'){
            $params['sort_field'] = '`like`';
        }
        $order = ' order by '.$params['sort_field'].' '.$params['sort_type'];
        $limit = ' limit '.($params['start'] - 1 ).','.$params['length'];
        return $order.$limit;
    }

    private function implode($array, $glue = ',') {
        $sql = $comma = '';
        $glue = ' ' . trim($glue) . ' ';
        foreach ($array as $k => $v) {
            $sql .= $comma . self::quote_field($k) . '=' . self::quote($v);
            $comma = $glue;
        }
        return $sql;
    }

    private function quote($str, $noarray = false) {

        if (is_string($str))
            return '\'' . mysql_escape_string($str) . '\'';

        if (is_int($str) or is_float($str))
            return '\'' . $str . '\'';

        if (is_array($str)) {
            if($noarray === false) {
                foreach ($str as &$v) {
                    $v = self::quote($v, true);
                }
                return $str;
            } else {
                return '\'\'';
            }
        }

        if (is_bool($str))
            return $str ? '1' : '0';

        return '\'\'';
    }

    private function quote_field($field) {
        if (is_array($field)) {
            foreach ($field as $k => $v) {
                $field[$k] = self::quote_field($v);
            }
        } else {
            if (strpos($field, '`') !== false)
                $field = str_replace('`', '', $field);
            $field = '`' . $field . '`';
        }
        return $field;
    }


}