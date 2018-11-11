<?php
/* @var $this UserController */
/* @var $model User */


$types = array(
    0 => 'admin',
    1 => 'teacher',
    2 => 'parent'
);
$this->breadcrumbs=array(
    $types[$model->type] => array('/user/' . $types[$model->type]),
	'Create',
);

$this->menu=array(
	array('label'=> Translation::translate($types[$model->type]) . '列表', 'url'=>array('/user/' .  $types[$model->type])),
);
?>

<h1>创建 <?php echo Translation::translate($types[$model->type]);?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>