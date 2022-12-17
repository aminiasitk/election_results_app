(function($) {
	
var direction =  getUrlParams('dir');
if(direction != 'rtl')
{direction = 'ltr'; }

    new dezSettings({
        typography: "roboto",
        version: "light",
        layout: "Vertical",
        headerBg: "color_2",
        navheaderBg: "color_10",
        sidebarBg: "color_2",
        sidebarStyle: "full",
        sidebarPosition: "fixed",
        headerPosition: "fixed",
        containerLayout: "full",
        direction: direction
    }); 
	
})(jQuery);