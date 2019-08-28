$(function(){

    // クルクルimgを隠す
    $('.fa').hide();
    
    // formがフォーカスされたら、文字の横にクルクルimgを表示する
    $('.form-control').each(function(index, element){
        console.log(element);
        $(element).focus(function(){
            let showImg = $(element).parent().children().prev().children().next('label');
            //<div class="form-group"をつける前のコード↓>
            // let showImg = $(element).parent().children().next('div').children().next('label');
            console.log(showImg);
            $('.fa').show().insertAfter(showImg).text();
        }).blur(function(){
            $('.fa').hide();
        });
    });





});