
function myFunction() {
    const box =document.getElementById("checkbox");
    const box2 =document.getElementById("checkbox2");
    const price =document.getElementById("price");

    if ((box.checked == true) && (box2.checked == true)){
        price.innerHTML = "Price : 38.97$/month";
    } else if ((box.checked == true) && (box2.checked == false)) {
        price.innerHTML = "Price : 33.98$/month";
    } else if ((box.checked == false) && (box2.checked == true)){
        price.innerHTML = "Price : 21.98$/month";
    } else {
        price.innerHTML = "Price : 16.99$/month";
    }
}

/*if ((box.checked == true) && (box2.checked == true)){
    price.innerHTML = "Price : 38.97$/month";
} else if ((box.checked == true) && (box2.checked == false)) {
    price.innerHTML = "Price : 33.98$/month";
} else if ((box.checked == false) && (box2.checked == true)){
    price.innerHTML = "Price : 21.98$/month";
} else {
    price.innerHTML = "Price : 16.99$/month";
}*/
