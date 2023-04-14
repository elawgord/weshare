<?php
  require_once 'header.php';
?>
        <main class="section">
          <div class="container">
          <allcontent class="allcontent">

          <?php require_once 'aside.php'; ?>

            <profile class="profile">
              <setimage class="setimage">
                <h1 class="setimage__title">Змінити фото профілю</h1>
                <div class="setimage__img">
                  <!-- <img class="setimage__image" src="../img/my.jpg" alt="profile"> -->
                <div class="setimage__item">
                  <input class="setimage__upload-input fa fa-plus" accept=".jpg, .png" type="file" name="image"></input>
                  <div class="setimage__button">Вибрати світлину</div>
                </div>
                <div class="setimage__preview"></div>
                <button class="setimage__save-button" type="submit" name="submit">Зберегти</button>
                </div>
              </setimage>
              <border class="brd">
                <div class="brd__item"></div>
              </border>
              <about class="about">
                <h1 class="about__title">Про себе</h1>
                <div class="about__text">
                  <form class="about__form" action="/myprofile" method="post">
                    <textarea class="about__form-textarea" name="about">
                  </textarea>
                </div>
                    <button class="about__button" type="submit" name="submit">Зберегти</button>
                  </form>
              </about>
            </profile>
            </allcontent>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
