<?php
$this->breadcrumbs = array(
    'Quan Ly Tinh Thanh Quan Huyen Phuong Xa' => array('/quanLyTinhThanhQuanHuyenPhuongXa'),
    'Quanly',
);
?>
<?php
$arrttp = $data[0];
$arrquanhuyen = $data[1];
$arrphuongxa = $data[2];
?>
<input id="hiddenTTP" type="hidden" value="<?php echo $data[3] ?>" />
<input id="hiddenQH" type="hidden" value="<?php echo $data[4] ?>" />
<div class="wrapperttp">
    <div id="Grid_tinh_thanh_pho">
        <table>
            <th>Tỉnh Thành Phố</th><th><?php echo "....."; ?></th>
            <?php foreach ($arrttp as &$value): ?>
                <tr>
                    <td class="row_ttp" id="<?php echo $value['idTinh_thanh_pho']; ?>"><?php echo $value['Ten_tinh_thanhpho'] ?></td>
                    <td><input class="btdelete_thanhpho" id=<?php echo $value['idTinh_thanh_pho'] ?> type="button" value="Delete" name="yt0"/></td>
                </tr>
            <?php endforeach; ?>



            </table>
        </div>
        <table>
            <tr>
                <td>
                <?php echo CHtml::textField('Text', '', array('id' => 'tb_Ten_tinh_thanhpho'));
                ?>
            </td>
            <td>
                <?php
                echo CHtml::ajaxButton(
                        'Thêm',
                        'index.php?r=quantri/QuanLyTinhThanhQuanHuyenPhuongXa/Themmoitinhthanh',
                        array(
                            'type' => 'post',
                            'update' => '#Grid_tinh_thanh_pho',
                            'data' => "js:{tentinhthanh: $('#tb_Ten_tinh_thanhpho').val()}")
                );
                ?>
            </td>
        </tr>
    </table>
    
</div>

<div class="wrapperqh">
    <div id="Grid_qh">
        <table>
            <th>Quận Huyện</th><th><?php echo "....."; ?></th>
            <?php foreach ($arrquanhuyen as &$value): ?>
                    <tr>
                        <td class="row_qh" id="<?php echo $value['idQuan_huyen'];?>"><?php echo $value['Ten_quan_huyen'] ?></td>
                        <td><input class="btdelete_qh" id=<?php echo $value['idQuan_huyen']; ?> type="button" value="Delete" name="yt0"/></td>
                    </tr>
            <?php endforeach; ?>



                </table>
            </div>
            <table>
                <tr>
                    <td>
                <?php echo CHtml::textField('Text', '', array('id' => 'tb_quan_huyen'));
                ?>
                </td>
                <td>
                <?php
                    echo CHtml::ajaxButton(
                            'Thêm',
                            'index.php?r=quantri/QuanLyTinhThanhQuanHuyenPhuongXa/Themquanhuyen',
                            array(
                                'type' => 'post',
                                'update' => '#Grid_qh',
                                'data' => "js:{tenqh: $('#tb_quan_huyen').val(),idttp:$('#hiddenTTP').val()}")
                    );
                ?>
                </td>
            </tr>
        </table>

    </div>


    <div class="wrapperqh">
        <div id="Grid_px">
            <table>
                <th>Phường xã</th><th><?php echo "....."; ?></th>
            <?php foreach ($arrphuongxa as &$value): ?>
                        <tr>
                            <td class="row_px" id="<?php echo $value['idPhuong_xa'];?>"><?php echo $value['Ten_phuong_xa'] ?></td>
                            <td><input class="btdelete_px" id=<?php echo $value['idPhuong_xa'] ?> type="button" value="Delete" name="yt0"/></td>
                        </tr>
            <?php endforeach; ?>



                    </table>
                </div>
                <table>
                    <tr>
                        <td>
                <?php echo CHtml::textField('Text', '', array('id' => 'tb_phuong_xa'));
                ?>
                    </td>
                    <td>
                <?php
                        echo CHtml::ajaxButton(
                                'Thêm',
                                'index.php?r=quantri/QuanLyTinhThanhQuanHuyenPhuongXa/ThemPhuongXa',
                                array(
                                    'type' => 'post',
                                    'update' => '#Grid_px',
                                    'data' => "js:{tenpx: $('#tb_phuong_xa').val(),idqh:$('#hiddenQH').val()}")
                        );
                ?>
            </td>
        </tr>
    </table>
   
</div>

