let form = document.querySelector('.registration'),
    formInputs = document.querySelectorAll('.js-input'),
    inputEmail = document.querySelector('.js-input-email'),
    inputPhone = document.querySelector('.js-input-phone');

function validateEmail(email) {
    const re  = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
        
    return re .test(String(email).toLowerCase());
}

function validateCountry(country) {
    const re  = new RegExp('.co$');
        
    return re .test(String(email).toLowerCase());
}

form.onsubmit = function() {
    
    let emailVal = inputEmail.value,
        phoneVal = inputPhone.value,
        emptyInputs = Array.from(formInputs).filter(input => input.value === '');
    
    formInputs.forEach(function (input) {
        if(input.value === '') {
            input.classList.add('error');
        } else {
            input.classList.remove('error');
        }
    });

    if(emptyInputs.length !== 0) {
        console.log('Вы ничего не ввели!');
        return false;
    }

    if(!validateEmail(emailVal)) {
        console.log('Не правильный email!');
        inputEmail.classList.add('error');
        return false;
    } else {
        inputEmail.classList.remove('error');
    }

    if(validateCountry(emailVal)) {
        console.log('Email not .co');
        inputEmail.classList.add('error');
        return false;
    } else {
        inputEmail.classList.remove('error');
    }
    
}