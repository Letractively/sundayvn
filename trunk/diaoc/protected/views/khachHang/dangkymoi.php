<?php
$this->beginContent('//layouts/main');


$this->breadcrumbs=array(
	'Dangky'=>array('/Dangkymoi'),
	'Dangkymoi',
);?>

<h2 align='center'>Trang Đăng Ký</h2>
<?php
    $form = $this->beginWidget('CActiveForm', array(
                                                    'id' => 'RegisterForm',
                                                    'enableAjaxValidation'=>true,
                                                    'enableClientValidation' =>true,
                                                    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
                                                    'clientOptions'=>array(
                                                       'validateOnChange'=>true,
                                                        'validateOnSubmit'=>true
                                                    )
                                                    ));
?>
    <?php  echo $form->errorSummary($model);?>
   <?php
        echo "{$form->labelEx($model,'Ten_dang_nhap')}<br/>";
        echo $form->textField($model,'Ten_dang_nhap');
        echo "{$form->error($model,'Ten_dang_nhap')}";

        echo "<br/>{$form->labelEx($model,'Mat_khau')}<br/>";
        echo $form->passwordField($model,'Mat_khau');
        echo "{$form->error($model,'Mat_khau')}";

        echo "<br/>{$form->labelEx($model,'Nhap_lai_pass')}<br/>";
        echo $form->passwordField($model,'Nhap_lai_pass');
        echo "{$form->error($model,'Nhap_lai_pass')}";

        echo "<br/>{$form->labelEx($model,'Email')}<br/>";
        echo $form->textField($model,'Email');
        echo "{$form->error($model,'Email')}";

        echo "<br/>{$form->labelEx($model,'Ho_va_ten')}<br/>";
        echo $form->textField($model,'Ho_va_ten');
        echo "{$form->error($model,'Ho_va_ten')}";

        echo "<br/><br/>{$form->labelEx($model,'Ngay_sinh')}  ";
        
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name'=>'Ngay_sinh',
            'model'=>$model,
            'attribute'=>'Ngay_sinh',
            'value'=>$model->Ngay_sinh,
            

            //====
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat'=>'dd-mm-yy',
                'buttonText'=>'...',

            ),
            'htmlOptions' => array(
                'style' => 'height:20px;'
            ),
        ));
        echo "<br/>{$form->labelEx($model,'Gioi_tinh')}<br/>";
        echo $form->radioButtonList($model,'Gioi_tinh',array('nam','nu'));

      
        
        echo "<br/>{$form->labelEx($model,'Dia_chi')}<br/>";
        echo $form->textField($model,'Dia_chi');
        echo "{$form->error($model,'Dia_chi')}";

        echo "<br/>{$form->labelEx($model,'Dien_thoai_ban')}<br/>";
        echo $form->textField($model,'Dien_thoai_ban');

        echo "<br/>{$form->labelEx($model,'Dien_thoai_di_dong')}<br/>";
        echo $form->textField($model,'Dien_thoai_di_dong');
        echo "{$form->error($model,'Dien_thoai_di_dong')}";

        echo "<br/>{$form->labelEx($model,'Ladoanhgnhiep')}<br/>";
        echo $form->radioButtonList($model,'Ladoanhgnhiep',array('Cá nhân','Nhà môi giới'));
        echo "{$form->error($model,'Ladoanhgnhiep')}";

        echo "<br/>{$form->labelEx($model,'Ten_cong_ty')}<br/>";
        echo $form->textField($model,'Ten_cong_ty');
        echo "{$form->error($model,'Ten_cong_ty')}";
        
        echo "<br/>{$form->labelEx($model,'Dia_chi_cong_ty')}<br/>";
        echo $form->textField($model,'So_dien_thoai_cong_ty');
        echo "{$form->error($model,'So_dien_thoai_cong_ty')}";
    
        echo "<br/>{$form->labelEx($model,'linh_vuc_hoat_dong')}<br/>";
        echo $form->textField($model,'linh_vuc_hoat_dong');
        echo "{$form->error($model,'linh_vuc_hoat_dong')}";

        echo "<br/>{$form->labelEx($model,'gioi_thieu_cong_ty')}<br/>";
        echo $form->textArea($model,'gioi_thieu_cong_ty');
        echo "{$form->error($model,'gioi_thieu_cong_ty')}";

        echo "<br/>{$form->labelEx($model,'website')}<br/>";
        echo $form->textField($model,'website');
        echo "{$form->error($model,'website')}";
        
        echo "<br/>{$form->labelEx($model,'Url_anh_dai_dien')}";
        echo CHtml::activeFileField($model, 'image');
        echo "<br/>";
         $this->widget('CCaptcha',array(
                                                    'buttonLabel'        =>    'Lấy code mới',
                                                    'clickableImage'    =>    true,
                                                    'imageOptions'        =>    array('id' => 'captchaimg')
                                                    )); 



        echo "<br/>{$form->labelEx($model,'codeCaptcha')}<br/>";
        echo $form->textField($model,'codeCaptcha');
        echo "<br/>";
        echo CHtml::submitButton('Đăng Ký',array('id'=>'frmReg','name'=>'RegisterForm'));

   ?>

<?php
    $this->endWidget();
    //xuất ký tự xuống dòng cho dễ nhìn
    echo "\n\n";
?>


<?php

    echo "\n";
?>
<?php $this->endContent(); ?>


