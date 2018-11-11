<?php
/* @var $this UserController */
/* @var $model User */


$types = array(
        0 => '管理员',
        1 => '教师',
        2 => '家长'
);
$this->breadcrumbs=array(
    $types[$model->type] => array($types[$model->type]),
);
$this->menu=array(
	array('label'=>  $types[$model->type]. ' 列表', 'url'=>array($types[$model->type])),
	array('label'=>  '创建' . $types[$model->type], 'url'=>array('create?type='. $model->type)),
);


?>

<h1><?php echo $types[$model->type];?> 管理</h1>

<p>
    你可以输入以下的这些运算符 (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) 在对应的搜索框里，即可搜索出正确答案.
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
