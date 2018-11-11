<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs=array(
	'Students'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'学生列表', 'url'=>array('index')),
	array('label'=>'学生管理', 'url'=>array('admin')),
);
?>

<h1>创建学生</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>