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
                    <div id="main_menu">
                        <div class="main clearfix">
                            <ul id="nav-one" class="nav clearfix">
                                <li>

                                    <a href="#item1"><span>Trang chủ<span></a>

                                </li>
                                <li>
                                    <a href="#item2"><span>Tin tức &amp; Trải nghiệm<span></a>
                                    <ul>
                                        <li><a href="#item2.1">item 2.1</a></li>
                                        <li><a href="#item2.2">item 2.2</a></li>

                                    </ul>
                                </li>
                                <li>
                                    <a href="#item3"><span>Mua bán địa ốc<span></a>
                                    <ul>
                                        <li><a href="#item3.1">item 3.1</a></li>
                                        <li><a href="#item3.2">item 3.2</a></li>

                                    </ul>
                                </li>
                                <li>
                                    <a href="#item4"><span>Dự án địa ốc<span></a>
                                    <ul>
                                        <li><a href="#item4.1">item 4.1</a></li>
                                        <li><a href="#item4.2">item 4.2</a></li>

                                        <li><a href="#item4.3">item 4.3</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#item4"><span>Doanh nghiệp địa ốc<span></a>
                                    <ul>
                                        <li><a href="#item4.1">item 4.1 item 4.1 item 4.1 item 4.1</a></li>
                                        <li><a href="#item4.2">item 4.2</a></li>

                                        <li><a href="#item4.3">item 4.3</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#item4"><span>Liên hệ<span></a>
                                </li>
                            </ul>
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