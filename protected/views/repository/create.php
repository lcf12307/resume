<?php
/* @var $this RepositoryController */
/* @var $model Repository */

$this->breadcrumbs=array(
	'Repositories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Repository', 'url'=>array('index')),
	array('label'=>'Manage Repository', 'url'=>array('admin')),
);
?>

<h1>Create Repository</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>