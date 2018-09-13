<?php
/**
 * Created by PhpStorm.
 * User: cf
 * Date: 18-9-6
 * Time: 下午7:26
 */

$this->pageTitle=Yii::app()->name;

?>

    <h1><?php echo $this->pageTitle=Yii::app()->name;?></h1>



    <div class="form">

        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'resume-form',
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            ),
        )); ?>

        <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>

        <div class="row">
            <div class="col-md-1"><?php echo CHtml::label('请选择账号所属网站：', true);?></div>
            <div class="col-md-1"><?php echo CHtml::dropDownList( 'sites', $selected, $sites );?></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'cname'); ?>
            <?php echo $form->textField($model,'cname'); ?>
            <?php echo $form->error($model,'cname'); ?>
        </div>

        <div class="row">
            <div class="col-md-1"><?php echo CHtml::label('性别：', true);?>
                <?php echo CHtml::dropDownList( 'sites', 0 , array( 0 => '男', 1 => '女') );?></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'workyear'); ?>
            <?php echo $form->textField($model,'workyear'); ?>
            <?php echo $form->error($model,'workyear'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'mobilephone'); ?>
            <?php echo $form->textField($model,'mobilephone'); ?>
            <?php echo $form->error($model,'mobilephone'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'email'); ?>
            <?php echo $form->textField($model,'email'); ?>
            <?php echo $form->error($model,'email'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,''); ?>
            <?php echo $form->textField($model,'cname'); ?>
            <?php echo $form->error($model,'cname'); ?>
        </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton('Submit'); ?>
        </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->
