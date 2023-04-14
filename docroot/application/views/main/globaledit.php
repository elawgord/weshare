<?php
  require_once 'header.php';
?>

        <main class="section">
          <div class="container">
            <allcontent class="allcontent">

            <?php require_once 'aside.php'; ?>
          
                <content class="content">
                  <share class="share">
                    <img class="share__image" src="../public/images/profile.jpg" alt="profile">
                    <div class="share__text">
                      <form class="share__form" action="/globaledit/<?php echo $data['postId']; ?>" method="post">
                        <textarea class="share__form-textarea" type="text" name="postContent"> <?php echo htmlspecialchars($data['postContent'], ENT_QUOTES); ?></textarea>
                        </div>
                          <button class="share__button" type="submit" name="submit">Редагувати</button>
                        </form>
                  </share>
                </content>
            </allcontent>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
