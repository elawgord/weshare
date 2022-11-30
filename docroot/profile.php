<?php
require "db.php";
$user = R::findOne('users', 'id = ?', array($_SESSION['logged_user']->id));

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
    <link rel="stylesheet" href="dist/style.css" />
  </head>
  <body>
    <div class="wrapper">
      <header class="header">
        <div class="container">
          <div class="header__inner">
            <a class="logo" href="#">WeShare</a>
          </div>
        </div>
      </header>
      <div class="container">
        <main class="main">
          <div class="main__inner">
            <div class="main__title">
              <div class="title">Профіль</div>
            </div>
            <form class="main__form">
            <p class="main__profile"><?php echo $user->name. ' ' .$user->email; ?></p>
            <input
                  class="main__button"
                  type="button"
                  onclick="window.location.href = 'logout.php';"
                  value="Вийти" />
            </form>
          </div>
        </main>
      </div>
      <footer class="footer">
        <div class="footer__down">
          <a class="footer__logo" href="#">WeShare</a>
        </div>
      </footer>
    </div>
  </body>
</html>
