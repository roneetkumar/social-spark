console.log('feed');
const _ = ele => document.querySelector(ele)
const __ = ele => document.querySelectorAll(ele)

// ---------------------------------------------------------



const body = _('body');
const overlay = _('.overlay');
const searchIcon = _('.search-icon');
const searchBar = _('.search-bar');
const search = _('.search input');
const allUsers = _('.allUsers')




const overlayClose = () => {
    overlay.style.opacity = 0;
    body.style.overflow = 'initial'
    searchBar.classList.remove('searchOpen');
    allUsers.style.display = 'none'

    setTimeout(() => {
        overlay.style.display = 'none'
    }, 100)

    setTimeout(() => {
        // friendsList.style.zIndex = 0
        searchBar.style.zIndex = 1
    }, 200)

}
const overlayOpen = () => {
    overlay.style.display = 'block';
    setTimeout(() => {
        overlay.style.opacity = 1;
    }, 100)
    body.style.overflow = 'hidden'


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



const searchOpen = () => {
    searchBar.classList.add('searchOpen');
    overlayOpen();
    searchBar.style.zIndex = 2
}

searchIcon.onclick = searchOpen;
search.onfocus = searchOpen;
overlay.onclick = overlayClose
search.onkeyup = e => searchFriendList(e);
