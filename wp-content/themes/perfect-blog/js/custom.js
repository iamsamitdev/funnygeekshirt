jQuery(function($){
 "use strict";
   jQuery('.main-menu-navigation > ul').superfish({
     delay:       0,                            
     animation:   {opacity:'show',height:'show'},  
     speed:       'fast'                        
   });

});

function resMenu_open() {
  document.getElementById("menu-sidebar").style.width = "100%";
  document.getElementById("contact-info").style.position = "fixed";
}
function resMenu_close() {
  document.getElementById("menu-sidebar").style.width = "0";
  document.getElementById("contact-info").style.position = "static";
}
