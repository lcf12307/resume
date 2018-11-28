<?php
/**
 * Created by PhpStorm.
 * User: cf
 * Date: 18-11-28
 * Time: 上午9:42
 */


class TestCommand extends CConsoleCommand
{
    /**
     *
     * 测试（项目根目录下执行）
     *
     * 脚本执行示例：
     *      windows环境：
     *                  >yiic.bat Test Index
     *      linux环境：
     *                  >yiic Test Index
     */
    public function actionIndex()
    {
        echo "ok";
        exit();
    }

    public function actionTest()
    {

        require_once '/home/work/data/www/resume/protected/models/Model.php';
        $filename = "/home/work/data/www/resume/protected/commands/student.csv";
        $logname = "/home/work/data/www/resume/protected/commands/log";
        $file = fopen($filename, 'r');
        $logFile = fopen($logname, 'w');
        $userModel = new Model('user');
        $studentModel = new Model('student');
        $tid = 0;
        $id = 1;
        $rid = 0;
        while ( $data = fgetcsv ( $file) ) {
            if (!empty($data[1]) && $data[2] == 2){
                $user = $userModel->selectOne('*', array('phone' => $data[1]));
                if (!empty($user)){
                    fputs($logFile, "fail:  teacher already exist. name: " . $data[0] . '; phone:' . $data[1] . '; id: ' . $user['id'] . "\n");
                    echo "fail:  teacher already exist. name: " . $data[0] . '; phone:' . $data[1] . '; id: ' . $user['id'] . "\n";
                    $tid = $user['id'];
                    $id = 1;
                    $rid = $data[3];
                } else {
                    $result = $userModel->insert(array(
                        'name' => $data[0],
                        'rid' => $data[3],
                        'phone' => $data[1],
                        'icon' => '/img/logo.png',
                        'password' => '123456',
                        'addtime' => time(),
                        'status' => 1,
                        'type' => 1,
                    ));
                    $user = $userModel->selectOne('*', array('phone' => $data[1], 'name' => $data[0]));
                    $tid = $user['id'];
                    $rid = $data[3];
                    $id = 1;
                    if (empty($result)){
                        fputs($logFile, "fail:  db error. name: " . $data[0] . '; phone:' . $data[1]  . "\n");
                        echo  "fail:  db error. name: " . $data[0] . '; phone:' . $data[1]  . "\n";
                    } else {
                        fputs($logFile, "success:  already add " . $data[0]. '; phone:' . $data[1] . '; id: ' . $tid  . "\n");
                        echo "success:  already add " . $data[0]. '; phone:' . $data[1] . '; id: ' . $tid  . "\n";
                    }
                }

            } else {
                $result = $studentModel->insert(array(
                    'name' => $data[0],
                    'icon' => '/img/logo.png',
                    'addtime' => time(),
                    'tid' => $tid,
                    'studentId' => '2018' . sprintf('%04d', $rid) . '0000' . sprintf('%04d', $id)
                ));
                $id++;
                if (empty($result)){
                    fputs($logFile, "fail:  db error. name: " . $data[0]  . "\n");
                    echo  "fail:  db error. name: " . $data[0]  . "\n";
                } else {
                    fputs($logFile, "success:  already add " . $data[0]  . "\n");
                    echo "success:  already add " . $data[0]  . "\n";
                }
            }
        }
        exit;
    }
}