
<div class="message-list">
    <h2>Messages - 0</h2>
    <form action="#" method='POST'>
        <div class='friend'>
        <img src='./assets/face-24px.svg' alt='img'>
        <h3> Roneet Kumar </h3>
        <div class="action-btn">
            <button name='accept' value='<?php echo $friendsEmail ?>'>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
            </button>
            <button name='reject' value='<?php echo $friendsEmail ?>'>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M19 13H5v-2h14v2z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
            </button>
            </div>
        </div>
    </form>
</div>
