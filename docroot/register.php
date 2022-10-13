<?php
  session_start();

  if (isset($_SESSION['user'])) {
    header('Location: porfile.php');
  }

  ?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Raccoon. Увійти або авторизуватись</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;900&display=swap"
      rel="stylesheet" />
    <link rel="stylesheet" href="dist/style.css" />
  </head>
  <body>
    <div class="wrapper">
    <header class="header">
      <div class="container">
        <div class="header__inner">
          <a class="logo" href="/">Raccoon</a>
        </div>
      </div>
    </header>
      <div class="container">
        <main class="main">
          <div class="main__inner">
          <div class="main__title">
            <div class="title-subtitle">
          <div class="title">Реєстрація</div>
          <div class="subtitle">Швидко і просто</div>
          </div>
          </div>
            <form class="main__form" action="vendor/signup.php" method="post" enctype="multipart/form-data">
            <input
                class="main__input"
                type="text"
                name="name"
                placeholder="Ім'я та прізвище" />
            <input
                class="main__input"
                type="text"
                name="email"
                placeholder="Ел.пошта" />
            <input
                class="main__input img"
                type="file"
                name="avatar"
                placeholder="Зображення профілю" />
              <input
                class="main__input"
                type="text"
                name="login"
                placeholder="Логін" />
              <input
                class="main__input"
                type="password"
                name="password"
                placeholder="Пароль" />
                <input
                class="main__input"
                type="password"
                name="password_confirm"
                placeholder="Підтвердіть пароль" />
              <button class="main__enter" type="submit">Приєднатись</button>
              <p class="main__question">
                Зареєстровані в Raccoon?
                <input class="main__connect" type="button" onclick="window.location.href = '/';" value="Увійти"/>
              </p>
              <?php 
                  if (isset($_SESSION['message'])) {
                    echo '<p class="main__msg"> ' . $_SESSION['message'] . ' </p>';
                  }
                    unset($_SESSION['message']);
                ?>
            </form>
          </div>
        </main>
      </div>
      <footer class="footer">
        <div class="footer__down">
          <a class="footer__logo" href="/">Raccoon</a>
      </footer>
      </div>
  </body>
</div>
</html>
