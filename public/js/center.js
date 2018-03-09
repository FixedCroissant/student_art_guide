$(document).ready(function(){
    center();
});
$(window).resize(function(){
    center();
});

function center(){

    var buttons = new Array();
    $(document).find('button').each(function(){
        buttons.push($(this).offset().left);
    });
    var width = $(document).find('button:first').outerWidth();
    var min = Math.min.apply(Math,buttons);
    var max = Math.max.apply(Math,buttons);
    var page = $(window).width();
    var offset = (page - (max + width - min))/2;

    $(document).find('button').each(function(){
        var oldOffset = $(this).offset().left;
        var adjusted = oldOffset - min;
        $(this).offset({left: adjusted + offset});
    });
};