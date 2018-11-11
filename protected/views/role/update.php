<?php
/* @var $this RoleController */
/* @var $model Role */


$types = array(
    2 => 'Role',
    3 => 'Division'
);

$this->breadcrumbs=array(
	'Roles'=>array('/role/' . $types[$model->type]),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Create '.$types[$model->type], 'url'=>array('create?type='.empty($model->type)?2:$model->type)),
	array('label'=>'View '.$types[$model->type], 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage '.$types[$model->type], 'url'=>array('admin')),
);
?>

<h1>Update Role <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>