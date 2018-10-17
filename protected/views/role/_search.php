<?php
/* @var $this RoleController */
/* @var $model Role */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'role'); ?>
		<?php echo $form->textField($model,'role',array('size'=>36,'maxlength'=>36)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'did'); ?>
		<?php echo $form->textField($model,'did'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'identity'); ?>
		<?php echo $form->textField($model,'identity'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'power'); ?>
		<?php echo $form->textField($model,'power',array('size'=>36,'maxlength'=>36)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->