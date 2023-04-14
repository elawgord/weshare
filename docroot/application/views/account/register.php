<?php
require_once 'header.php';
?>
        
        <section class="signupin">
          <div class="container">

          <!-- Signup form -->
            <div class="form">
              <form class="form__inner" action="register" method="post">
                <div class="form__top">
                  <div class="form__title-item">
                    <h2 class="form__title">Реєстрація</h2>
                  </div>
                  <div class="form__subtitle-item">
                    <p class="form__subtitle">Швидко і просто</p>
                  </div>
                </div>
                <div class="form__place">
                  <input class="form__place-input" type="text" name="userName" placeholder="Ім'я" />
                  <input class="form__place-input" type="text" name="userLastName" placeholder="Прізвище" />
                  <input class="form__place-input" type="text" name="userEmail" placeholder="Електронна пошта" />
                  <input class="form__place-input" type="text" name="userLogin" placeholder="Логін" />
                  <input class="form__place-input" type="password" name="userPwd" placeholder="Пароль" />
                  <input class="form__place-input" type="password" name="сonfirmPwd" placeholder="Підтвердіть пароль" />
                </div>
                <div class="msg"></div>  
                <div class="form__item-btn">
                  <button class="form__item-submit" type="submit">Приєднатись</button>
                </div>
                <div class="form__down">
                  <div class="form__down-item">
                    <p class="form__down-question">Зареєстровані в Weshare?</p>
                  </div>
                  <div class="form__link">
                    <a class="form__link-redirect" href="login">Увійти</a>
                  </div>
                </div>
              </form>
            </div>
        <!-- ---------- -->
        
          </div>
        </section>
      </div>
    </div>
  </body>
</html>
