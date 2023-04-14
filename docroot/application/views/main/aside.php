<?php
    if(isset($_SESSION['account']["userId"])) {
        $userName = ($_SESSION['account']["userName"]) . ' ' . ($_SESSION['account']["userLastName"]); ?> 
    <aside class="aside">
        <div class="aside__items">
        <div class="aside__signature">
            <div class="aside__item-image">
            <img class="aside__item-img" src="../public/images/profile.jpg" alt="profile" />
            </div>
            <p class="aside__item-name"><?php echo $userName; ?></p>
            <p class="aside__item-text"></p>
        </div>
        <ul class="aside__menu-list">
            <li class="aside__menu-item">
            <a class="aside__menu-link fa fa-home" href="/">Головна</a>
            </li>
            <li class="aside__menu-item">
            <a class="aside__menu-link fa fa-user" href="../mypage">Моя сторінка</a>
            </li>
            <li class="aside__menu-item">
            <a class="aside__menu-link fa fa-user-friends" href="friends">Друзі</a>
            </li>
        </ul>
        </div>
    </aside>
    <?php };?>