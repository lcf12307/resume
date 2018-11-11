<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs=array(
	'Students'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Student', 'url'=>array('index')),
	array('label'=>'Create Student', 'url'=>array('create')),
);

?>

<h1>学生管理</h1>

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
	'id'=>'student-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'icon',
		'phone',
		'grad',
		'birthday',
		/*
		'sex',
		'pid',
		'tid',
		'question',
		'answer',
		'addtime',
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
