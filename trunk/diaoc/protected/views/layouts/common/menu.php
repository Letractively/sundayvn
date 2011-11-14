<ul id="nav-one" class="nav clearfix">
    <li>

        <a href="<?php echo Yii::app()->request->baseUrl; ?> "><span>Trang chủ<span></a>

    </li>
    <li>
        <a href="<?php  echo $this->createUrl('site/contact');?>"><span>Tin tức &amp; Trải nghiệm<span></a>
        <ul>
            <li><a href="#item2.1">Tin Địa Ốc</a></li>
            <li><a href="#item2.2">Khám phá - Trải nghiệm</a></li>
            <li><a href="#item2.2">Thư viện Địa Ốc</a></li>
            <li><a href="#item2.2">Cafe Luật</a></li>

        </ul>
    </li>
    <li>
        <a href="#item3"><span>Mua bán địa ốc<span></a>
        <ul>
            <li><a href="#item2.1">Nhà phố</a></li>
            <li><a href="#item2.1">Nhà tạm</a></li>
            <li><a href="#item2.1">Villa - Biệt thự</a></li>  
            <li><a href="#item2.1">Căn hộ cao cấp</a></li>
            <li><a href="#item2.1">Căn hộ chung cư</a></li>
            <li><a href="#item2.1">Văn phòng</a></li>              
            <li><a href="#item2.1">Đất cho sản xuất</a></li>   
            <li><a href="#item2.1">Đất dự án - Quy hoạch</a></li>   
        </ul>
    </li>
    <li>
        <a href="#item4"><span>Dự án địa ốc<span></a>
        <ul>
            <li><a href="#item4.1">Môi giới địa ốc</a></li>
            <li><a href="#item4.2">Vật liệu xây dựng</a></li>
        </ul>
    </li>
    <li>
        <a href="#item4"><span><span></a>
        <ul>
            <li><a href="#item4.1">item 4.1 item 4.1 item 4.1 item 4.1</a></li>
            <li><a href="#item4.2">item 4.2</a></li>

            <li><a href="#item4.3">item 4.3</a></li>
        </ul>
    </li>
    <li>
        <a href="<?php  echo $this->createUrl('site/contact');?>"><span>Liên hệ<span></a>
    </li>
    <?php
        if(Yii::app()->user->isGuest):
    ?>
    <li class="right">
        <a href="<?php  echo $this->createUrl('khachhangCanhan/Dangky');?>"><span>Đăng ký<span></a>
    </li>
    <li class="right">
        <a href="<?php  echo $this->createUrl('khachhangcanhan/dangnhap');?>"><span>Đăng nhập<span></a>
    </li>
    <?php
        else:
    ?>
    <li class="right">
        <a href="<?php  echo $this->createUrl('trangchu/dangxuat');?>"><span>Đăng xuất<span></a>
    </li>
    <li class="right">
        <a href="#">Chào bạn <?php echo Yii::app()->user->name; ?></a>
    </li>
    <?php
        endif;
    ?>
</ul>