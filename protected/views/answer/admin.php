<?php
/* @var $this AnswerController */
/* @var $model Answer */

$this->breadcrumbs=array(
	'Answers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'答案列表', 'url'=>array('index')),
	array('label'=>'新建答案', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#answer-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>答案管理</h1>

<p>
    你可以输入以下的这些运算符 (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) 在对应的搜索框里，即可搜索出正确答案.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'answer-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'qid',
		'name',
		'answer',
		'detail',
		'uid',
		/*
		'addtime',
		'like',
		'unlike',
		'comment',
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
