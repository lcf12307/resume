<?php
/* @var $this UserController */
/* @var $model User */


$types = array(
    0 => '管理员',
    1 => '教师',
    2 => '家长'
);
$this->breadcrumbs=array(
	'Users'=>array('index'),
    $types[$model->type] => array($types[$model->type]),
	'Update',
);


$this->menu=array(
    array('label'=>  $types[$model->type]. ' 列表', 'url'=>array($types[$model->type])),
    array('label'=>'用户详情', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>  '创建' . $types[$model->type], 'url'=>array('create?type='. $model->type)),
);
?>

    <h1>修改 <?php echo Translation::translate($types[$model->type]);?></h1>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>