<?php
/**
 * Created by PhpStorm.
 * User: cf
 * Date: 18-9-6
 * Time: 下午7:26
 */

$this->pageTitle=Yii::app()->name;

?>
    <script src="<?php echo Yii::app()->basePath.'/../assets/area/js/jquery.cxselect.js'?>">     </script>
    <script>
        $(document).ready(function(){
            $('#citys').cxSelect({
                'url':'<?php echo Yii::app()->basePath.'/../assets/area/js/cityData.js'?>',
                'selects':['province','city','area']
            });
            $.cxSelect.defaults.url = 'cityData.min.js';
            $.cxSelect.defaults.nodata = 'none';
        });

    </script>
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
            <div><?php echo CHtml::label('请选择账号所属网站：', true);?></div>
            <div><?php echo CHtml::dropDownList( 'sites', $selected, $sites );?></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'cname'); ?>
            <?php echo $form->textField($model,'cname'); ?>
            <?php echo $form->error($model,'cname'); ?>
        </div>

        <div class="row">
            <div><?php echo CHtml::label('性别：', true);?></div>
            <div ><?php echo CHtml::dropDownList( 'sites', 0 , array( 0 => '男', 1 => '女') );?></div>
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
            <div><?php echo CHtml::label('当前工作状态：', true);?></div>
            <div><?php echo CHtml::dropDownList( 'current_situation', 0 , array( 0 => '正在找', 3 => '观望中', 4 => '不想找') );?></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'salary'); ?>
            <?php echo $form->textField($model,'salary'); ?>
            <?php echo $form->error($model,'salary'); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'basesalary'); ?>
            <?php echo $form->textField($model,'basesalary'); ?>
            <?php echo $form->error($model,'basesalary'); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'bonus'); ?>
            <?php echo $form->textField($model,'bonus'); ?>
            <?php echo $form->error($model,'bonus'); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'allowance'); ?>
            <?php echo $form->textField($model,'allowance'); ?>
            <?php echo $form->error($model,'allowance'); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'stock'); ?>
            <?php echo $form->textField($model,'stock'); ?>
            <?php echo $form->error($model,'stock'); ?>
        </div>


        <div class="row">
            <?php echo $form->labelEx($model,'email'); ?>
            <?php echo $form->textField($model,'email'); ?>
            <?php echo $form->error($model,'email'); ?>
        </div>

        <div id="citys" data-name="area">
            <select class="province"></select>
            <select class="city"></select>
            <select class="area"></select>
        </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton('Submit'); ?>
        </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->
