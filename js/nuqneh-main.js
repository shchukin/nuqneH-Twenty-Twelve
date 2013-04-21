/* sticky sidebar */
jQuery(document).ready(function ($) {

    var $sidebarSlot  = $('.sticky-sidebar')
    var $sidebarBlock = $('.sticky-sidebar__detachable');

    var stickyPosition; 
    var windowScrolled;
    var isSticked;
    var isWideEnough;

    function getIsWideEnough() {
        return $(window).width() > 614 ? true : false;
    }

    function stickSidebar() {
        isSticked = true;
        $sidebarBlock.addClass('sticky-sidebar__detachable_sticked');
    }

    function unstickSidebar() {
        isSticked = false;
        $sidebarBlock.removeClass('sticky-sidebar__detachable_sticked');
    }


    function sidebarStickingByWindowScroll() {
        if( isWideEnough ) {
            windowScrolled = $(window).scrollTop();
            if ( ! isSticked && windowScrolled >= stickyPosition) stickSidebar();
            if (   isSticked && windowScrolled <  stickyPosition) unstickSidebar();
        }
    }

    function sidebarStickingByWindowResize() {
        stickyPosition = $sidebarSlot.offset().top;
        isWideEnough = getIsWideEnough();

        if( isWideEnough ) {
            sidebarStickingByWindowScroll();
        }
        else if( isSticked ) {
            unstickSidebar();
        }

    }


    function init() {
        stickyPosition = $sidebarSlot.offset().top;
        windowScrolled = $(window).scrollTop();
        isWideEnough = getIsWideEnough();
        isSticked = false;
        sidebarStickingByWindowScroll();
    }

    $(window).on('scroll', sidebarStickingByWindowScroll );
    $(window).on('resize', sidebarStickingByWindowResize );
    $(window).on('load', init );

});