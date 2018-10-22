<?php
/* @var $this UserController */
/* @var $model User */


$types = array(
        0 => 'admin',
        1 => 'teacher',
        2 => 'student'
);$this->breadcrumbs=array(
    'Users'=>array('index'),
    $types[$model->type],
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

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'icon',
		'phone',
		'password',
		'rid',
		/*
		'addtime',
		'status',
		'type',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
