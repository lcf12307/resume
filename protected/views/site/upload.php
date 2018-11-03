
<?php
if (Yii::app()->user->hasFlash('result')){
    $result = Yii::app()->user->getFlash('result');
    if (($result['code']) != 0){
        $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
            'id'=>'resultdialog',
            // additional javascript options for the dialog plugin
            'options'=>array(
                'title'=>'上传失败',
                'autoOpen'=>true,
                'modal'=>false,
                'buttons'=>array(
                    '关闭'=>'js:function(){ $(this).dialog("close");}',
                ),
            ),
        ));
        echo $result['msg'];
        $this->endWidget('zii.widgets.jui.CJuiDialog');
    } else {
        $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
            'id'=>'resultdialog',
            // additional javascript options for the dialog plugin
            'options'=>array(
                'title'=>'上传成功',
                'autoOpen'=>true,
                'modal'=>false,
                'buttons'=>array(
                    '关闭'=>'js:function(){ $(this).dialog("close");}',
                ),
            ),
        ));
        echo '您已经成功上传了账号文件';
        $this->endWidget('zii.widgets.jui.CJuiDialog');
    }
}
?>


<div class="form">
    <?php echo CHtml::beginForm($this->createUrl('upload'),'post',array('enctype'=>'multipart/form-data', 'id'=>'form' )); ?>
    <p class="note">仅提供上传<span class="required">txt,csv,无后缀</span>类型文件上传功能</p>
    <div class="row">

        <?php echo CHtml::fileField('file');?>
    </div>
    <div class="row">
    </div>
    <div class="row">
        <?php
        echo CHtml::submitButton('上传', array('class' => 'btn'));?>

    </div>
    <?php echo CHtml::endForm();?>
</div>
