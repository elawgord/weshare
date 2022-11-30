<?php
require "db.php";
$data = $_POST;

if($_GET['id'] == ''){
  header('Location: /user?id='.$_SESSION['logged_user']->id);
}

if($_GET['id'] == $_SESSION['logged_user']->id){
  $position = 'access';
}else{
  $position = 'view';
}

$user = R::findOne('users', 'id = ?', array($_GET['id'])); 

$user_name = $user->name;

if(isset($data['send_post'])){
  $post = $data['post'];
  if($post){
    $db_post = R::dispense('posts');
    $db_post->id_user = $_SESSION['logged_user']->id;
    $db_post->post = $post;
    $db_post->ip = $_SERVER['REMOTE_ADDR'];
    $db_post->d_date_post = date("d");
    $db_post->m_date_post = date("m");
    $db_post->y_date_post = date("Y");
    $db_post->h_time_post = date("H");
    $db_post->m_time_post = date("i");
    R::store($db_post);
  }
}

$all_post = R::findAll('posts');
$user_posts = array();

foreach ($all_post as $row) {
  if($row['id_user'] == $_GET['id']){
    $user_posts[] = $row;
  }
}

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
            <nav class="menu">
              <ul class="menu__list">
                <li class="menu__list-item">
                  <a class="menu__list-link fa fa-home-alt" href="user"
                    >Головна</a
                  >
                </li>
                <li class="menu__list-item">
                  <a class="menu__list-link fa fa-user" href="/"
                    >Профіль</a
                  >
                </li>
              </ul>
            </nav>
            <div class="header__button-exit">
              <a class="header__exit" href="logout">Вийти</a>
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
                      src="uploads/avatars/<?php echo $user->avatar;?>">
                    <p class="aside__item-name"><?php echo $user_name; ?></p>
                    <!-- <p class="aside__item-text">
                      Експерт з нерухомості
                    </p> -->
                    <?php if($position == 'view'): ?>
                    <div class="aside__subscribe-item">
                      <button class="aside__subscribe-button fa fa-add">
                        Підписатись
                      </button>
                    </div>
                    <?php endif; ?>
                  </div>
                  <!-- <ul class="aside__menu-list">
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
                  </ul> -->
                </div>
              </aside>
              <div class="center__inner">
                <div class="blog__share">
                  <div class="blog__share-name">
                    <h3 class="blog__share-item"><?php echo $user_name; ?></h3>
                  </div>
                  <div class="blog__share-post">
                    <form
                      class="blog__share-form"
                      action="/user?id=<?php echo $_GET['id'];?>"
                      method="POST">
                      <input
                        class="blog__input-post"
                        type="text"
                        name="post"
                        placeholder="Що нового?" />
                      <button
                        class="blog__share-btn"
                        type="submit"
                        name="send_post">
                        Поділитись
                      </button>
                    </form>
                  </div>
                </div>
                <div class="border">
                  <div class="border__item"></div>
                </div>
                <div class="article">
                  <?php for ($i = 0; $i < count($user_posts); $i++) : ?>
                  <div class="article__post">
                    <p class="article__post-text">
                      <?php echo htmlspecialchars($user_posts[$i]['post']); ?>
                    </p>
                  </div>
                  <?php endfor; ?>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
      <footer class="footer">
        <div class="container">
          <a class="footer__logo" href="user">WeShare</a>
        </div>
      </footer>
    </div>
  </body>
</html>
