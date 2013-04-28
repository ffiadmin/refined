window.onload = function() {
/**
 * Mobile navigation menu
 * ----------------------------------
*/
	
	var nav = document.querySelectorAll('header#main nav ul li a.active')[0];
	
	if (nav && nav != undefined) {
		nav = nav.parentNode;
		var navItems = document.querySelectorAll('header#main nav ul li');
		var navList = nav.parentNode;
			
	//Apply the selected item class to an menu item when selected
		for (var i = 0; i < navItems.length; ++i) {
			navItems[i].onclick = function(e) {
				var target;
				
				if (e.target) { //W3C, Netscape, and the like
					target = e.target;
				} else { //Microsoft
					target = e.srcElement;
				}
				
				target.parentNode.className = 'active';
				nav.className = '';
			}
		}
		
	//Open the navigation menu list
		nav.onclick = function(e) {
			if(navList.className == '') {
				navList.className = 'open';
			} else {
				navList.className = '';
			}
			
		//Don't follow the link
			e.preventDefault();
			e.stopPropagation();
			return false;
		}
	}
		
/**
 * Account menu
 * ----------------------------------
*/
		
	var menuActivate = document.querySelectorAll('header#main nav ul li.account')[0];
	var menu = document.querySelectorAll('aside.account')[0];
	var menuOpen = false;
		
//Open the account menu
	menuActivate.onclick = function(e) {
		document.body.className = menuOpen ? '' : 'show-menu';
		menuOpen = !menuOpen;
		
	//Don't close the menu as the link is clicked on
		e.preventDefault();
		e.stopPropagation();
		return false;
	}
		
//Only close the menu when it is clicked on (only close if clicked outside)
	menu.onclick = function(e) {
		e.preventDefault();
		e.stopPropagation();
		return false;
	}
		
/**
 * Navigation and account menus
 * ----------------------------------
*/
		
//Close the navigation and account menus
	document.onclick = function(e) {
		navList.className = '';
		
		if (menuOpen) {
			document.body.className = '';
			menuOpen = false;
		}
	}
}