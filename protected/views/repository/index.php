<?php
/* @var $this RepositoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Repositories',
);

$this->menu=array(
	array('label'=>'新建知识库', 'url'=>array('create')),
	array('label'=>'知识库管理', 'url'=>array('admin')),
);
?>

<h1>知识库列表</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
