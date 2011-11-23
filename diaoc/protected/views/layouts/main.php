<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.6.2.min.js"></script> 
        <base href="<?php echo Yii::app()->request->baseUrl; ?>/" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/addons.css" rel="stylesheet"  />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" rel="stylesheet"  />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" rel="stylesheet"  />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/star-light.css" rel="stylesheet"  />
        <link type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" />    
        
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-1.8.16.custom.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/common-script.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.bxSlider.min.js" type="text/javascript"></script>
    </head>

    <body>
        <div id="wrapper">
            <div id="header">
                <div class="main clearfix">
                    <div id="logo">
                        <h1>DiaOcXanhOnline.vn</h1>
                        <h2>Thông tin địa ốc tức thì</h2>
                    </div>
                    <div id="top_banner">
                        <img src="images/30_banner728x90_843.gif" />
                    </div>
                    <div id="main_menu">
                        <div class="main clearfix">
                            <?php 
                                $this->renderPartial('////layouts/common/menu'

                                );?>
                        </div>
                    </div>
                </div>
            </div>
            <div id="container">
                <div class="main clearfix">
                    <div id="content">
                        <?php echo $content; ?>
                    </div>
                    <div id="sidebar">
                    <?php
                        $this->beginWidget('zii.widgets.CPortlet', array(
                            'title'=>'Thao tác',
                        ));
                        $this->widget('zii.widgets.CMenu', array(
                            'items'=>$this->menu,
                            'htmlOptions'=>array('class'=>'operations'),
                        ));
                        $this->endWidget();
                    ?>
                    </div><br/><!-- sidebar -->
                </div>
            </div>
            <div id="footer">
                <div class="main">
                    <div id="bottom_menu">
                        <div class="main clearfix">
                            <ul>
                                <li><a href="#">Trang chủ</a></li>
                                <li><a href="#">Tin tức &amp; Trải nghiệm</a></li>
                                <li><a href="#">Mua bán địa ốc</a></li>
                                <li><a href="#">Doanh nghiệp địa ốc</a></li>
                                <li><a href="#">Dự án</a></li>
                            </ul>
                        </div>
                    </div>
                    <div id="copyright">
                        <div class="main clearfix">
                            <div id="debug">
                                <p>Copyright © 2011 - 2012 DiaOcXanhOnline Corp. ® Các thông tin trên website hiện tại chỉ mang tính chất minh họa và thử nghiệm.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
<script type="text/javascript">

$().ready(function(){
        $('.btdelete_thanhpho').click(function() {
            //var t = confirm('Bạn thấy có muốn xóa tỉnh thành này không');
            // if(t){
            var id=$(this).attr('id');
            $.ajax({
                type:'POST',
                data:'id='+id,
                url:'index.php?r=quantri/QuanLyTinhThanhQuanHuyenPhuongXa/Xoatinhthanh',
                success: function (html){
                    $('#Grid_tinh_thanh_pho').html(html);
                    return false;
                }

            })
        });
        $('.btdelete_qh').click(function() {
                var idtp= $('#hiddenTTP').val();
               // var t = confirm('Bạn thấy có muốn xóa quận huyện này không');
                //if(t){
                    var id=$(this).attr('id');
                    $.ajax({
                        type:'POST',
                        data:'idqh='+id+'&idtp='+idtp,
                        url:'index.php?r=quantri/QuanLyTinhThanhQuanHuyenPhuongXa/XoaQuanHuyen',
                        success: function (html){
                            $('#Grid_qh').html(html);
                            return false;
                        }

                    })
               // }
            });

         $('.row_ttp').click(function(){
           
            var id=$(this).attr('id');
            $('#hiddenTTP').val(id);
             $.ajax({
                    type:'POST',
                    data:'idtp='+id,
                    url:'index.php?r=quantri/QuanLyTinhThanhQuanHuyenPhuongXa/LoadQuanHuyen',
                    success: function (html){
                        $('#Grid_qh').html(html);
                        return false;
                    }

                })
        });
         $('.row_qh').click(function(){

            var id=$(this).attr('id');
            $('#hiddenQH').val(id);
             $.ajax({
                    type:'POST',
                    data:'idqh='+id,
                    url:'index.php?r=quantri/QuanLyTinhThanhQuanHuyenPhuongXa/Loadphuongxa',
                    success: function (html){
                        $('#Grid_px').html(html);
                        return false;
                    }

                })
        });
});
         
    </script>
</html>