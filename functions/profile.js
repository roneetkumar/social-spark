console.log('profile');
const _ = ele => document.querySelector(ele)
const __ = ele => document.querySelectorAll(ele)



const overlay = _('.overlay');
const search = _('.search input');
const allUsers = _('.allUsers')
const body = _('body');


const startSearch = () => {
    // allUses.style.display = 'block'
    overlay.style.display = 'block'
    body.style.overflow = 'hidden'

}

const overlayClick = () => {
    overlay.style.display = 'none'
    allUsers.style.display = 'none'
    body.style.overflow = 'initial'
}

const searchFriendList = (e) => {

    let searchString = e.target.value.toUpperCase();
    let userList = allUsers.querySelectorAll('form span');

    userList.forEach(user => {
        if (user.innerText.toUpperCase().includes(searchString)) {
            allUsers.style.display = 'block'
            user.parentElement.style.display = 'grid'
        }
        else if (searchString === '') {
            allUsers.style.display = 'none'
        }
        else {
            user.parentElement.style.display = 'none'
        }
    });
}


search.onfocus = startSearch;
overlay.onclick = overlayClick;

search.onkeyup = e => searchFriendList(e);



console.log(overlay, search);


