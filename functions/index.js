includeHTML();

console.log('hello');
const _ = ele => document.querySelector(ele)
const __ = ele => document.querySelectorAll(ele)


// signup signin card slider

const signInCard = _('.signInCard');
const signUpCard = _('.signUpCard');
const wrapper = _('.wrapper');
const logo = _('.logo');




const resetField = () => {
    const fields = __('.field-container input');
    fields.forEach(element => {
        element.value = "";
    });
}

const signInOpen = () => {
    signInCard.classList.toggle('signInOpen')
    signUpCard.classList.remove('signUpOpen')
    logo.classList.add('logo-blur')
}

const signUpOpen = () => {
    signInCard.classList.remove('signInOpen');
    signUpCard.classList.toggle('signUpOpen');
    logo.classList.add('logo-blur')
}

const cardClose = () => {
    signInCard.classList.remove('signInOpen')
    signUpCard.classList.remove('signUpOpen')
    logo.classList.remove('logo-blur')

    resetField();

}

signInCard.querySelector('.tapArea').onclick = signInOpen;
signUpCard.querySelector('.tapArea').onclick = signUpOpen;

signInCard.onclick = e => e.stopPropagation();
signUpCard.onclick = e => e.stopPropagation();

wrapper.onclick = cardClose;
