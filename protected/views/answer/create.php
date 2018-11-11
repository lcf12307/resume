<?php
/* @var $this AnswerController */
/* @var $model Answer */

$this->breadcrumbs=array(
	'Answers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'答案列表', 'url'=>array('index')),
	array('label'=>'答案管理', 'url'=>array('admin')),
);
?>

<h1>新建答案</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>