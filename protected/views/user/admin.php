<?php
/* @var $this UserController */
/* @var $model User */


$types = array(
        0 => 'admin',
        1 => 'teacher',
        2 => 'parent'
);
$this->breadcrumbs=array(
    $types[$model->type] => array($types[$model->type]),
);
$this->menu=array(
	array('label'=>'List ' .$types[$model->type]. ' User', 'url'=>array($types[$model->type])),
	array('label'=>'Create ' .$types[$model->type]. ' User', 'url'=>array('create?type='. $model->type)),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage <?php echo $types[$model->type];?> Users</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'icon',
		'phone',
//		'password',
        'addtime',
//		'rid',
		/*
		'status',
		'type',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
