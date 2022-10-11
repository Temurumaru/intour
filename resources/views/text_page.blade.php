<?php 
use RedBeanPHP\R as R;

$dt = R::find("text_pages", "id = ?", [$_GET['id']]);


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Intour/<?=(@$_COOKIE['lang'] != 'ru') ? $dt -> title : $dt -> title_ru?></title>
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
            <h2 class="text-3xl md:text-6xl font-bold mb-3"><?=(@$_COOKIE['lang'] != 'ru') ? $dt -> title : $dt -> title_ru?></h2>
            <h3 class="text-lg md:text-2xl font-semibold">
              <a href="./">{{LN['home']}}</a> /
              <a href="./text_page?={{@$_GET['id']}}"><?=(@$_COOKIE['lang'] != 'ru') ? $dt -> title : $dt -> title_ru?></a>
            </h3>
          </div>
        </div>
      </header>

      <section class="py-10 p-10 m-6 md:py-20">
        <article class="container mx-auto">
          <h3 class="text-bgColor mb-3 text-2xl my-5 font-semibold"><?=(@$_COOKIE['lang'] != 'ru') ? $dt -> title : $dt -> title_ru?></h3>

          <p class="text-bgColor mb-5">
            <?=(@$_COOKIE['lang'] != 'ru') ? $dt -> text : $dt -> text_ru?>
          </p>
        </article>
      </section>

      @include('blocks.footer')
    </div>

    @include('blocks.foot_js')
  </body>
</html>
