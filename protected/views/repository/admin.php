<?php
/* @var $this RepositoryController */
/* @var $model Repository */

$this->breadcrumbs=array(
	'Repositories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'知识库列表', 'url'=>array('index')),
	array('label'=>'新建知识库', 'url'=>array('create')),
);

?>
<h1>管理知识库</h1>

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
