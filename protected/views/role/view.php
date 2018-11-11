<?php
/* @var $this RoleController */
/* @var $model Role */

$this->breadcrumbs=array(
	'Roles'=>array('/role/' . $types[$model->type]),
	$model->name,
);

$this->menu=array(
	array('label'=>'Create Role', 'url'=>array('create?type=' . $model->type)),
	array('label'=>'Update Role', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Role', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Role', 'url'=>array('admin')),
);
?>

<h1>View Role #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'type',
		'did',
		'description',
		'bizrule',
		'data',
	),
)); ?>
