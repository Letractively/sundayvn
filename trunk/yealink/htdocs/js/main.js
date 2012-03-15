$(function(){
    $('#btn-import').click(function(){
        $('.btn-import').attr('disabled', 'disabled');
        $('#loading').html("Importing data...");
        $.getJSON(fullUrl+'index.php/contact/google/import', function($data){
            $('#loading').empty();
            $ret = [];
            $ret.push("Total phones: " + $data.phone.total + "; Imported: " + $data.phone.imported + "; Skipped: " + ($data.phone.total - $data.phone.imported));
            $ret.push("Total emails: " + $data.email.total + "; Imported: " + $data.email.imported + "; Skipped: " + ($data.email.total - $data.email.imported));
            $ret.push("Total addresses: " + $data.address.total + "; Imported: " + $data.address.imported + "; Skipped: " + ($data.address.total - $data.address.imported));
            $('#import-result').html($ret.join("<br/>"));
            $('.btn-import').removeAttr('disabled');
        });
    });
    $('#btn-import-select').click(function(){
        $('.btn-import').attr('disabled', 'disabled');
        $('#loading').html("Importing data...");
        var arrSelected = new Array();
        $("#table-contacts-list .check-contact").each(function () {
            if ($(this).is(':checked')) {
                arrSelected.push($(this).val());
            } 
        });
        var strSelecteds = '';
        for (var i = 0; i<arrSelected.length; i++) {
            strSelecteds += arrSelected[i] + '|';
        }
        strSelecteds += '-1';

        $.post(fullUrl+"index.php/contact/google/import", { 'selected': strSelecteds },
        function(data) {
            $('#loading').empty();
            var ret = [];
            ret.push("Total phones: " + data.phone.total + "; Imported: " + data.phone.imported + "; Skipped: " + (data.phone.total - data.phone.imported));
            ret.push("Total emails: " + data.email.total + "; Imported: " + data.email.imported + "; Skipped: " + (data.email.total - data.email.imported));
            ret.push("Total addresses: " + data.address.total + "; Imported: " + data.address.imported + "; Skipped: " + (data.address.total - data.address.imported));
            $('#import-result').html(ret.join("<br/>"));
            $('.btn-import').removeAttr('disabled');
        },"json");
    });
    $('#table-contacts-list #select-all').click(function() {
        if($(this).is(':checked')) {
            $('#table-contacts-list .check-contact').attr('checked', true);
        } else {
            $('#table-contacts-list .check-contact').attr('checked', false);
        }
    });
});