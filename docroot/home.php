<?php
require "db.php";
$user = R::findOne('users', 'id = ?', array($_SESSION['logged_user']->id)); ?>

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
              <a class="header__logo" href="home.html">WeShare</a>
            </div>
            <nav class="menu">
              <ul class="menu__list">
                <li class="menu__list-item">
                  <a class="menu__list-link fa fa-home-alt" href="home.html"
                    >Головна</a
                  >
                </li>
                <li class="menu__list-item">
                  <a class="menu__list-link fa fa-user" href="profile.php"
                    >Профіль</a
                  >
                </li>
              </ul>
            </nav>
            <div class="header__button-exit">
              <a class="header__exit" href="logout.php">Вийти</a>
            </div>
          </div>
        </div>
      </header>
      <main class="main">
        <section class="blog">
          <div class="container">
            <div class="blog__inner">
              <aside class="aside">
                <div class="aside__items">
                  <div class="aside__signature">
                    <img
                      class="aside__item-image"
                      src="images/profile.jpg"
                      alt="profile" />
                    <p class="aside__item-name"><?php echo $user->name; ?></p>
                    <p class="aside__item-text">
                      Експерт з нерухомості ТОВ ВФ Ритейл
                    </p>
                  </div>
                  <ul class="aside__menu-list">
                    <li class="aside__menu-item">
                      <a class="aside__menu-link fa fa-user-friends" href="#"
                        >Друзі</a
                      >
                    </li>
                    <li class="aside__menu-item">
                      <a class="aside__menu-link fa fa-people-group" href="#"
                        >Спільноти</a
                      >
                    </li>
                  </ul>
                </div>
              </aside>
              <div class="center__inner">
                <div class="blog__share">
                  <div class="blog__share-name">
                    <h3 class="blog__share-item"><?php echo $user->name; ?></h3>
                  </div>
                  <div class="blog__share-post">
                    <form class="blog__share-form" action="">
                      <input
                        class="blog__input-post"
                        type="text"
                        name="post"
                        placeholder="Що нового?" />
                    </form>
                    <button class="blog__share-btn">Поділитись</button>
                  </div>
                </div>
                <div class="border">
                  <div class="border__item"></div>
                </div>
                <div class="article">
                  <div class="article__block">
                    <div class="article__block-title">
                      <img
                        class="article__block-image"
                        src="images/profile.jpg"
                        alt="" />
                      <div class="article__block-name">
                        <h2 class="article__block-item">
                          <?php echo $user->name; ?>
                        </h2>
                      </div>
                      <div class="article__block-date"></div>
                    </div>
                    <div class="article__block-content">
                      <div class="article__block-text">
                        Вочевидь, зараз не всі пригадають цю серпневу дату –
                        вісімнадцяте святкування Дня Незалежності України.
                        Відлік десятилітньої історії Вишиванкового фестивалю
                        розпочався саме тоді, коли сімдесят дев’ять людей,
                        убраних у виши́ванки, утворили вздовж Потьомкінських
                        сходів так званий «живий ланцюг». Амбітні плани
                        організаторів повністю виправдалися: він сягнув-таки
                        берега моря. Простягаючись білою ниткою від п’єдесталу
                        пам’ятника Рішельє, ланцюг із року в рік ставав усе
                        довшим, а разом із цим зростало й усвідомлення Одеси як
                        українського міста. Зростало настільки, що в 2014 році,
                        незважаючи на невпинну зливу, для участі в акції
                        «Вишиванковий ланцюг» вишикувалася півторатисячна черга,
                        утворивши нескінченне живе море виши́ванок.
                      </div>
                      <button class="article__block-btn"></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
      <footer class="footer">
        <div class="container">
          <a class="footer__logo" href="home.html">WeShare</a>
        </div>
      </footer>
    </div>
  </body>
</html>
