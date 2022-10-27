const modal = document.getElementById("myModal");
const btn = document.getElementById("btn-join");
const span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
    modal.style.display = "block";
}

span.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

const navigation = document.querySelector('nav');

window.addEventListener('scroll', () => {

    if(window.scrollY > 400){
        navigation.classList.add('anim-nav');
    } else {
        navigation.classList.remove('anim-nav');
    }
})

window.addEventListener('click', (e) => {

    const rond = document.createElement('div');
    rond.className = 'clickAnim';
    rond.style.top = `${e.pageY - 5}px`;
    rond.style.left = `${e.pageX - 5}px`;
    document.body.appendChild(rond);

    setTimeout(() => {
        rond.remove();
    }, 1500)
})


function save_data() {
    localStorage.setItem("email", this.value);
    console.log("Saving " + this.value);
}
function load_data() {
    var input = document.getElementById("mail");
    input.value = localStorage.getItem("email");
    console.log("Loading " + input.value);
}
load_data();

const input = document.getElementById("mail");
input.onchange = save_data;
