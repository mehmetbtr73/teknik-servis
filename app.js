$(function(){
    $(".sourceinput").mouseenter(function() {
        $('.sourceinput').css({
            outline: 'none'});
    });
    $(".sourceinput").focus(function() {
        $(".source").css({
            border: '2px solid rgb(40,40,40)'
        });
    });
    $(".sourceinput").blur(function() {
        $(".source").css({
            border: '1px solid rgb(150,150,150)'
        });
    });
});