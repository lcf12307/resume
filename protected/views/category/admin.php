<?php
/* @var $this CategoryController */
/* @var $model Category */


$types = array(
    0 => 'question',
    1 => 'repository',
    2 => 'score',
);
$this->breadcrumbs=array(
    'Categories'=>array('index'),
    $types[$model->type] => array($types[$model->type]),
);
$this->menu=array(
	array('label'=>Translation::translate($types[$model->type]).' 分类列表', 'url'=>array($types[$model->type])),
	array('label'=>'新建 '.Translation::translate($types[$model->type]).' 分类', 'url'=>array('create?type='. $model->type)),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#category-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>管理 <?php echo  Translation::translate($types[$model->type]);?> 分类</h1>

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
	'id'=>'category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
//		'type',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
