<?php
/* @var $this RepositoryController */
/* @var $model Repository */

$this->breadcrumbs=array(
	'Repositories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'知识库列表', 'url'=>array('index')),
	array('label'=>'知识库管理', 'url'=>array('admin')),
);
?>

<h1>创建知识库</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>