<?php
  require "db.php";
?>

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
              <a class="header__logo" href="user">WeShare</a>
            </div>
          </div>
        </div>
      </header>
      <main class="main">
        <div class="container">
          <div class="signup">
            <div class="form">
              <form
                class="form__inner"
                action="register.php"
                method="POST"
                enctype="multipart/form-data">
                <div class="form__top">
                  <div class="form__title-item">
                    <h2 class="form__title">Реєстрація</h2>
                  </div>
                  <div class="form__subtitle-item">
                    <p class="form__subtitle">Швидко і просто</p>
                  </div>
                </div>
                <div class="form__place">
                  <input
                    class="form__place-input"
                    type="text"
                    name="name"
                    placeholder="Ім'я та прізвище" />
                  <input
                    class="form__place-input"
                    type="text"
                    name="email"
                    placeholder="Електронна пошта" />
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
                  <input
                    class="form__place-input"
                    type="password"
                    name="password_confirm"
                    placeholder="Підтвердіть пароль" />
                </div>
                <div class="msg">
                  <div class="msg__item">
                    <?php
                    $data = $_POST;
                    
                    if(isset($data['signup'])){
                      $error = array();
                      if(trim($data['name']) == ''){
                        $error[] = 'Введіть ім\'я';
                      }
                      if(trim($data['email']) == ''){
                        $error[] = 'Введіть пошту';
                      }
                      if(trim($data['login']) == ''){
                        $error[] = 'Введіть логін';
                      }
                      if(trim($data['password']) == ''){
                        $error[] = 'Введіть пароль';
                      }
                      if(trim($data['password_confirm']) == ''){
                        $error[] = 'Підтвердіть пароль';
                      }
                      if(R::count('users', 'login = ?', array($data['login'])) > 0){
                        $error[] = 'Такий користувач вже зареєстрований';
                      }
                      if(trim($data['password']) != trim($data['password_confirm'])){
                        $error[] = 'Паролі не співпадають';
                      }
                      if(empty($error)){
                        $user = R::dispense('users');
                        $user->name = $data['name'];
                        $user->email = $data['email'];
                        $user->login = $data['login'];
                        $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
                        $user->avatar = 'noavatar.jpg';
                        $user->ip = $_SERVER['REMOTE_ADDR'];
                        $user->d_date_reg = date("d");
                        $user->m_date_reg = date("m");
                        $user->y_date_reg = date("Y");
                        $user->h_time_reg = date("H");
                        $user->m_time_reg = date("i");
                        R::store($user);
                      }else{
                        echo '<div class"=msg__item">'.array_shift($error).'</div>';
                      }
                    }
                    ?>
                  </div>
                </div>
                <div class="form__item-btn">
                  <button class="form__item-submit" type="submit" name="signup">
                    Приєднатись
                  </button>
                </div>
                <div class="form__down">
                  <div class="form__down-item">
                    <p class="form__down-question">Зареєстровані в Weshare?</p>
                  </div>
                  <div class="form__down-btn">
                    <input
                      class="form__down-redirect"
                      type="button"
                      onclick="window.location.href = '/';"
                      value="Увійти" />
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
