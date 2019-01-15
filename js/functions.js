var SITENAME = "http://onlinetrading/";

function closeWindow(id) {
	document.getElementById(id).style.display = "none";
}

function openWindow(id, name) {
	var el = document.getElementById(id);
	el.style.animation = "1s open";
	el.style.display = "block";
}

function edit_category() {
	var edit = document.getElementById("edit");
	edit.style.animation = "1s open";
	edit.style.display = "block";
}

function getXmlHttp() {
	var xmlhttp;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
		}
	}
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function addProductInCart(id, button) {
	var xmlhttp = getXmlHttp();
	xmlhttp.open('POST', SITENAME + 'order', true);
	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttp.send("id=" + encodeURIComponent(id));
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4) { 
			if(xmlhttp.status == 200) {
				button.children[0].innerHTML = "В корзине";
				button.children[0].classList.remove("bg-grey-dark");
				button.children[0].classList.add("text-dark");
				button.children[0].classList.add("button_clicked");
			}
		}
	};
}

function cancelorder(id, button) {
	if (!confirm("Вы уверенны?")) return false;
	var xmlhttp = getXmlHttp();
	xmlhttp.open('POST', SITENAME + 'cancelorder', true);
	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttp.send("id=" + encodeURIComponent(id));
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4) {
			if(xmlhttp.status == 200) {
				var current = button.parentElement.parentElement.parentElement;
				current.parentElement.removeChild(current);
				reload_cart();
			}
		}
	};
	
}

function reload_cart() {
	var promo = document.querySelector("#promo").value;
	if (promo) {
		updateDataSumCart(promo);
	}
	else {
		updateDataSumCart();
	}
	updateDataCountCart();
}

function delwish(id) {
	if (!confirm("Вы уверены?")) return false;
	var xmlhttp = getXmlHttp(); 
	xmlhttp.open('POST', 'http://oc.local/delwish', true);
	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttp.send("id=" + encodeURIComponent(id));
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4) {
			if(xmlhttp.status == 200) {
				var current = document.querySelector("#wish_"+id);
				current.parentElement.removeChild(current);
				initWishlist();
				
			}
		}
	};
	
}

function updateDataSumCart(promo=false) {
	var sum = document.querySelector("#price_products");
	var xmlhttp = getXmlHttp();
	xmlhttp.open('POST', SITENAME + 'sumcartdata', true);
	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	if (promo) xmlhttp.send("promo=" + encodeURIComponent(promo));
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4) { 
			if(xmlhttp.status == 200) {
				sum.innerHTML = xmlhttp.responseText;
				
			}
		}
	};
	
}

function updateDataCountCart() {
	var count = document.querySelector("#count_products");
	var xmlhttp = getXmlHttp();
	xmlhttp.open('POST', SITENAME + 'countcartdata', true);
	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttp.send();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4) {
			if(xmlhttp.status == 200) {
				count.innerHTML = xmlhttp.responseText;
				
			}
		}
	};
}

function authuser() {
	login = document.querySelector("#userlogin").value;
	password = document.querySelector("#userpassword").value;
	type = document.querySelector("#AuthType").value;
	message = document.querySelector("#auth_message");
	var xmlhttp = getXmlHttp();
	xmlhttp.open('POST', SITENAME + 'auth', true);
	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttp.send("login=" + encodeURIComponent(login) + "&" + "password=" + encodeURIComponent(password) + "&" + "type=" + encodeURIComponent(type));
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4) {
			if(xmlhttp.status == 200) {
				if (xmlhttp.responseText == "") message.innerHTML = "Неправильные логин и/или пароль!";
				else window.location.href=xmlhttp.responseText;
			}
		}
	};
}

function reg() {
	login = document.querySelector("#reg_login").value;
	password = document.querySelector("#reg_password").value;
	var xmlhttp = getXmlHttp();
	xmlhttp.open('POST', SITENAME + 'register', true);
	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttp.send("login=" + encodeURIComponent(login) + "&" + "password=" + encodeURIComponent(password));
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4) {
			if(xmlhttp.status == 200) {
				alert(xmlhttp.responseText);
				if (xmlhttp.responseText == 1) {
					alert("Регистрация прошла успешно!");
				}
			}
		}
	};
}

function filter(id) {
	var xmlhttp = getXmlHttp();
	xmlhttp.open('POST', SITENAME + 'filter', true);
	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttp.send("id=" + encodeURIComponent(id));
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4) {
			if(xmlhttp.status == 200) {
				button.children[0].innerHTML = "В корзине";
				button.children[0].classList.remove("bg-grey-dark");
				button.children[0].classList.add("text-dark");
				button.children[0].classList.add("button_clicked");
			}
		}
	};
}