<?php
  if(isset($_SESSION['account']["userId"])) {
    $name = ($_SESSION['account']["userName"]);
    $userName = ($_SESSION['account']["userName"]) . ' ' . ($_SESSION['account']["userLastName"]); 
    $userId = ($_SESSION['account']["userId"]); } ?> 

            <!-- Форма введення і відправки посту -->
            <form class="share__form" action="/postsglobal" method="post">
              <textarea class="share__form-textarea" type="text" name="postContent" placeholder="Що нового, <?php echo $name; ?>?" ></textarea>
            </div>
            
              <button class="share__button" type="submit" name="submit">Share</button>
            </form>
          <!--  -->

          </share>
          <border class="border">
            <div class="border__item"></div>
          </border>

          <!-- Форма виведення постів -->
          <?php if (empty($list)): ?>
          <?php else: ?>
            <?php foreach ($list as $data): ?>
          <post class="post">
            <div class="post__header">
              <img class="post__header-image" src="../public/images/profile.jpg" alt="profile">
              <div class="post__header-title">
                <p class="post__header-name"> <?php echo htmlspecialchars($data['userName'] .' '. htmlspecialchars($data['userLastName']), ENT_QUOTES); ?></p>
                <div class="post__header-time"><?php echo htmlspecialchars($data['postTime'], ENT_QUOTES); ?></div>
              </div>
            </div>
              <p class="post__text"><?php echo htmlspecialchars($data['postContent'], ENT_QUOTES); ?></p>
              <?php if($_SESSION['account']["userId"] == $data['userId']) : ?>
              <div class="post__buttons">
                <a class="post__btn fa fa-edit" href="/globaledit/<?php echo $data['postId'];?>">Регадувати</a>
                <a class="post__btn fa fa-trash" href="/globaldelete/<?php echo $data['postId'];?>">Видалити</a>
              </div>
              <?php endif; ?>
              <br>
          </post>
          <border class="border">
            <div class="border__item"></div>
          </border>
          <?php endforeach; ?>
          <?php endif; ?>