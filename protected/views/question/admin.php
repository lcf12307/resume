<?php
/* @var $this QuestionController */
/* @var $model Question */

$this->breadcrumbs=array(
	'Questions'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'问题列表', 'url'=>array('index')),
	array('label'=>'创建问题', 'url'=>array('create')),
);


?>

<h1>管理问题</h1>

<p>
    你可以输入以下的这些运算符 (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) 在对应的搜索框里，即可搜索出正确答案.
</p>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'question-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'cid',
		'name',
		'question',
		'detail',
		'uid',
		/*
		'star',
		'answer',
		'addtime',
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
