
$(document).ready(function() 
{

    $( "input:submit, .button" ).button();
    $( ".tabs" ).tabs();
    $('.tooltip_listen').mousemove(function(e){
        //var x = e.pageX - this.offsetLeft;
        //var y = e.pageY - this.offsetTop;
        var x = e.pageX +10 ;
        var y = e.pageY +10;

        $(this).find('.tooltip').show().css({ top: y, left: x });
        //console.write(e.pageX + e.pageY);
    });
    $('.tooltip_listen').mouseout(function(){
          $(this).find('.tooltip').hide();
    });
});