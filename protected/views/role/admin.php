<?php
/* @var $this RoleController */
/* @var $model Role */




$types = array(
    2 => 'role',
    3 => 'division'
);

$this->breadcrumbs=array(
	$types[$model->type]
);

$this->menu=array(
	array('label'=> Translation::translate($types[$model->type]) . '列表', 'url'=>array('role/' . $types[$model->type])),
	array('label'=>'创建' .Translation::translate($types[$model->type]), 'url'=>array('create?type=' . $model->type)),
);

?>

<h1><?php echo Translation::translate($types[$model->type]);?> 管理</h1>

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
	'id'=>'role-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
//		'type',
//		'did',
		'description',
		'bizrule',
		/*
		'data',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
