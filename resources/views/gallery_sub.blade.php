<?php 
use RedBeanPHP\R as R;

$gl = R::find("gallery", "sec_id = ?", [$_GET['id']]);


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Intour/Gallery Sections</title>
    @include('blocks.head_imp')
  </head>

  <body>
    <div class="wrapper overflow-hidden">
      <header class="relative">
        @include('blocks.header')
        <div
          class="header__content bg-center bg-[url('./project/image/bg-about.png')] md:mt-0 pt-32 pb-40 md:py-40 md:pb-50 text-white bg-no-repeat bg-cover"
        >
          <div class="container mx-auto">
            <h2 class="text-3xl md:text-6xl font-bold mb-3">{{LN['gallery']}}</h2>
            <h3 class="text-lg md:text-2xl font-semibold">
              <a href="./">{{LN['home']}}</a> /
              <a href="./gallery">{{LN['gallery']}}</a> /
              <span class="text-logoColor">
                <a href="#">{{LN['gallery city']}}</a></span
              >
            </h3>
          </div>
        </div>
      </header>

      <section class="py-10 md:py-20">
        <div class="container mx-auto">
          <div class="grid  md:grid-cols-4 grid-cols-2 gap-10">
            <?php
              foreach ($gl as $vl) {
              ?>
            <a class="card gallery__card" onclick="card(this)" data-aos="fade-up" data-aos-delay="100" >
              <img class="w-full card__img max-w-72 h-full object-cover " src="upl_data/gallery/<?= $vl -> img?>" alt="" />
              <h2 class="lg:text-base mt-2 font-bold text-xs">
                <?= (@$_COOKIE['lang'] != 'ru') ? $vl -> title : $vl -> title_ru?>
              </h2>
            </a>
            <?php }?>
          </div>

          <div id="lightbox"></div>
        </div>
      </section>

      @include('blocks.footer')
    </div>

    @include('blocks.foot_js')
  </body>
</html>
