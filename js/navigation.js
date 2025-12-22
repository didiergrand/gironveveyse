
const navigation = document.getElementById("site-navigation");
const menubtn = navigation.querySelector('.menu-toggle');
const submenubtn = navigation.querySelectorAll('.menu-item-has-children');

const responsive = (navigation) => {
	if (navigation.className === "topnav") {
		navigation.className += " responsive";
		document.querySelector('body').style.overflow = 'hidden';
	} else {
		navigation.className = "topnav";
		document.querySelector('body').style.overflow = 'auto';
	}
}
const desactive = () =>{
	submenubtn.forEach(e => {
		e.querySelector('ul').classList.remove('active');
	})
}
const active = (submenu) => {
	if (submenu.className === "sub-menu active") {
		submenu.className = "sub-menu";
	}
	else if (submenu.className === "sub-menu") {
		desactive();
		submenu.className += " active";

	} 
}
window.onload = () => {
	submenubtn.forEach(e => {
		e.querySelector('a').addEventListener('click', (e) => {
			e.preventDefault();
			active(e.target.nextElementSibling);
		});
	});
	menubtn.addEventListener('click', () => {
		responsive(navigation);
	});
  };
