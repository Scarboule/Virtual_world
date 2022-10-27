const all_btn = document.getElementById("all_btn");
const red_btn = document.getElementById("red_btn");
const blue_btn = document.getElementById("blue_btn");
const yellow_btn = document.getElementById("yellow_btn");
const red = document.getElementsByClassName("red");
const blue = document.getElementsByClassName("blue");
const yellow = document.getElementsByClassName("yellow");
const articles = document.getElementsByClassName('article');

all_btn.onclick = function() {
  for (let i=0;i<articles.length;i+=1){
    articles[i].style.display = "";
  }
}
red_btn.onclick = function() {

  for (let i=0; i<articles.length;i+=1){
    articles[i].style.display = "none";
  }

  for (let i=0;i<red.length;i+=1){
    red[i].style.display = "";
  }
}

blue_btn.onclick = function() {
  for (let i=0; i<articles.length;i+=1){
    articles[i].style.display = "none";
  }

  for (let i=0;i<blue.length;i+=1){
    blue[i].style.display = "";
  }
}

yellow_btn.onclick = function() {
  for (let i=0; i<articles.length;i+=1){
    articles[i].style.display = "none";
  }

  for (let i=0;i<yellow.length;i+=1){
    yellow[i].style.display = "";
  }
}
