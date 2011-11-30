

$('.btdelete_thanhpho').live('click',function() {
    //var t = confirm('Bạn thấy có muốn xóa tỉnh thành này không');
    // if(t){
    var id=$(this).attr('id');
    $.ajax({
        type:'POST',
        data:'id='+id,
        url:'index.php?r=quantri/Quanlytthp/Xoatinhthanh',
        success: function (html){
            $('#Grid_tinh_thanh_pho').html(html);
            return false;
        }

    })
});

$('.btdelete_qh').live('click',(function() {
    var idtp= $('#hiddenTTP').val();
    alert('aaaaa');
    // var t = confirm('Bạn thấy có muốn xóa quận huyện này không');
    //if(t){
    var id=$(this).attr('id');
    $.ajax({
        type:'POST',
        data:'idqh='+id+'&idtp='+idtp,
        url:'index.php?r=quantri/Quanlytthp/XoaQuanHuyen',
        success: function (html){
            $('#Grid_qh').html(html);
            return false;
        }

    })
// }
})
);



$('.btdelete_px').live('click',(function() {
    var idqh= $('#hiddenQH').val();
    // var t = confirm('Bạn thấy có muốn xóa quận huyện này không');
    //if(t){
    var id=$(this).attr('id');
    $.ajax({
        type:'POST',
        data:'idpx='+id+'&idqh='+idqh,
        url:'index.php?r=quantri/Quanlytthp/XoaPhuongXa',
        success: function (html){
            $('#Grid_px').html(html);

            return false;
        }

    })
// }
})
);


$('.row_ttp').live('click',(function(){

    var id=$(this).attr('id');
    
    $('#hiddenTTP').val(id);
    $.ajax({
        type:'POST',
        data:'idtp='+id,
        url:'index.php?r=quantri/Quanlytthp/LoadQuanHuyen',
        success: function (html){
            $('#Grid_qh').html(html);
            return false;
        }

    })
}));
$('.row_qh').live('click',(function(){

    var id=$(this).attr('id');
    $('#hiddenQH').val(id);
    $.ajax({
        type:'POST',
        data:'idqh='+id,
        url:'index.php?r=quantri/Quanlytthp/Loadphuongxa',
        success: function (html){
            $('#Grid_px').html(html);
            return false;
        }

    })
}));


