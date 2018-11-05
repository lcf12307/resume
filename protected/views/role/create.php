<?php
/* @var $this RoleController */
/* @var $model Role */


$types = array(
    2 => 'Role',
    3 => 'Division'
);

$this->breadcrumbs=array(

    $types[$model->type] => array('/role/' . $types[$model->type]),
	'Create',
);

$this->menu=array(
    array('label'=>'List' .$types[$model->type], 'url'=>array('role/' . $types[$model->type])),
    array('label' => $types[$model->type], 'url' =>  array('/role/' . $types[$model->type]))
);
?>

<h1>Create  <?php echo $types[$model->type];?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>