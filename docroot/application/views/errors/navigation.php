
<!-- Навігація, якщо авторизований -->

<?php
  if(isset($_SESSION['account']["userId"])) : ?>
    <a class="header__logo" href="/">WeShare</a>
    </div>
    <nav class="nav">
      <ul data-line-effect class="nav__list">
        <li class="nav__list-item">
          <a class="nav__list-link fa fa-home" href="/"></a>
        </li>
        <li class="nav__list-item">
          <a class="nav__list-link fa fa-pen" href="myprofile">Мій профіль</a>
        </li>
        <li class="nav__list-item">
          <a class="nav__list-link" href="logout">Вийти</a>
        </li>
      </ul>
    </nav>

    <!-- Якщо НЕ авторизований -->

    <?php else: ?>
      <a class="header__logo" href="login">WeShare</a>
      </div>
    <nav class="nav">
      <ul data-line-effect class="nav__list">
        <li class="nav__list-item">
            <a class="nav__list-link fa fa-arrow-pointer" href="login">Увійти</a>
        </li>
        <li class="nav__list-item">
          <a class="nav__list-link fa fa-pencil-alt" href="register">Реєстрація</a>
        </li>
      </ul>
    </nav>
    <?php endif; ?>