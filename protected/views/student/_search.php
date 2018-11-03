<?php
/* @var $this StudentController */
/* @var $model Student */
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
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>36,'maxlength'=>36)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'icon'); ?>
		<?php echo $form->textField($model,'icon',array('size'=>36,'maxlength'=>36)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'class'); ?>
		<?php echo $form->textField($model,'class'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'birthday'); ?>
		<?php echo $form->textField($model,'birthday'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sex'); ?>
		<?php echo $form->textField($model,'sex'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pid'); ?>
		<?php echo $form->textField($model,'pid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tid'); ?>
		<?php echo $form->textField($model,'tid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question'); ?>
		<?php echo $form->textField($model,'question'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'answer'); ?>
		<?php echo $form->textField($model,'answer'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'addtime'); ?>
		<?php echo $form->textField($model,'addtime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->