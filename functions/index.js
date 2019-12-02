
console.log('hello');
const _ = ele => document.querySelector(ele)
const __ = ele => document.querySelectorAll(ele)


// signup signin card slider

const signInCard = _('.signInCard');
const signUpCard = _('.signUpCard');
const wrapper = _('.wrapper');
const logo = _('.logo');


const resetField = () => {
    __('.field-container input').forEach(element => element.value = "");
}

const signInOpen = () => {
    resetField();
    signUpCard.classList.remove('signUpOpen')
    signInCard.classList.toggle('signInOpen')

    if (!signInCard.classList.contains('signInOpen') &&
        !signUpCard.classList.contains('signUpOpen')) {
        logo.classList.remove('logo-blur')
    } else {
        logo.classList.add('logo-blur')
    }
}

const signUpOpen = () => {
    resetField();
    signInCard.classList.remove('signInOpen');
    signUpCard.classList.toggle('signUpOpen');

    if (!signInCard.classList.contains('signInOpen') &&
        !signUpCard.classList.contains('signUpOpen')) {
        logo.classList.remove('logo-blur')
    } else {
        logo.classList.add('logo-blur')
    }
}

const cardClose = () => {
    resetField();
    signInCard.classList.remove('signInOpen')
    signUpCard.classList.remove('signUpOpen')
    logo.classList.remove('logo-blur')
}

signInCard.querySelector('.tapArea').onclick = signInOpen;
signUpCard.querySelector('.tapArea').onclick = signUpOpen;

signInCard.onclick = e => e.stopPropagation();
signUpCard.onclick = e => e.stopPropagation();

wrapper.onclick = cardClose;
