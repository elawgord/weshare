<?php
  require_once 'header.php';
?>
        <main class="section">
          <div class="container">
            <allcontent class="allcontent">

              <?php require_once 'aside.php'; ?>

                <friendsbox class="friendbox">
                  <div class="friends">
                    <div class="friends__img">
                      <img class="friends__image" src="../public/images/profile.jpg" alt="friend">
                    </div>
                    <div class="friends__namebtn">
                      <div class="friends__name-item">
                        <a href="#" class="friends__name">Andrew Root</a>
                      </div>
                      <div class="friends__button-item">
                        <button class="friends__button fa fa-remove">Видалити з друзів</button>
                      </div>
                    </div>
                  </div>
                  <border class="brd">
                    <div class="brd__item"></div>
                  </border>
                  <div class="friends">
                    <div class="friends__img">
                      <img class="friends__image" src="../public/images/profile.jpg" alt="friend">
                    </div>
                    <div class="friends__namebtn">
                      <div class="friends__name-item">
                        <a href="#" class="friends__name">Сергій Ковальчук</a>
                      </div>
                      <div class="friends__button-item">
                        <button class="friends__button fa fa-remove">Видалити з друзів</button>
                      </div>
                    </div>
                  </div>
                  <border class="brd">
                    <div class="brd__item"></div>
                  </border>          
                </friendsbox>
              </allcontent>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
