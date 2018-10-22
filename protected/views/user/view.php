<?php
/* @var $this UserController */
/* @var $model User */



$types = array(
    0 => 'admin',
    1 => 'teacher',
    2 => 'student'
);

$this->breadcrumbs=array(
	'Users'=>array('index'),
    $types[$model->type] => array($types[$model->type]),
);

$this->menu=array(
	array('label'=>'List ' .$types[$model->type]. ' User', 'url'=>array($types[$model->type])),
	array('label'=>'Create ' .$types[$model->type]. ' User', 'url'=>array('create?type='. $model->type)),
	array('label'=>'Update ' .$types[$model->type]. ' User', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ' .$types[$model->type]. ' User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage ' .$types[$model->type]. ' User', 'url'=>array('admin'))
);
?>

<h1>View <?php echo $types[$model->type];?> User #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'icon',
		'phone',
		'password',
		'rid',
		'addtime',
		'status',
		'type',
	),
)); ?>
