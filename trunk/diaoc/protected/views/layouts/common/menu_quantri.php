<ul id="nav-one" class="nav clearfix">
    <li> 
        <a href="<?php echo App::getUrl(); ?> "><span>Trang chủ<span></a>
    </li>
    <li> 
        <a href="<?php echo $this->createUrl('/quantri'); ?> "><span>Quản trị<span></a>
    </li>
    <li>
        <a href="<?php  echo $this->createUrl('/quantri/danhmuc/quanly');?>"><span>Danh mục<span></a>
        <ul>
            <li><a href="<?php  echo $this->createUrl('/quantri/danhmuc/quanly');?>">Quản lý danh mục</a></li>    
            <li><a href="<?php  echo $this->createUrl('/quantri/danhmuc/them');?>">Thêm danh mục</a></li>    
        </ul>
    </li>
    <li>
        <a href="<?php  echo $this->createUrl('/quantri/tintuc/index');?>"><span>Tin tức<span></a>
        <ul>
            <li><a href="<?php  echo $this->createUrl('/quantri/tintuc/quanly');?>">Quản lý tin tức</a></li>    
            <li><a href="<?php  echo $this->createUrl('/quantri/tintuc/them');?>">Thêm tin tức</a></li>    
        </ul>
    </li>
    <li>
        <a href="#"><span>Địa ốc<span></a>
        <ul>
            <li><a href="<?php  echo $this->createUrl('/quantri/batdongsan');?>">Loại địa ốc</a></li>        
        </ul>
    </li>
<?php
    if(Yii::app()->user->isGuest):
?>
    <li class="right">
        <a href="<?php  echo $this->createUrl('/khachhang/dangky');?>"><span>Đăng ký<span></a>
    </li>
    <li class="right">
        <a href="<?php  echo $this->createUrl('/trangchu/dangnhap');?>"><span>Đăng nhập<span></a>
    </li>
<?php
    else:
?>
    <li class="right">
        <a href="<?php  echo $this->createUrl('/trangchu/dangxuat');?>"><span>Đăng xuất<span></a>
    </li>
    <li class="right"> 
        <a href="<?php  echo $this->createUrl('/bangdieukhien/');?>">Chào bạn <?php echo Yii::app()->user->name; ?></a>
    </li>
<?php
    endif;
?>                 
</ul>