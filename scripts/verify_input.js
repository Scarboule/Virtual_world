

const validationInput = document.getElementById('pass');

validationInput.addEventListener('input', (e) => {

    if(e.target.value.length >= 4) {
        validationInput.style.borderColor = "green";
    } else {
        validationInput.style.borderColor = "red";
    }
})
