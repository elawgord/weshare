<?php
require_once 'header.php';
?>

      <section class="signupin">
        <div class="container">
          
        <!-- Login form -->
          <div class="form">
            <form class="form__inner" action="login" method="post">
              <div class="form__top">
                <div class="form__title-item">
                  <h2 class="form__title">Увійдіть у WeShare</h2>
                </div>
                <div class="form__subtitle-item">
                  <p class="form__subtitle">Вітаємо!</p>
                </div>
              </div>
              <div class="form__place">
                <input class="form__place-input" type="text" name="userLogin" placeholder="Логін/email..." />
                <input class="form__place-input" type="password" name="userPwd" placeholder="Пароль" />
              </div>
              <div class="form__item-btn">
                <button class="form__item-submit" type="submit">Увійти</button>
              </div>
              <div class="form__down">
                <div class="form__down-item">
                  <p class="form__down-question">Не зареєстровані в Weshare?</p>
                </div>
                <div class="form__link">
                <a class="form__link-redirect" href="register">Приєднатись</a>
              </div>
              </div>
            </form>
          </div>
        <!-- ---------- -->

        </div>
      </section>
  </body>
</html>