const menuIcon = document.getElementById("menu-icon");
const menu = document.getElementById("menu");
const searchIcon = document.getElementById("search-icon");
const searchBox = document.getElementById("searchbox");

searchIcon.addEventListener('click', function () {
  if (searchBox.style.top == '72px') {
    searchBox.style.top = '24px';
    searchBox.style.pointerEvents = 'none';
    searchBox.style.opacity = '0';
  } else {
    searchBox.style.top = '72px';
    searchBox.style.pointerEvents = 'auto';
    searchBox.style.opacity = '1';
  }
});

menuIcon.addEventListener('click', function () {
  if (menu.style.opacity == "1") {
    menu.style.opacity = '0';
    menu.style.pointerEvents = 'none';
  } else {
    menu.style.opacity = '1';
    menu.style.pointerEvents = 'auto';
  }
})


let h4=document.querySelector('h4');

h4.addEventListener('click',function darkmode(){
  let body =document.body;
  let nav =document.getElementById('nav');
  let bodyClass=body.getAttribute('class');
  if(bodyClass == "dark"){
    body.classList.remove("dark");
    nav.classList.remove("dark");
  } else{
    body.classList.add("dark");
    nav.classList.add("dark");
  }
})
