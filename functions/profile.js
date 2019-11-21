console.log('profile');
const _ = ele => document.querySelector(ele)
const __ = ele => document.querySelectorAll(ele)



const overlay = _('.overlay');
const search = _('.search input');
const allUsers = _('.allUsers')
const body = _('body');
const menu = _('.menu')
const menuFriends = _('aside.friends');
const searcBar = _('.search-bar');

const startSearch = () => {
    overlay.style.display = 'block'
    body.style.overflow = 'hidden'

}

const overlayClick = () => {
    overlay.style.display = 'none'
    allUsers.style.display = 'none'
    body.style.overflow = 'initial'
    searcBar.style.zIndex = 1
    menuFriends.classList.remove('menuOpen');

}

const searchFriendList = (e) => {

    let searchString = e.target.value.toUpperCase();
    let userList = allUsers.querySelectorAll('.searchItem span');

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


const openFriends = () => {
    console.log(menuFriends);
    overlay.style.display = 'block'
    body.style.overflow = 'hidden'
    menuFriends.classList.add('menuOpen');
    searcBar.style.zIndex = 0
}


search.onfocus = startSearch;
overlay.onclick = overlayClick;
menu.onclick = openFriends;

search.onkeyup = e => searchFriendList(e);
