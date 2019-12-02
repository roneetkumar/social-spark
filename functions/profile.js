console.log('profile');
const _ = ele => document.querySelector(ele)
const __ = ele => document.querySelectorAll(ele)

// ---------------------------------------------------------


const body = _('body');
const overlay = _('.overlay');
const searchIcon = _('.search-icon');
const searchBar = _('.search-bar');
const search = _('.search input');
const menu = _('.menu')
const friendsList = _('.friendsList');
const requests = _('.requests');
const requestsList = _('.request-list');
const messages = _('.messages');
const messagesList = _('.message-list');
const allUsers = _('.allUsers')
const messageFriend = __('.friendsList .message');
const requestLength = requestsList.querySelectorAll('.friend').length;
const requestCount = _('.count-request');
const messageLength = messagesList.querySelectorAll('.friend').length;
const messageCount = _('.count-message');

const editBtn = __('.editPost');

const editForm = _('.editForm');
const fakeForm = _('.fakeForm');
console.log(fakeForm);


editBtn.forEach(btn => {
    btn.onclick = () => {
        const post = btn.parentElement.parentElement;
        post.querySelector('.postBody p').setAttribute("contenteditable", "true");
        post.querySelector('.edit').style.display = 'block';
        post.querySelector('.notEdit').style.display = 'none';


    }
});

const updateForm = (e) => {
    // e.preventDefault();
    const post = e.target.parentElement.parentElement;

    let content = post.querySelector('.postBody p').innerText;
    console.log(content);

    fakeForm.value = content;
    return true;
}


const searchOpen = () => {
    searchBar.classList.add('searchOpen');
    overlayOpen();
    searchBar.style.zIndex = 2
}


const overlayOpen = () => {
    overlay.style.display = 'block';
    setTimeout(() => {
        overlay.style.opacity = 1;
    }, 100)
    body.style.overflow = 'hidden'


}

const overlayClose = () => {
    overlay.style.opacity = 0;
    body.style.overflow = 'initial'
    searchBar.classList.remove('searchOpen');
    friendsList.classList.remove('menuOpen');
    requestsList.classList.remove('openRequests')
    messagesList.classList.remove('openMessages')
    allUsers.style.display = 'none'

    setTimeout(() => {
        overlay.style.display = 'none'
    }, 100)

    setTimeout(() => {
        friendsList.style.zIndex = 0
        searchBar.style.zIndex = 1
    }, 200)
}

const openFriends = () => {
    friendsList.classList.add('menuOpen');
    friendsList.style.zIndex = 2
    overlayOpen();
}

const openRequests = () => {
    requestsList.classList.add('openRequests')
    overlayOpen();
}

const openMessages = () => {
    messagesList.classList.add('openMessages')
    overlayOpen();
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


if (requestLength > 0) {
    requestCount.innerText = requestLength
    requestCount.style.display = "block";
} else {
    requestCount.style.display = "none";
}


if (messageLength > 0) {
    messageCount.innerText = messageLength;
    messageCount.style.display = "block";
} else {
    messageCount.style.display = "none";
}


searchIcon.onclick = searchOpen;
search.onfocus = searchOpen;
overlay.onclick = overlayClose

requests.onclick = openRequests;
messages.onclick = openMessages;
search.onkeyup = e => searchFriendList(e);
menu.onclick = openFriends;
console.log(requestCount);

editForm.onsubmit = e => updateForm(e);
