<?php

use RedBeanPHP\R as R;

$data = R::findOne("tourism", "id = ?", [$_GET['id']]);

$data -> views++;
R::store($data);

$gallery = json_decode($data -> img, true);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Intour/Tourism</title>
  @include('blocks.head_imp')
</head>

<body>
  <div class="wrapper overflow-hidden">
    <header class="relative">
      @include('blocks.header')
      <div
        class="header__content bg-center bg-[url('/upl_data/wallpapers/{{$data -> wallpaper}}')]  md:mt-0 pt-32 pb-40 md:py-40 md:pb-50 text-white bg-no-repeat bg-cover">
        <div class="container mx-auto">
          <h2 class="text-3xl md:text-6xl font-bold mb-3 uppercase"><?= ($_COOKIE['lang'] == 'en') ? $data -> title : $data -> title_ru ?>
           </h2>
          <h3 class="text-lg md:text-2xl font-semibold"><a href="./">{{LN['home']}}</a> / 
              <a href="#"> {{LN['tourism']}}</a>/
              <span class="text-logoColor">
                <a href="#"> <?= ($_COOKIE['lang'] == 'en') ? $data -> title : $data -> title_ru ?></a></span>
              </h3>
        </div>
      </div>
    </header>

    <section class="py-10 md:py-20">
      <div class="container mx-auto">
        <div class="flex justify-between flex-col md:flex-row">
          <div class="md:w-3/5 w-full">
            <img src="/upl_data/prevs/{{$data -> preview}}" class="w-full h-[400px] object-cover rounded-lg">
            
            <?= ($_COOKIE['lang'] == 'en') ? $data -> top_text : $data -> top_text_ru ?>

            <div class="grid grid-cols-2 md:grid-cols-3 gap-6 md:gap-12 my-3">
              <div class="card h-64 rounded-lg overflow-hidden relative gallery__card "  onclick="card(this)">
                <img class="w-full h-full  object-cover card__img " src="<?=(!empty($gallery['img_1'])) ? './upl_data/imgs/'.$gallery['img_1'] : '#' ?>" alt="">
              </div>
              <div class="card h-64 rounded-lg overflow-hidden relative gallery__card"  onclick="card(this)" >
                <img class=" w-full h-full  object-cover card__img " src="<?=(!empty($gallery['img_2'])) ? './upl_data/imgs/'.$gallery['img_2'] : '#' ?>" alt="">
              </div>
              <div class="card h-64 rounded-lg overflow-hidden relative gallery__card"  onclick="card(this)" >
                <img class="w-full  h-full object-cover  card__img " src="<?=(!empty($gallery['img_3'])) ? './upl_data/imgs/'.$gallery['img_3'] : '#' ?>" alt="">
              </div>
            </div>

            <?= ($_COOKIE['lang'] == 'en') ? $data -> bottom_text : $data -> bottom_text_ru ?>

          </div>
          <div class="md:w-2/5 md:pl-5 w-full flex flex-col md:pr-6">
            <h3 class="text-bgColor font-bold text-xl mb-2">{{LN['other types of toursim']}}</h3>
            <a href="/tourism?id=2" class="py-3 px-9 hover:bg-logoColor hover:text-white bg-gray-300 my-1 rounded-lg duration-300">{{LN['gastronomic tourism']}}</a>
            <a href="/tourism?id=4" class="py-3 px-9 hover:bg-logoColor hover:text-white bg-gray-300 my-1 rounded-lg duration-300">{{LN['religious tourism']}}</a>
            <a href="/tourism?id=3" class="py-3 px-9 hover:bg-logoColor hover:text-white bg-gray-300 my-1 rounded-lg duration-300">{{LN['cultural tourism']}}</a>
            <a href="/tourism?id=1" class="py-3 px-9 hover:bg-logoColor hover:text-white bg-gray-300 my-1 rounded-lg duration-300">{{LN['medical tourism']}}</a>
            <a href="/tourism?id=5" class="py-3 px-9 hover:bg-logoColor hover:text-white bg-gray-300 my-1 rounded-lg duration-300">{{LN['mountain tourism']}}</a>
            <a href="/tourism?id=6" class="py-3 px-9 hover:bg-logoColor hover:text-white bg-gray-300 my-1 rounded-lg duration-300">{{LN['eco tourism']}}</a>
          </div>
        </div>
      </div>
    </section>

    @include('blocks.footer')
  </div>

  @include('blocks.foot_js')
</body>

</html>