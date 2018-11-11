<?php
/* @var $this StudentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Students',
);

$this->menu=array(
	array('label'=>'新建学生', 'url'=>array('create')),
	array('label'=>'学生管理', 'url'=>array('admin')),
);
?>

<h1>学生列表</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
