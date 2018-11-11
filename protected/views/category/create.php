<?php
/* @var $this CategoryController */
/* @var $model Category */

$types = array(
    0 => 'question',
    1 => 'repository',
    2 => 'score',
);
$this->breadcrumbs=array(
	$types[$model->type]=>array('/category/' .  $types[$model->type]),
	'Create',
);

$this->menu=array(
	array('label'=>Translation::translate($types[$model->type]) . '列表', 'url'=>array($types[$model->type])),
);
?>

<h1>新建 <?php echo Translation::translate($types[$model->type])?> 列表</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>