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
    <script src="https://js.51jobcdn.com/in/js/2016/layer/funtype_array_c.js?20180815" type="text/javascript" charset="gb2312"></script>
    <script src="https://js.51jobcdn.com/in/js/2016/layer/indtype_array_c.js?20180319" type="text/javascript" charset="gb2312"></script>
    <script src="https://js.51jobcdn.com/in/js/2016/layer/layer_main_navigation.js?20180319" type="text/javascript" charset="gb2312"></script>
    <script src="https://js.51jobcdn.com/in/js/2016/layer/major_array_c.js?20180319" type="text/javascript" charset="gb2312"></script>
    <script src="https://js.51jobcdn.com/in/js/2016/layer/itskill_array_c.js?20180319" type="text/javascript" charset="gb2312"></script>
    <script src="https://js.51jobcdn.com/in/js/2016/layer/cert_array_c.js?20180319" type="text/javascript" charset="gb2312"></script>
    <script>
        $(document).ready(function(){
            var area_select;
            for (area_select in oAreaM ) {
                $('#province').append('<option value="'+area_select+'">'+area[area_select]+'</option>');
                $('#expect_province').append('<option value="'+area_select+'">'+area[area_select]+'</option>');
            }

            var city_string = oAreaM[$('#province').val()];
            var citys = city_string.split(',');
            $('#city').empty();
            for (var i=0;i<citys.length;i++){
                $('#city').append('<option value="'+ citys[i] +'">'+area[citys[i]]+'</option>')
                $('#expect_city').append('<option value="'+ citys[i] +'">'+area[citys[i]]+'</option>')
            }
            $('#ResumeForm_area').val(citys[0]);
            var major_select;
            for(major_select in oMajorM){
                $('#major1').append('<option value="'+major_select+'">'+major[major_select]+'</option>')
            }
            var major_string = oMajorM[$('#major1').val()];
            var majors = major_string.split(',');
            for (var i=0;i<majors.length;i++){
                $('#major2').append('<option value="'+ majors[i] +'">'+major[majors[i]]+'</option>');
            }

            for (var i=0;i<d_jobstatus.length;i++){
                $('#ResumeForm_current_situation').append('<option value="' + d_jobstatus[i]['k']+ '">'+d_jobstatus[i]['v']+'</option>');
            }
            for (var i=0;i<d_companysize.length;i++){
                $('#companysize').append('<option value="' + d_companysize[i]['k']+ '">'+d_companysize[i]['v']+'</option>');
            }
            for (var i=0;i<d_workyear.length;i++){
                $('#ResumeForm_workyear').append('<option value="' + d_workyear[i]['k']+ '">'+d_workyear[i]['v']+'</option>');
            }
            for (var i=0;i<d_jobterm.length;i++){
                $('#ResumeForm_seektype').append('<option value="' + d_jobterm[i]['k']+ '">'+d_jobterm[i]['v']+'</option>');
            }
            for (var i=0;i<d_entrytime.length;i++) {
                $('#ResumeForm_entrytime').append('<option value="' + d_entrytime[i]['k'] + '">' + d_entrytime[i]['v'] + '</option>');
            }
            for (var i=0;i<d_salary_type.length;i++) {
                $('#ResumeForm_salarytype').append('<option value="' + d_salary_type[i]['k'] + '">' + d_salary_type[i]['v'] + '</option>');
            }
            for (var i=0;i<d_yearsal.length;i++) {
                $('#ResumeForm_inputsalary').append('<option value="' + d_yearsal[i]['k'] + '">' + d_yearsal[i]['v'] + '</option>');
            }
            for (var i=0;i<d_cotype.length;i++) {
                $('#companytype').append('<option value="' + d_cotype[i]['k'] + '">' + d_cotype[i]['v'] + '</option>');
            }
            for (var i=0;i<d_degree.length;i++) {
                $('#degree').append('<option value="' + d_degree[i]['k'] + '">' + d_degree[i]['v'] + '</option>');
            }

            var func_select;
            for (func_select in oFTM ) {
                $('#expect_func1').append('<option value="'+func_select+'">'+ft[func_select]+'</option>');
                $('#workfunc1').append('<option value="'+func_select+'">'+ft[func_select]+'</option>');
            }

            var func_string = oFTM[$('#expect_func1').val()];
            var funcs = func_string.split(',');
            $('#expect_func2').empty();
            $('#workfunc2').empty();
            for (var i=0;i<funcs.length;i++){
                $('#expect_func2').append('<option value="'+ funcs[i] +'">'+ft[funcs[i]]+'</option>');
                $('#workfunc2').append('<option value="'+func_select+'">'+ft[func_select]+'</option>');
            }

            for (var i=0;i<aITN.length;i++){
                $('#expect_industry1').append('<option value="'+i+'">'+aITN[i]['c']+'</option>');
                $('#workindustry1').append('<option value="'+i+'">'+aITN[i]['c']+'</option>');
            }

            for (var i=0;i< d_itability.length;i++){
                $('#ability').append('<option value="'+d_itability[i]['k']+'">'+d_itability[i]['v']+'</option>');
            }
            var ind_string = aITN[$('#expect_industry1').val()];
            var inds = ind_string['category'];
            $('#expect_industry2').empty();
            $('#workindustry2').empty();

            for (var i=0;i<inds.length;i++){
                $('#expect_industry2').append('<option value="'+ inds[i] +'">'+it[inds[i]]+'</option>');
                $('#workindustry2').append('<option value="'+ inds[i] +'">'+it[inds[i]]+'</option>');
            }

            //技能
            for (var i=0;i<aItskillN.length;i++){
                $('#skill1').append('<option value="'+ i +'">'+aItskillN[i]['c']+'</option>')
            }
            var category = aItskillN[$('#skill1').val()]['category'];
            for (var i=0;i<category.length;i++){
                $('#skill2').append('<option value="'+ category[i] +'">'+itskill[category[i]]+'</option>')
            }
            //证书
            for (var i=0;i<aCertN.length;i++){
                $('#cert1').append('<option value="'+ i +'">'+aCertN[i]['c']+'</option>')
            }
            var category = aCertN[$('#cert1').val()]['category'];
            for (var i=0;i<category.length;i++){
                $('#cert2').append('<option value="'+ category[i] +'">'+cert[category[i]]+'</option>')
            }
            $('#ResumeForm_salarytype').change(function () {
                var type = $('#ResumeForm_salarytype').val();
                if (type == '4'){
                    $('#salary').empty();
                    $('#salary').append('<select id="ResumeForm_inputsalary" name="ResumeForm[inputsalary]" class="form-control"></select>');
                    for (var i=0;i<d_yearsal.length;i++) {
                        $('#ResumeForm_inputsalary').append('<option value="' + d_yearsal[i]['k'] + '">' + d_yearsal[i]['v'] + '</option>');
                    }
                }else if (type == '1'){
                    $('#salary').empty();
                    $('#salary').append('<select id="ResumeForm_inputsalary" name="ResumeForm[inputsalary]" class="form-control"></select>');
                    for (var i=0;i<d_saltype.length;i++) {
                        $('#ResumeForm_inputsalary').append('<option value="' + d_saltype[i]['k'] + '">' + d_saltype[i]['v'] + '</option>');
                    }
                } else {
                    $('#salary').empty();
                    $('#salary').append('<input id="ResumeForm_inputsalary" name="ResumeForm[inputsalary]" class="form-control" placeholder="只支持数字"></input>');
                }
            });
            $('#province').change(function () {
                var city_string = oAreaM[$('#province').val()];
                var citys = city_string.split(',');
                $('#city').empty();
                for (var i=0;i<citys.length;i++){
                    $('#city').append('<option value="'+ citys[i] +'">'+area[citys[i]]+'</option>')
                }
                $('#ResumeForm_area').val(citys[0]);
            });
            $('#expect_func1').change(function () {
                var funcs_string = oFTM[$('#expect_func1').val()];
                var funcs = funcs_string.split(',');
                $('#expect_func2').empty();
                for (var i=0;i<funcs.length;i++){
                    $('#expect_func2').append('<option value="'+ funcs[i] +'">'+ft[funcs[i]]+'</option>')
                }
            });
            $('#major1').change(function () {

                var major_string = oMajorM[$('#major1').val()];
                var majors = major_string.split(',');
                $('#major2').empty();
                for (var i=0;i<majors.length;i++){
                    $('#major2').append('<option value="'+ majors[i] +'">'+major[majors[i]]+'</option>');
                }
            });
            $('#expect_industry1').change(function () {
                var ind_string = aITN[$('#expect_industry1').val()];
                var inds = ind_string['category'];
                $('#expect_industry2').empty();
                for (var i=0;i<inds.length;i++){
                    $('#expect_industry2').append('<option value="'+ inds[i] +'">'+it[inds[i]]+'</option>');
                }
            });
            $('#workfunc1').change(function () {
                var funcs_string = oFTM[$('#workfunc1').val()];
                var funcs = funcs_string.split(',');
                $('#workfunc2').empty();
                for (var i=0;i<funcs.length;i++){
                    $('#workfunc2').append('<option value="'+ funcs[i] +'">'+ft[funcs[i]]+'</option>')
                }
            });
            $('#workindustry1').change(function () {
                var ind_string = aITN[$('#workindustry1').val()];
                var inds = ind_string['category'];
                $('#workindustry2').empty();
                for (var i=0;i<inds.length;i++){
                    $('#workindustry2').append('<option value="'+ inds[i] +'">'+it[inds[i]]+'</option>');
                }
            });
            $('#skill1').change(function () {
                var category = aItskillN[$('#skill1').val()]['category'];
                $('#skill2').empty();
                for (var i=0;i<category.length;i++){
                    $('#skill2').append('<option value="'+ category[i] +'">'+itskill[category[i]]+'</option>')
                }
            })
            $('#expect_province').change(function () {
                var city_string = oAreaM[$('#expect_province').val()];
                var citys = city_string.split(',');
                $('#expect_city').empty();
                for (var i=0;i<citys.length;i++){
                    $('#expect_city').append('<option value="'+ citys[i] +'">'+area[citys[i]]+'</option>')
                }
            });
            $('#area_add').click(function () {
                var value = $('#expect_city').val();
                var name = $('#expect_province').find("option:selected").text()+ $('#expect_city').find("option:selected").text();
                $('#city_selected').append('<span data-value="'+ value +'" class="btn-info area" > '+name+'</span>');
                var area_string = $('#ResumeForm_expectarea').val();
                var areas;
                if (area_string === ""){
                    areas = [];
                }else {
                    areas = area_string.split(',');
                }
                areas.push(value);
                $('#ResumeForm_expectarea').val(areas.join(','));
            });
            $('#func_add').click(function () {
                var value = $('#expect_func2').val();
                var name =  $('#expect_func2').find("option:selected").text();
                $('#func_selected').append('<span data-value="'+ value +'" class="btn-info func" > '+name+'</span>');
                var func_string = $('#ResumeForm_expectfunc').val();
                var funcs;
                if (func_string === ""){
                    funcs = [];
                }else {
                    funcs = func_string.split(',');
                }
                funcs.push(value);
                $('#ResumeForm_expectfunc').val(funcs.join(','));
            });
            $('#industry_add').click(function () {
                var value = $('#expect_industry2').val();
                var name =  $('#expect_industry2').find("option:selected").text();
                $('#industry_selected').append('<span data-value="'+ value +'" class="btn-info ind" > '+name+'</span>');
                var func_string = $('#ResumeForm_expectindustry').val();
                var funcs;
                if (func_string === ""){
                    funcs = [];
                }else {
                    funcs = func_string.split(',');
                }
                funcs.push(value);
                $('#ResumeForm_expectindustry').val(funcs.join(','));
            });
            $('#city').change(function () {
                $('#ResumeForm_area').val($('#city').val());
            });
            $('#expect_city').change(function () {
                $('#ResumeForm_area').val($('#expect_city').val());
            });
            $('#award_add').click(function () {
                var award = {
                    '获奖时间': $('#award_time').val(),
                    '奖项名': $('#award_name').val(),
                    '奖项类别': $('#award_class').val()
                };
                var append='<div><label class="btn-info delete" >'+JSON.stringify(award)+'</label>';

                award = award['获奖时间']+'_'+ award['奖项名']+'_'+ award['奖项类别'];
                append += '<input type="hidden" name="ResumeForm[awards][]" value="'+award+'">';
                $('#award_inserted').append(append);
                $('#award_class').val('');
                $('#award_time').val('');
                $('#award_name').val('');
            })
            $('#work_add').click(function () {
                var work = {
                    '开始时间': $('#timefrom').val(),
                    '结束时间': $('#timeto').val(),
                    '公司名': $('#ccompname').val(),
                    '公司职能': $('#workfunc2').find("option:selected").text(),
                    '公司行业': $('#workindustry2').find("option:selected").text(),
                    '职位': $('#cposition').val(),
                    '公司规模': $('#companysize').find("option:selected").text(),
                    '部门': $('#cdepartment').val(),
                    '公司性质': $('#companytype').find("option:selected").text(),
                    '工作描述': $('#cworkdescribe').val(),
                    '工作类型': $('#worktype').find("option:selected").text(),
                    '是否有海外经历': $('#workoverseas').find("option:selected").text()
                };
                var append='<div><label class="btn-info delete" >'+JSON.stringify(work)+'</label>';

                work = work['开始时间']+'_'+work['结束时间']+'_'+work['公司名']+'_'+$('#workfunc2').val()+'_'+$('#workindustry2').val()+'_'+work['职位']+'_'
                    +$('#companysize').val()+'_'+work['部门']+'_'+$('#companytype').val()+'_'+work['工作描述']+'_'+$('#worktype').val()+'_'+$('#workoverseas').val();
                append += '<input type="hidden" name="ResumeForm[works][]" value="'+work+'">';
                $('#work_inserted').append(append);
                $('#timefrom').val('');
                $('#timeto').val('');
                $('#ccompname').val('');
                var func_string = oFTM[$('#workfunc1').val()];
                var funcs = func_string.split(',');
                $('#workfunc2').empty();
                for (var i=0;i<funcs.length;i++){
                    $('#workfunc2').append('<option value="'+func_select+'">'+ft[func_select]+'</option>');
                }
                var ind_string = aITN[$('#workindustry1').val()];
                var inds = ind_string['category'];
                $('#workindustry2').empty();
                for (var i=0;i<inds.length;i++){
                    $('#workindustry2').append('<option value="'+ inds[i] +'">'+it[inds[i]]+'</option>');
                }
                $('#cdepartment').val('');
                $('#cworkdescribe').val('');
            })
            $('#project_add').click(function () {
                var project = {
                    '开始时间': $('#starttime').val(),
                    '结束时间': $('#endtime').val(),
                    '项目名': $('#ccompname_project').val(),
                    '项目描述': $('#cprojectname').val(),
                    '责任描述': $('#cdescribe').val(),
                    '所属公司': $('#cfunction').val()
                };
                var append='<div><label class="btn-info delete" >'+JSON.stringify(project)+'</label>';

                project = project['开始时间']+'_'+ project['结束时间']+'_'+ project['项目名']+'_'+ project['项目描述']+'_'+ project['责任描述']+'_'+ project['所属公司'];
                append += '<input type="hidden" name="ResumeForm[projects][]" value="'+project+'">';
                $('#project_inserted').append(append);
                $('#starttime').val(''),
                $('#endtime').val(''),
                $('#ccompname_project').val(''),
                $('#cprojectname').val(''),
                $('#cdescribe').val(''),
                $('#cfunction').val('')
            })
            $('#school_add').click(function () {
                var school = {
                    '入学时间': $('#school_starttime').val(),
                    '结束时间': $('#school_endtime').val(),
                    '学校名': $('#cschoolname').val(),
                    '学历': $('#degree').find("option:selected").text(),
                    '专业名': $('#major2').find("option:selected").text(),
                    '是否全日制': $('#isfulltime').find("option:selected").text(),
                    '专业描述': $('#major_cdescribe').val(),
                    '海外经历': $('#isoverseas').find("option:selected").text()
                };
                var append='<div><label class="btn-info delete" >'+JSON.stringify(school)+'</label>';

                school = school['入学时间']+'_'+ school['结束时间']+'_'+ school['学校名']+'_'+ $('#degree').val()+'_'
                    + $('#major2').val()+'_'+ $('#major2').find("option:selected").text()+'_'+ $('#isfulltime').val()
                    +'_'+ school['专业描述']+'_'+ $('#isoverseas').val();
                append += '<input type="hidden" name="ResumeForm[scools][]" value="'+school+'">';
                $('#school_inserted').append(append);
                $('#school_starttime').val(''),
                $('#school_endtime').val(''),
                $('#cschoolname').val(''),
                $('#major_cdescribe').val('')
            })
            $('#practice_add').click(function () {
                var practice = {
                    '开始时间': $('#practice_starttime').val(),
                    '结束时间': $('#practice_endtime').val(),
                    '职务': $('#practice_job').val(),
                    '职务描述': $('#practice_describe').val()
                };
                var append='<div><label class="btn-info delete" >'+JSON.stringify(practice)+'</label>';

                practice = practice['开始时间']+'_'+ practice['结束时间']+'_'+ practice['职务']+'_'
                    +'_'+ practice['职务描述'];
                append += '<input type="hidden" name="ResumeForm[practices][]" value="'+practice+'">';
                $('#practice_inserted').append(append);
                $('#practice_starttime').val('');
                $('#practice_endtime').val('');
                $('#practice_job').val('');
                $('#practice_describe').val('')
            })
            $('#skill_add').click(function () {
                var practice = {
                    '技能/语言': $('#skill2').find("option:selected").text(),
                    '掌握程度': $('#ability').find("option:selected").text()
                };
                var append='<div><label class="btn-info delete" >'+JSON.stringify(practice)+'</label>';

                practice = $('#skill2').val()+'_'+ $('#ability').val();
                append += '<input type="hidden" name="ResumeForm[skills][]" value="'+practice+'">';
                $('#skill_inserted').append(append);
            })
            $('#cert_add').click(function () {
                var cert = {
                    '获得时间': $('#cert_time').val(),
                    '证书': $('#cert2').find("option:selected").text(),
                    '成绩': $('#score').val()
                };
                var append='<div><label class="btn-info delete" >'+JSON.stringify(cert)+'</label>';

                cert = cert['获得时间']+'_'+ $('#cert2').val()+'_'+ cert['成绩'];
                append += '<input type="hidden" name="ResumeForm[certs][]" value="'+cert+'">';
                $('#cert_inserted').append(append);
                $('#cert_time').val('');
                $('#score').val('')
            })
            $('#train_add').click(function () {
                var train = {
                    '开始时间': $('#train_starttime').val(),
                    '结束时间': $('#train_endtime').val(),
                    '培训机构': $('#ctrainname').val(),
                    '培训地点': $('#ctrainplace').val(),
                    '课程': $('#ctrainlesson').val(),
                    '描述': $('#ctraindescribe').val()
                };
                var append='<div><label class="btn-info delete" >'+JSON.stringify(train)+'</label>';

                train = train['开始时间']+'_'+ train['结束时间']+'_'+ train['培训机构']+'_'+ train['培训地点']+'_'+ train['课程']+'_'+ train['描述'];
                append += '<input type="hidden" name="ResumeForm[trains][]" value="'+train+'">';
                $('#train_inserted').append(append);
                $('#train_starttime').val(''),
                $('#train_endtime').val(''),
                $('#ctrainname').val(''),
                $('#ctrainplace').val(''),
                $('#ctrainlesson').val(''),
                $('#ctraindescribe').val('')
            })
        });

        $(document).on('click', "[class ='btn-info delete']", function () {
            $(this).parent().remove();
        });
        $(document).on('click', "[class ='btn-info area']", function () {
            var areas = [];
            $(this).siblings('.btn-info').each(function () {
                areas.push($(this).attr('data-value'));
            });
            $('#ResumeForm_expectarea').val(areas.join(','));
            $(this).remove();
        });
        $(document).on('click', "[class ='btn-info func']", function () {
            var func = [];
            $(this).siblings('.btn-info').each(function () {
                func.push($(this).attr('data-value'));
            });
            $('#ResumeForm_expectfunc').val(func.join(','));
            $(this).remove();
        });
        $(document).on('click', "[class ='btn-info ind']", function () {
            var inds = [];
            $(this).siblings('.btn-info').each(function () {
                inds.push($(this).attr('data-value'));
            });
            $('#ResumeForm_expectindustry').val(inds.join(','));
            $(this).remove();
        })
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
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">账号信息</h3>
                </div>
                <div class="panel-body">
                    <div  class="input-group">
                        <span class="input-group-addon">请选择账号所属网站</span>
                        <div><?php echo CHtml::dropDownList( 'ResumeForm[sites]', $selected, $sites, array('class' =>'form-control'));?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">个人信息</h3>
                </div>
                <div class="panel-body">
                    <div  class="input-group">
                        <span class="input-group-addon">姓名</span>
                        <?php echo $form->textField($model,'cname' , array('class' =>'form-control')); ?>
                        <?php echo $form->error($model,'cname'); ?>
                    </div>

                    <div  class="input-group">
                        <span class="input-group-addon">性别</span>
                        <div ><?php echo CHtml::dropDownList( 'ResumeForm[sex]', 0 , array( 0 => '男', 1 => '女') , array('class' =>'form-control'));?></div>
                    </div>

                    <div  class="input-group">
                        <span class="input-group-addon">工作年限</span>
                        <div><?php echo CHtml::dateField( 'ResumeForm[workyear]', '', array('class' =>'form-control'));?>
                        </div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">手机号</span>
                        <?php echo $form->telField($model,'mobilephone', array('class' =>'form-control')); ?>
                        <?php echo $form->error($model,'mobilephone'); ?>
                    </div>

                    <div  class="input-group">
                        <span class="input-group-addon">电子邮箱</span>
                        <?php echo $form->emailField($model,'email', array('class' =>'form-control')); ?>
                        <?php echo $form->error($model,'email'); ?>
                    </div>

                    <div  class="input-group">
                        <span class="input-group-addon">当前工作状态</span>
                        <div><?php echo CHtml::dropDownList( 'ResumeForm[current_situation]', 0 , array(), array('class' =>'form-control'));?></div>
                    </div>

                    <div  class="input-group">
                        <span class="input-group-addon">目前年收入</span>
                        <?php echo $form->numberField($model,'salary', array('class' =>'form-control')); ?>
                        <?php echo $form->error($model,'salary'); ?>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">目前居住地</span>

                        <div ><?php echo CHtml::dropDownList( 'province', 0 , array(), array('class' =>'form-control'));?></div>
                        <div ><?php echo CHtml::dropDownList( 'city', 0 , array(), array('class' =>'form-control'));?></div>
                        <div ><?php echo CHtml::hiddenField('ResumeForm[area]')?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">求职意向</h3>
                </div>
                <div class="panel-body">
                    <div id="city_selected" class="input-group">
                        <span class="input-group-addon">已选择城市（点击对应标签即可删除）</span>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">请选择工作城市</span>

                        <div ><?php echo CHtml::dropDownList( 'expect_province', 0 , array(), array('class' =>'form-control'));?></div>
                        <div ><?php echo CHtml::dropDownList( 'expect_city', 0 , array(), array('class' =>'form-control'));?></div>
                        <div ><?php echo CHtml::hiddenField('ResumeForm[expectarea]', "")?></div>
                        <div ><?php echo CHtml::button('添加', array('class' => 'btn', 'id' => 'area_add'))?></div>
                    </div>

                    <div  class="input-group">
                        <span class="input-group-addon">工作类型</span>
                        <div><?php echo CHtml::dropDownList( 'ResumeForm[seektype]', 0 , array(), array('class' =>'form-control') );?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">自我评价</span>
                        <?php echo $form->textArea($model,'selfintro', array('class' =>'form-control')); ?>
                        <?php echo $form->error($model,'selfintro'); ?>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">入职时间</span>
                        <div><?php echo CHtml::dropDownList( 'ResumeForm[entrytime]', 1 , array(), array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">关键字</span>
                        <?php echo $form->textField($model,'resumekey', array('class' =>'form-control')); ?>
                        <?php echo $form->error($model,'resumekey'); ?>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">期待职位</span>
                        <?php echo $form->textField($model,'expectposition', array('class' =>'form-control')); ?>
                        <?php echo $form->error($model,'expectposition'); ?>
                    </div>
                    <div id="func_selected" class="input-group">
                        <span class="input-group-addon">已选择职能（点击对应标签即可删除）</span>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">请选择职能</span>

                        <div ><?php echo CHtml::dropDownList( 'expect_func1', 0 , array(), array('class' =>'form-control'));?></div>
                        <div ><?php echo CHtml::dropDownList( 'expect_func2', 0 , array(), array('class' =>'form-control'));?></div>
                        <div ><?php echo CHtml::hiddenField('ResumeForm[expectfunc]', '' )?></div>
                        <div ><?php echo CHtml::button('添加', array('class' => 'btn', 'id' => 'func_add'))?></div>
                    </div>
                    <div id="industry_selected" class="input-group">
                        <span class="input-group-addon">已选择行业（点击对应标签即可删除）</span>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">请选择行业</span>

                        <div ><?php echo CHtml::dropDownList( 'expect_industry1', 0 , array(), array('class' =>'form-control'));?></div>
                        <div ><?php echo CHtml::dropDownList( 'expect_industry2', 0 , array(), array('class' =>'form-control'));?></div>
                        <div ><?php echo CHtml::hiddenField('ResumeForm[expectindustry]', '' )?></div>
                        <div ><?php echo CHtml::button('添加', array('class' => 'btn', 'id' => 'industry_add'))?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">薪资类型</span>
                        <div><?php echo CHtml::dropDownList( 'ResumeForm[salarytype]', 1 , array(), array('class' =>'form-control'));?></div>
                        <div id="salary"> <?php echo CHtml::dropDownList( 'ResumeForm[inputsalary]', 1 , array(), array('class' =>'form-control'));?></div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">工作经历
                        <span class="btn-success" id="work_add">添加</span></h3>
                </div>
                <div class="panel-body">
                    <div id="work_inserted"></div>
                    <div  class="input-group">
                        <span class="input-group-addon">开始时间</span>
                        <div><?php echo CHtml::dateField( 'timefrom', '', array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">结束时间</span>
                        <div><?php echo CHtml::dateField( 'timeto', '', array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">公司</span>
                        <div><?php echo CHtml::textField( 'ccompname', '', array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">职能</span>
                        <div ><?php echo CHtml::dropDownList( 'workfunc1', 0 , array(), array('class' =>'form-control'));?></div>
                        <div ><?php echo CHtml::dropDownList( 'workfunc2', 0 , array(), array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">行业</span>
                        <div ><?php echo CHtml::dropDownList( 'workindustry1', 0 , array(), array('class' =>'form-control'));?></div>
                        <div ><?php echo CHtml::dropDownList( 'workindustry2', 0 , array(), array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">职位</span>
                        <div><?php echo CHtml::textField( 'cposition', '', array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">公司规模</span>
                        <div ><?php echo CHtml::dropDownList( 'companysize', 0 , array(), array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">部门</span>
                        <div ><?php echo CHtml::textArea( 'cdepartment', '' , array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">公司性质</span>
                        <div ><?php echo CHtml::dropDownList( 'companytype', 0 , array(), array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">工作描述</span>
                        <div><?php echo CHtml::textArea('cworkdescribe','', array('class' =>'form-control')); ?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">工作类型</span>
                        <div ><?php echo CHtml::dropDownList( 'worktype', 0 , array(0=>'全职', 1=>'兼职'), array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">海外经历</span>
                        <div ><?php echo CHtml::dropDownList( 'workoverseas', 0 , array(0=>'无海外经历',1=>'有海外经历'), array('class' =>'form-control'));?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">项目经历
                        <span class="btn-success" id="project_add">添加</span></h3>
                </div>
                <div class="panel-body">
                    <div id="project_inserted"></div>
                    <div  class="input-group">
                        <span class="input-group-addon">开始时间</span>
                        <div><?php echo CHtml::dateField( 'starttime', '', array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">结束时间</span>
                        <div><?php echo CHtml::dateField( 'endtime', '', array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">所属公司</span>
                        <div><?php echo CHtml::textField( 'ccompname_project', '', array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">项目</span>
                        <div><?php echo CHtml::textField( 'cprojectname', '', array('class' =>'form-control'));?></div>
                    </div>

                    <div  class="input-group">
                        <span class="input-group-addon">项目描述</span>
                        <div ><?php echo CHtml::textArea( 'cdescribe', '' , array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">责任描述</span>
                        <div ><?php echo CHtml::textArea( 'cfunction', '' , array('class' =>'form-control'));?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">教育经历
                        <span class="btn-success" id="school_add">添加</span></h3>
                </div>
                <div class="panel-body">
                    <div id="school_inserted"></div>
                    <div  class="input-group">
                        <span class="input-group-addon">开始时间</span>
                        <div><?php echo CHtml::dateField( 'school_starttime', '', array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">结束时间</span>
                        <div><?php echo CHtml::dateField( 'school_endtime', '', array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">学校</span>
                        <div><?php echo CHtml::textField( 'cschoolname', '', array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">学历/学位</span>
                        <div ><?php echo CHtml::dropDownList( 'degree', 0 , array(), array('class' =>'form-control'));?></div>
                    </div>

                    <div  class="input-group">
                        <span class="input-group-addon">专业</span>
                        <div ><?php echo CHtml::dropDownList( 'major1', 0 , array(), array('class' =>'form-control'));?></div>
                        <div ><?php echo CHtml::dropDownList( 'major2', 0 , array(), array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">全日制</span>
                        <div ><?php echo CHtml::dropDownList( 'isfulltime', 0 , array(0=>'非全日制',1=>'全日制'), array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">专业描述</span>
                        <div ><?php echo CHtml::textArea( 'major_cdescribe', '' , array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">海外经历</span>
                        <div ><?php echo CHtml::dropDownList( 'isoverseas', 0 , array(0=>'无海外经历',1=>'有海外经历'), array('class' =>'form-control'));?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">校内荣誉
                        <span class="btn-success" id="award_add">添加</span></h3>
                </div>
                <div class="panel-body">
                    <div id="award_inserted"></div>
                    <div  class="input-group">
                        <span class="input-group-addon">获奖时间</span>
                        <div><?php echo CHtml::dateField( 'award_time', '', array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">奖项</span>
                        <div><?php echo CHtml::textField( 'award_name', '', array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">级别</span>
                        <div><?php echo CHtml::textField( 'award_class', '', array('class' =>'form-control'));?></div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">校内职务
                        <span class="btn-success" id="practice_add">添加</span></h3>
                </div>
                <div class="panel-body">
                    <div id="practice_inserted"></div>
                    <div  class="input-group">
                        <span class="input-group-addon">开始时间</span>
                        <div><?php echo CHtml::dateField( 'practice_starttime', '', array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">结束时间</span>
                        <div><?php echo CHtml::dateField( 'practice_endtime', '', array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">职务</span>
                        <div><?php echo CHtml::textField( 'practice_job', '', array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">职务描述</span>
                        <div><?php echo CHtml::textField( 'practice_describe', '', array('class' =>'form-control'));?></div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">技能/语言
                        <span class="btn-success" id="skill_add">添加</span></h3>
                </div>
                <div class="panel-body">
                    <div id="skill_inserted"></div>

                    <div  class="input-group">
                        <span class="input-group-addon">技能/语言</span>
                        <div ><?php echo CHtml::dropDownList( 'skill1', 0 , array(), array('class' =>'form-control'));?></div>
                        <div ><?php echo CHtml::dropDownList( 'skill2', 0 , array(), array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">掌握程度</span>
                        <div ><?php echo CHtml::dropDownList( 'ability', 0 , array(), array('class' =>'form-control'));?></div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">证书
                        <span class="btn-success" id="cert_add">添加</span></h3>
                </div>
                <div class="panel-body">
                    <div id="cert_inserted"></div>
                    <div  class="input-group">
                        <span class="input-group-addon">获得时间</span>
                        <div><?php echo CHtml::dateField( 'cert_time', '', array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">证书</span>
                        <div ><?php echo CHtml::dropDownList( 'cert1', 0 , array(), array('class' =>'form-control'));?></div>
                        <div ><?php echo CHtml::dropDownList( 'cert2', 0 , array(), array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">成绩</span>
                        <div><?php echo CHtml::textField( 'score', '', array('class' =>'form-control'));?></div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">培训
                        <span class="btn-success" id="train_add">添加</span></h3>
                </div>
                <div class="panel-body">
                    <div id="train_inserted"></div>
                    <div  class="input-group">
                        <span class="input-group-addon">开始时间</span>
                        <div><?php echo CHtml::dateField( 'train_starttime', '', array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">结束时间</span>
                        <div><?php echo CHtml::dateField( 'train_endtime', '', array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">培训机构</span>
                        <div><?php echo CHtml::textField( 'ctrainname', '', array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">培训地点</span>
                        <div><?php echo CHtml::textField( 'ctrainplace', '', array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">课程</span>
                        <div><?php echo CHtml::textField( 'ctrainlesson', '', array('class' =>'form-control'));?></div>
                    </div>
                    <div  class="input-group">
                        <span class="input-group-addon">描述</span>
                        <div><?php echo CHtml::textArea( 'ctraindescribe', '', array('class' =>'form-control'));?></div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row buttons">
            <?php echo CHtml::submitButton('Submit', array('class' => 'btn'  )); ?>
        </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->
