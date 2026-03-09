
$(document).ready(function(){
   var navbar_menu = $("#main-menu");
   var btn_toggle = $(".btn-toggle");
   var overlay = $(".navbar-menu-overlay")

   var isCollapsed = true;
   btn_toggle.on('click', toggleMenu);
   overlay.on('click', closeMenu);

    function toggleMenu(){
        if(isCollapsed) {
            openMenu();
        }
        else{
            closeMenu();
        }
    }

    function closeMenu(){
        navbar_menu.removeClass("opened");
        overlay.removeClass("opened");
        isCollapsed = true;
    }

    function openMenu(){
        navbar_menu.addClass("opened");
        overlay.addClass("opened");
        isCollapsed = false;
    }
});
