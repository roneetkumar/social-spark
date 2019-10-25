console.log('hello');
const _ = ele => document.querySelector(ele)
const __ = ele => document.querySelectorAll(ele)


// signup signin card slider

const signInCard = _('.signInCard');
const signUpCard = _('.signUpCard');
const wrapper = _('.wrapper');

const signInOpen = () => {
    signInCard.classList.toggle('signInOpen')
    signUpCard.classList.remove('signUpOpen')
}

const signUpOpen = () => {
    signInCard.classList.remove('signInOpen')
    signUpCard.classList.toggle('signUpOpen')
}

const cardClose = () => {
    signInCard.classList.remove('signInOpen')
    signUpCard.classList.remove('signUpOpen')
}

signInCard.querySelector('.tapArea').onclick = signInOpen;
signUpCard.querySelector('.tapArea').onclick = signUpOpen;

signInCard.onclick = e => e.stopPropagation();
signUpCard.onclick = e => e.stopPropagation();


wrapper.onclick = cardClose;

