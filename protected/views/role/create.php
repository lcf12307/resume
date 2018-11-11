<?php
/* @var $this RoleController */
/* @var $model Role */


$types = array(
    2 => 'role',
    3 => 'division'
);

$this->breadcrumbs=array(

    $types[$model->type] => array('/role/' . $types[$model->type]),
	'Create',
);

$this->menu=array(
    array('label'=>Translation::translate($types[$model->type]) . '列表', 'url'=>array('role/' . $types[$model->type])),
    array('label' => '创建' . Translation::translate($types[$model->type]), 'url' =>  array('/role/' . $types[$model->type]))
);
?>

<h1>新建  <?php echo Translation::translate($types[$model->type]);?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>