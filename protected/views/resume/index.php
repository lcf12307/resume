<?php
/**
 * Created by PhpStorm.
 * User: cf
 * Date: 18-9-6
 * Time: 下午7:26
 */

$this->pageTitle=Yii::app()->name;

?>
    <script src="../../../assets/area/js/jquery.cxselect.js">     </script>
    <script src="../../../assets/dist/autocomplete.js">     </script>
    <script src="https://js.51jobcdn.com/in/js/2016/layer/area_array_c.js?20180319" type="text/javascript"  charset="gb2312"></script>
    <script src="http://js.51jobcdn.com/in/js/2016/merge_data_c.js?20180319" type="text/javascript" charset="gb2312"></script>
    <script src="http://js.51jobcdn.com/in/js/2016/layer/layer_c.js?20180319" type="text/javascript" charset="gb2312"></script>
    <script src="https://js.51jobcdn.com/in/js/2016/layer/layer_main_map.js?20180815" type="text/javascript" charset="gb2312"></script>
    <script>
        $(document).ready(function(){
            $('#area').bind('input propertychange', function() {

                $('#area').val(area['010000']);
            });
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
            <div><?php echo CHtml::dropDownList( 'ResumeForm[sites]', $selected, $sites );?></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'cname'); ?>
            <?php echo $form->textField($model,'cname'); ?>
            <?php echo $form->error($model,'cname'); ?>
        </div>

        <div class="row">
            <div><?php echo CHtml::label('性别：', true);?></div>
            <div ><?php echo CHtml::dropDownList( 'ResumeForm[sites]', 0 , array( 0 => '男', 1 => '女') );?></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'workyear'); ?>
            <?php echo $form->textField($model,'workyear'); ?>
            <?php echo $form->error($model,'workyear'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'mobilephone'); ?>
            <?php echo $form->telField($model,'mobilephone'); ?>
            <?php echo $form->error($model,'mobilephone'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'email'); ?>
            <?php echo $form->emailField($model,'email'); ?>
            <?php echo $form->error($model,'email'); ?>
        </div>

        <div class="row">
            <div><?php echo CHtml::label('当前工作状态：', true);?></div>
            <div><?php echo CHtml::dropDownList( 'ResumeForm[current_situation]', 0 , array( 0 => '正在找', 3 => '观望中', 4 => '不想找') );?></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'salary'); ?>
            <?php echo $form->numberField($model,'salary'); ?>
            <?php echo $form->error($model,'salary'); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'basesalary'); ?>
            <?php echo $form->numberField($model,'basesalary'); ?>
            <?php echo $form->error($model,'basesalary'); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'bonus'); ?>
            <?php echo $form->numberField($model,'bonus'); ?>
            <?php echo $form->error($model,'bonus'); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'allowance'); ?>
            <?php echo $form->numberField($model,'allowance'); ?>
            <?php echo $form->error($model,'allowance'); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'stock'); ?>
            <?php echo $form->numberField($model,'stock'); ?>
            <?php echo $form->error($model,'stock'); ?>
        </div>



        <div class="row">
            <?php echo $form->labelEx($model,'area'); ?>
            <?php echo $form->textField($model,'area', array('id' => 'area')); ?>
            <?php echo $form->error($model,'area'); ?>
            <div id="areas"></div>
        </div>

        <div class="row">
            <div><?php echo CHtml::label('求职意向：', true);?></div>
            <div><?php echo CHtml::dropDownList( 'ResumeForm[seektype]', 0 , array( 0 => '全职', 1 => '兼职', 2 => '实习', 3 => '全职兼职') );?></div>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'selfintro'); ?>
            <?php echo $form->textField($model,'selfintro'); ?>
            <?php echo $form->error($model,'selfintro'); ?>
        </div>
        <div class="row">
            <div><?php echo CHtml::label('入职时间：', true);?></div>
            <div><?php echo CHtml::dropDownList( 'ResumeForm[entrytime]', 1 , array( 1 => '随时', 2 => '一周内', 3 => '一月内', 4 => '三个月内', 5 => '待定') );?></div>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'resumekey'); ?>
            <?php echo $form->textField($model,'resumekey'); ?>
            <?php echo $form->error($model,'resumekey'); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'expectposition'); ?>
            <?php echo $form->textField($model,'expectposition'); ?>
            <?php echo $form->error($model,'expectposition'); ?>
        </div>
        <div class="row">
            <div><?php echo CHtml::label('入职时间：', true);?></div>
            <div><?php echo CHtml::dropDownList( 'entrytime', 1 , array( 1 => '随时', 2 => '一周内', 3 => '一月内', 4 => '三个月内', 5 => '待定') );?></div>
        </div>
        <div class="row">
            <div><?php echo CHtml::label('入职时间：', true);?></div>
            <div><?php echo CHtml::dropDownList( 'entrytime', 1 , array( 1 => '随时', 2 => '一周内', 3 => '一月内', 4 => '三个月内', 5 => '待定') );?></div>
        </div>
        <div class="row buttons">
            <?php echo CHtml::submitButton('Submit'); ?>
        </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->
