<?php
use RedBeanPHP\R as R;
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Intour/Gallery</title>
    @include('blocks.head_imp')
  </head>

  <body>
    <div class="wrapper overflow-hidden">
      <header class="relative">
        @include('blocks.header')
        <div
          class="header__content bg-[url('./project/image/bg-about.png')] md:mt-0 pt-32 pb-40 md:py-40 md:pb-50 text-white bg-no-repeat bg-cover"
        >
          <div class="container mx-auto">
            <h2 class="text-3xl md:text-6xl font-bold mb-3">{{LN['gallery']}}</h2>
            <h3 class="text-lg md:text-2xl font-semibold">
              <a href="./">{{LN['home']}}</a> /
              <span class="text-logoColor">
                <a href="#">{{LN['gallery']}}</a></span
              >
            </h3>
          </div>
        </div>
      </header>

      <section class="py-10 md:py-20">
        <div class="container mx-auto">
          <div class="grid md:grid-cols-3 lg:grid-cols-4 grid-cols-2 gap-10">
            <?php
              $gl = R::findAll("gallery_sec");
              
              foreach ($gl as $vl) {
              ?>
            <a class="gallery__card"   href="{{route('gallery_sub')}}?id=<?=$vl -> id?>" data-aos="fade-up" data-aos-delay="100" >
              <img class="w-full h-full object-cover" src="upl_data/gallery_prevs/<?= $vl -> wallpaper?>" alt="" />
              <h2 class="lg:text-base mt-2 font-bold text-xs">
                <?= (@$_COOKIE['lang'] != "ru") ? $vl -> gallery_sec_name : $vl -> gallery_sec_name_ru?>
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
