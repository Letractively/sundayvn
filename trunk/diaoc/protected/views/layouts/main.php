<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css" />

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>

        <div id="container">
            <div id="wrapper">
                <div id="t">
                    <div id="hd">
                        <div class="logo_banner">
                        <span class="logo">
                            <a title="DiaOcOnline.vn" href="#">
                                <img width="1" height="1" alt="" src="http://static.diaoconline.vn/images/blank.gif">
                            </a>
                        </span>
                        <div id="divBanner70" class="banner_top">
                            <div class="bannerHide">
                                <a target="_Blank" href="#">
                                    <img class="" width="728px" alt="" src="../images/">
                                </a>
                            </div>
                            <div class="bannerShow">
                                <a target="_Blank" href="http://www.diaoconline.vn/quangCao/3254/70/">
                                    <img class="" width="728px" alt="" src="images/30_banner728x90_843.gif">
                                </a>
                            </div>
                        </div>
                    </div>
                    </div>
                    

                     <div id="mn">
                     <?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Trang chủ', 'url'=>array('/site/index')),
				array('label'=>'Tin tức trải nghiệm', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Siêu thị địa ốc', 'url'=>array('/site/contact')),
				array('label'=>'Doanh nghiệp địa ốc', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
                            )); ?>
                      </div>
                   

                    <?php //if (isset($this->breadcrumbs)): ?>
                    <?php ?>
                    <?php //endif ?>

                    <?php //echo $content; ?>

                    
                </div>
            </div><!-- page -->

    </body>
</html>