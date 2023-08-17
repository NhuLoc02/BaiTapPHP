
<!-- start blog -->
<section class="blog pd-section">
  <div class="container">
    <div class="row">
      <?php
      $i = 0;
      foreach ($blog as $row) {
        $i++;
        if ($i == 1) {
      ?>
          <div class="col" style="--w-md: 12">
            <div class="blog__item blog__item--large">
              <a href="index.php?page=article&article_id=<?php echo $row['article_id'] ?>">
                <div class="blog__image">
                  <img class="w-100 h-100 d-block object-fit-cover" src="admin/uploads/blog/<?php echo $row['article_image'] ?>" alt="" />
                </div>
                <div class="blog__content">
                  <h3 class="blog__title h3">
                    <?php echo $row['article_title'] ?>
                  </h3>
                  <span class="blog__date h6 d-block"><?php echo $row['article_date'] ?> - <?php echo $row['article_author'] ?></span>
                  <div class="blog__context h4">
                      <?php echo $row['article_summary'] ?>
                  </div>
                </div>
              </a>
            </div>
          </div>
        <?php
        } else {
        ?>
          <div class="col" style="--w-md: 6;">
            <div class="blog__item h-100">
            <a href="index.php?page=article&article_id=<?php echo $row['article_id'] ?>">
                <div class="blog__image">
                  <img class="w-100 h-100 d-block object-fit-cover" src="admin/uploads/blog/<?php echo $row['article_image'] ?>" alt="" />
                </div>
                <div class="blog__content">
                  <h3 class="blog__title h3">
                    <?php echo $row['article_title'] ?>
                  </h3>
                  <span class="blog__date h6 d-block"><?php echo $row['article_date'] ?> - <?php echo $row['article_author'] ?></span>
                  <div class="blog__context h4">
                      <?php echo mb_strimwidth($row['article_summary'], 0, 200, "...") ?>
                  </div>
                </div>
              </a>
            </div>
          </div>
      <?php
        }
      }

      ?>
    </div>
  </div>
</section>
<!-- end blog -->