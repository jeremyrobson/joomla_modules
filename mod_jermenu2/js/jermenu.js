(function($) {

    $(document).ready(function () {
        $(".jm-item.deeper > .jm-link").click(function () {
            $(".jm-active").removeClass("jm-active");

            //close "cousin" menus
            $(this).parent().siblings().children().removeClass("jm-open");

            //mark link as opened and active
            $(this).toggleClass("jm-open").addClass("jm-active");

            //open submenu
            $(this).next().toggleClass("jm-open");

            //close hidden menus
            $(this).siblings().find(".jm-open").removeClass("jm-open");

            resizeMenuItems();
            checkForOverflow();
        });

        $(".jm-navicon").click(function () {
            $(".jm-collapse").toggle();
        });
    });

    function resizeMenuItems() {
        $(".jm-sub.jm-open").each(function () {
            $(this).css({
                "width": $(this).parent().width()
            });
        });
    }

    function checkForOverflow() {
        if ($(".jm-sub.jm-level-0.jm-open").length) {
            var dropdownWidth = $(".jm-sub.jm-level-0.jm-open").width();
            var rightSide = $(".jm-sub.jm-level-0.jm-open").position().left + dropdownWidth;
            var bodyWidth = $("body").width();
            if (rightSide > bodyWidth) {
                $(".jm-sub.jm-level-0.jm-open").css({
                    "left": bodyWidth - dropdownWidth
                });
            }
        }
    }

})(jQuery);