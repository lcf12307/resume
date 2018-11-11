<?php
/* @var $this AnswerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Answers',
);

$this->menu=array(
	array('label'=>'新建答案', 'url'=>array('create')),
	array('label'=>'答案管理', 'url'=>array('admin')),
);
?>

<h1>答案列表</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
