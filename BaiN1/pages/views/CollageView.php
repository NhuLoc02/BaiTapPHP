
<section class="collage pd-top">
    <div class="container">
        <h2 class="collage__heading heading-3">Danh mục</h2>
        <div class="collage__items d-grid">
            <?php 
            $i = 0;
            foreach ($collage as $row) {
            ?>
                <div class="collage__item d-flex flex-column h-100 <?php if ($i == 0) { echo "collage__item--large"; } else { echo ""; } ?>">
                <div class="collage__image h-100">
                    <img class="w-100 h-100 d-block object-fit-cover flex-1" src="admin/uploads/category/<?php echo $row['category_image']; ?>" alt="image banner" />
                </div>
                <div class="collage__container">
                    <div class="collage__content d-flex">
                        <a class="align-center" href="index.php?page=product_category&category_id=<?php echo $row['category_id'] ?>"> <?php echo $row['category_name']; ?> </a>
                        <img src="./assets/images/icon/icon-nextlink.svg" alt="next-link" style="margin-left: 8px" />
                    </div>
                </div>
            </div>
            <?php
                $i++;
                }
            ?>
        </div>
    </div>
</section>
