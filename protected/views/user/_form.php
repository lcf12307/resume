<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>36,'maxlength'=>36)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row" hidden>
		<?php echo $form->labelEx($model,'icon'); ?>
		<?php echo $form->textField($model,'icon',array('size'=>36,'maxlength'=>36, 'value' => '/img/logo.png')); ?>
		<?php echo $form->error($model,'icon'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>36,'maxlength'=>36)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rid'); ?>
		<?php
          if ( Yii::app()->user->getDivision() != Yii::app()->params['adminDivision'])    {
              echo $form->textField($model,'rid', $roles);
          } else{
              echo $form->dropDownList($model,'rid', $roles);
          }
		?>
		<?php echo $form->error($model,'rid'); ?>
	</div>

	<div class="row" hidden>
		<?php echo $form->labelEx($model,'addtime'); ?>
		<?php echo $form->textField($model,'addtime', array('value' => time())); ?>
		<?php echo $form->error($model,'addtime'); ?>
	</div>

	<div class="row" hidden>
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status', array('value' => 1)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row" hidden>
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->