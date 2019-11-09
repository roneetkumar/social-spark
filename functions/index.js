includeHTML();

console.log('hello');
const _ = ele => document.querySelector(ele)
const __ = ele => document.querySelectorAll(ele)


// signup signin card slider

const signInCard = _('.signInCard');
const signUpCard = _('.signUpCard');
const wrapper = _('.wrapper');

const formSignIn = _('form.signIn');
// console.log(formSignIn);


const signInOpen = () => {
    signInCard.classList.toggle('signInOpen')
    signUpCard.classList.remove('signUpOpen')

    // formSignIn.style.display = 'block';
}

const signUpOpen = () => {
    signInCard.classList.remove('signInOpen');
    signUpCard.classList.toggle('signUpOpen');

    // formSignIn.style.display = 'none';
}

const cardClose = () => {
    signInCard.classList.remove('signInOpen')
    signUpCard.classList.remove('signUpOpen')

    // formSignIn.style.display = 'none';

}

signInCard.querySelector('.tapArea').onclick = signInOpen;
signUpCard.querySelector('.tapArea').onclick = signUpOpen;

signInCard.onclick = e => e.stopPropagation();
signUpCard.onclick = e => e.stopPropagation();

wrapper.onclick = cardClose;
