$(function () {

    setTimeout( function() {

        $(document).bind('DOMSubtreeModified', function () {
            $('context:not([loaded="loaded"])').each(function(index) {
                var el = $('context').eq(index);
                var oldHtml = el.html();
                el.attr("loaded", "loaded");
                el.replaceWith("<context-menu>" + "<img onclick='$(this).parent().children().eq(1).show();' class='context-menu-button' src='" + PATH_CONTEXTMENU_IMG + "'></img><div class='context-list-inside'>" + oldHtml + "</div></context-menu>");
            });
        });

        $(document).mouseup(function(e){
            $('context-menu').each(function(index) {
                $el = $('context-menu').eq(index);

                if ($el.has(e.target).length === 0) {
                    $el.children('.context-list-inside').eq(0).hide();
                }
            });
        });

    }, 150);

});
