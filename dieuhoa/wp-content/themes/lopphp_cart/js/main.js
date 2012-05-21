$(document).ready(function(){
    $('#MainMenu .BorderBox.Menunormal').hover(
    function(){
        $(this).removeClass('Menunormal');
    }
    ,
    function(){
        $(this).addClass('Menunormal');
    }
    )
});