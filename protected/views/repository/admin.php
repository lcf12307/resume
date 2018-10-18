<?php
/* @var $this RepositoryController */
/* @var $model Repository */

$this->breadcrumbs=array(
	'Repositories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Repository', 'url'=>array('index')),
	array('label'=>'Create Repository', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#repository-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Repositories</h1>

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
	'id'=>'repository-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'cid',
		'name',
		'detail',
		'uid',
		'star',
		/*
		'addtime',
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
