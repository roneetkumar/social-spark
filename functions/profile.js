console.log('profile');
const _ = ele => document.querySelector(ele)
const __ = ele => document.querySelectorAll(ele)



const overlay = _('.overlay');

const search = _('.search input');

const allUses = _('.allUsers')

const body = _('body');


const startSearch = () => {
    // allUses.style.display = 'block'
    overlay.style.display = 'block'
    body.style.overflow = 'hidden'

}

const overlayClick = () => {
    overlay.style.display = 'none'
    allUses.style.display = 'none'
    body.style.overflow = 'initial'
}


search.onfocus = startSearch;
overlay.onclick = overlayClick

console.log(overlay, search);


