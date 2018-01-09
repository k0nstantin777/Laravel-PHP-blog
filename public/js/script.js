$(document).ready(function() {
    
    /**
     * scrollToTop
     */
    $("a.back-to-top").click(function() {
            $("html, body").animate({
                    scrollTop: $($(this).attr("href")).offset().top + "px"
            }, {
                    duration: 400,
                    easing: "swing"
            });
            return false;
    });
    
    setActiveItemMenu();
    menuChangeItems();
    previewImage();
    
    
     getCountTags();
    
//    $('#plus_tag').each(function (){
//        $(this).click(function(){
//            count_tag++;
//            div = $(this).parent('div.tags');
//            $(div).clone(true).appendTo('div.tag_block');
//        });
//         if (count_tag === 1){
//           $('.remove_tag').css('display', 'none');
//        }else {
//           $('.remove_tag').css('display', 'block');
//        }
//    });
    $('.plus_tag').click(function(){
        div = $(this).parent('div');
        $(div).clone(true).appendTo('.tag_block');
        getCountTags();
    });
        
    $('.remove_tag').click(function(){
       div = $(this).parent('div').remove();
       getCountTags();
    });
     
});

function getCountTags(){
    var count_tag = $('div .tags').length;
    if (count_tag === 1){
        $('.remove_tag').css('display', 'none');
    }else {
        $('.remove_tag').css('display', 'block');
    }
    //console.log(count_tag);
}

function setActiveItemMenu(){
    var uri = getUri(document.location.href);
    $("a[href='"+uri+"']").parent('li').attr('id', 'current');
}


/**
* menu arrow change
*/
function menuChangeItems(){
    var uri = getUri(document.location.href);
 
    $('nav li').hover(function(){
        var href = $(this).children('a').attr('href');
        var id = $(this).attr("id");
        
        if (id !== 'current'){
            $(this).attr("id", "current");
        } 
        
        if (id === 'current' && uri !== href){
            $(this).attr("id", '');
        }
        
    });
}

/**
 * Получение текущего Uri (для главной страницы обрезаем слэш) 
 * @param {string} uri
 * @returns {string}
 */
function getUri (uri){
    if (uri.endsWith('/')){
        return uri.substring(0, uri.lastIndexOf('/'));
    } 
    
    return uri;
}

/**
* preview images
*/
function previewImage() {
    
    $('#image').change(function () {
    var input = $(this)[0];
        if (input.files && input.files[0]) {
            if (input.files[0].type.match('image.*')) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#img-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                console.log('error input file');
            }
        } else {
            console.log('error input file');
        }
    });
 
    $('#reset-img-preview').click(function() {
        $('#img').val('');
        $('#img-preview').attr('src', 'images/img-post.jpg');
    });
}
