<?php
/* @var $this QuestionController */
/* @var $model Question */

$this->breadcrumbs=array(
	'Questions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'问题列表', 'url'=>array('index')),
	array('label'=>'管理问题', 'url'=>array('admin')),
);
?>

<h1>创建问题</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>