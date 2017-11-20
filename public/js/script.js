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

    
});

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