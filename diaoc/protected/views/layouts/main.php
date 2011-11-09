<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/addons.css" rel="stylesheet"  />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" rel="stylesheet"  />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/star-light.css" rel="stylesheet"  />

    </head>

    <body>
        <div id="wrapper">
            <div id="header">
                <div class="main clearfix">
                    <div id="logo">
                        <h1>DiaOcOnline.vn</h1>
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
                </div>
            </div>
        </div>

    </body>

</html>