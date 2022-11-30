<?php
require "db.php";
$data = $_POST;

if(isset($data['signin'])){ 
  $user = R::findOne('users', 'login = ?', array($data['login']));

  if($user){
    if(password_verify($data['password'], $user->password)){
$_SESSION['logged_user'] = $user; } } } ?>

<?php if(isset($_SESSION['logged_user'])) : ?>
<meta http-equiv="refresh" content="0; URL='/user'" />

<?php else : ?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WeShare. Увійти або авторизуватись</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;900&display=swap"
      rel="stylesheet" />
    <link rel="stylesheet" href="dist/iconsfont.css" />
    <link rel="stylesheet" href="dist/style.css" />
  </head>
  <body>
    <div class="wrapper">
      <header class="header">
        <div class="container">
          <div class="header__inner">
            <div class="header__logo-item">
              <a class="header__logo" href="/">WeShare</a>
            </div>
          </div>
        </div>
      </header>
      <main class="main">
        <div class="container">
          <div class="signin">
            <div class="form">
              <form class="form__inner" action="/" method="POST">
                <div class="form__top">
                  <div class="form__title-item">
                    <h2 class="form__title">Увійдіть у WeShare</h2>
                  </div>
                  <div class="form__subtitle-item">
                    <p class="form__subtitle">Вітаємо!</p>
                  </div>
                </div>
                <div class="form__place">
                  <input
                    class="form__place-input"
                    type="text"
                    name="login"
                    placeholder="Логін" />
                  <input
                    class="form__place-input"
                    type="password"
                    name="password"
                    placeholder="Пароль" />
                </div>
                <div class="form__item-btn">
                  <button class="form__item-submit" type="submit" name="signin">
                    Увійти
                  </button>
                </div>
                <div class="form__down">
                  <div class="form__down-item">
                    <p class="form__down-question">
                      Не зареєстровані в Weshare?
                    </p>
                  </div>
                  <div class="form__down-btn">
                    <input
                      class="form__down-redirect"
                      type="button"
                      onclick="window.location.href = 'register';"
                      value="Приєднатись" />
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </main>
      <footer class="footer">
        <div class="container">
          <a class="footer__logo" href="user">WeShare</a>
        </div>
      </footer>
    </div>
  </body>
</html>

<?php endif; ?>
