window.onload = function() {
	var mobileWidth = 650;
	
/**
 * Mobile navigation menu
 * ----------------------------------
*/
	
	var nav = document.querySelectorAll('header#main nav ul li a.active')[0];
	var hasSelected = true;
	
//There will not be an active menu item on a 404 page, select the first item instead
	if (nav && nav != undefined) {
		nav = nav.parentNode;
	} else {
		nav = document.querySelectorAll('header#main nav ul li')[0];
		nav.className = 'custom-show';
		hasSelected = false;
	}
	
	var navItems = document.querySelectorAll('header#main nav ul li');
	var navList = nav.parentNode;
		
//Apply the selected item class to a menu item when selected
	for (var i = 0; i < navItems.length; ++i) {
		navItems[i].onclick = function(e) {
			var target;
			
			if (e.target) { //W3C, Netscape, and the like
				target = e.target;
			} else { //Microsoft
				target = e.srcElement;
			}
			
		//Only activate the new item on a mobile device, and not if the "Account" item is selected
			if (window.innerWidth < mobileWidth && !hasClass(target.parentNode, 'account')) {
				target.parentNode.className = 'active';
				nav.className = '';
			}
		}
	}
	
//Open the navigation menu list
	nav.onclick = function(e) {
		if (window.innerWidth < mobileWidth) {
			if (navList.className == '') {
				navList.className = 'open';
			} else {
				navList.className = '';
				
			//If no active menu element exists, allow the user to click on the "selected" menu item once the menu is open
				if (!hasSelected) {
					return true;
				}
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
	
//The menu exists only if the user is logged in
	if (menu && menu != undefined) {
		var menuClose = document.querySelectorAll('aside.account span.close')[0];
		var menuOpen = false;
		var allowMenuClose = true;
			
	//Open the account menu
		menuActivate.onclick = function(e) {
			document.body.className = menuOpen ? '' : 'show-menu';
			menuOpen = !menuOpen;
			
		//Don't close the menu as the link is clicked on
			e.preventDefault();
			e.stopPropagation();
			return false;
		}
		
	//Close the account menu button
		menuClose.onclick = function() {
			document.body.className = '';
			menuOpen = false;
		}
			
	//Only close the menu when it is clicked on (only close if clicked outside)
		menu.onclick = function(e) {
			allowMenuClose = false;
		}
	} else {
		//Handle directing user to login page on account menu button click
	}
	
/**
 * Account menu login/register toggle
 * ----------------------------------
*/

	var register = document.getElementById('register-toggle');
	var login = document.getElementById('login-toggle');
	
	if (register !== null) {
		register.onclick = function(e) {
			register.parentNode.parentNode.parentNode.style.display = 'none';
			register.parentNode.parentNode.parentNode.nextElementSibling.style.display = 'block';
		}
		
		login.onclick = function(e) {
			login.parentNode.parentNode.parentNode.style.display = 'none';
			login.parentNode.parentNode.parentNode.previousElementSibling.style.display = 'block';
		}
	}
		
/**
 * Navigation and account menus
 * ----------------------------------
*/
		
//Close the navigation and account menus
	document.onclick = function(e) {
		navList.className = '';
		
		if (menuOpen && allowMenuClose) {
			document.body.className = '';
			menuOpen = false;
		} else {
			allowMenuClose = true;
		}
	}
}

function hasClass(target, className) {
    return new RegExp('(\\s|^)' + className + '(\\s|$)').test(target.className);
}