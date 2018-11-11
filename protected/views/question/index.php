<?php
/* @var $this QuestionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Questions',
);

$this->menu=array(
	array('label'=>'创建问题', 'url'=>array('create')),
	array('label'=>'管理问题', 'url'=>array('admin')),
);
?>

<h1>问题列表</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
