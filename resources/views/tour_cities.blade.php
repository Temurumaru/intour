<?php

use RedBeanPHP\R as R;

$data = R::findOne("city_tours", "id = ?", [$_GET['id']]);

$data -> views++;
R::store($data);

$gallery = json_decode($data -> img, true);
$gl_titles = json_decode((@$_COOKIE['lang'] != 'ru') ? $data -> img_titles : $data -> img_titles_tu, true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Intour/Cities</title>
  @include('blocks.head_imp')
</head>

<body>
  <div class="wrapper overflow-hidden">
    <header class="relative">
      @include('blocks.header')
      <div
        class="header__content bg-center bg-[url('/upl_data/wallpapers/<?=$data -> wallpaper?>')]  md:mt-0 pt-32 pb-40 md:py-40 md:pb-50 text-white bg-no-repeat bg-cover">
        <div class="container mx-auto">
          <h2 class="text-3xl md:text-6xl font-bold mb-3 uppercase"><?=(@$_COOKIE['lang'] != 'ru') ? $data -> title : $data -> title_ru?>
           </h2>
          <h3 class="text-lg md:text-2xl font-semibold"><a href="./">{{LN['home']}}</a> / 
              <a href="/">{{LN['tourism']}}</a>/
              <span class="text-logoColor">
                <a href="#"><?=(@$_COOKIE['lang'] != 'ru') ? $data -> title : $data -> title_ru?></a></span>
              </h3>
        </div>
      </div>
    </header>

    <section class="py-10 md:py-20">
      <div class="container mx-auto">
        <div class="flex justify-between flex-col md:flex-row">
          <div class="md:w-3/5 w-full">
            <h3 class="uppercase text-bgColor text-3xl md:text-5xl font-semibold mb-4">
              <?=(@$_COOKIE['lang'] != 'ru') ? $data -> title : $data -> title_ru?>
            </h3>            
            <p class="mt-2">
              <?=(@$_COOKIE['lang'] != 'ru') ? $data -> text : $data -> text_ru?>
            </p>
            <iframe class="w-full h-[500px] rounded-lg my-5"  src="<?=$data -> video?>" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


            <h3 class="text-bgColor text-xl mb-3">{{LN['top historical places']}}</h3>

            <?php 
            $dt = (@$_COOKIE['lang'] != 'ru') ? $data -> historial_places : $data -> historial_places_ru;
            echo str_replace(":dot:", "⊙", str_replace("\n", "<br>", $dt));
            ?>

            <div class="mt-5">
              <h3 class="font-bold text-3xl text-bgColor">
                {{LN['photo gallery']}}
              </h3>
              <div class="grid md:grid-cols-3 grid-cols-2 md:gap-10 gap-4 mt-5 text-bgColor">
                <div  onclick="card(this)" class="py-4">
                  <img class="rounded-lg object-cover mb-2 card__img max-w-[300px] w-full h-full"  src="<?=(!empty($gallery['img_1'])) ? './upl_data/imgs/'.$gallery['img_1'] : '#' ?>" alt="">
                  <h2>
                    <?=@$gl_titles['img_1_title']?>
                  </h2>
                </div>
                <div  onclick="card(this)" class="py-4">
                  <img class="rounded-lg object-cover mb-2 card__img max-w-[300px] w-full h-full"  src="<?=(!empty($gallery['img_2'])) ? './upl_data/imgs/'.$gallery['img_2'] : '#' ?>" alt="">
                  <h2>
                    <?=@$gl_titles['img_2_title']?>
                  </h2>
                </div>
                <div  onclick="card(this)" class="py-4">
                  <img class="rounded-lg object-cover mb-2 card__img max-w-[300px] w-full h-full"  src="<?=(!empty($gallery['img_3'])) ? './upl_data/imgs/'.$gallery['img_3'] : '#' ?>" alt="">
                  <h2>
                    <?=@$gl_titles['img_3_title']?>
                  </h2>
                </div>
                <div  onclick="card(this)" class="py-4">
                  <img class="rounded-lg object-cover mb-2 card__img max-w-[300px] w-full h-full"  src="<?=(!empty($gallery['img_4'])) ? './upl_data/imgs/'.$gallery['img_4'] : '#' ?>" alt="">
                  <h2>
                    <?=@$gl_titles['img_4_title']?>
                  </h2>
                </div>
                <div  onclick="card(this)" class="py-4">
                  <img class="rounded-lg object-cover mb-2 card__img max-w-[300px] w-full h-full"  src="<?=(!empty($gallery['img_5'])) ? './upl_data/imgs/'.$gallery['img_5'] : '#' ?>" alt="">
                  <h2>
                    <?=@$gl_titles['img_5_title']?>
                  </h2>
                </div>
                <div  onclick="card(this)" class="py-4 ">
                  <img class="rounded-lg object-cover mb-2 card__img max-w-[300px] w-full h-full"  src="<?=(!empty($gallery['img_6'])) ? './upl_data/imgs/'.$gallery['img_6'] : '#' ?>" alt="">
                  <h2>
                    <?=@$gl_titles['img_6_title']?>
                  </h2>
                </div>
              </div>

            </div>

          </div>
          <div class="md:w-2/5 md:pl-5 w-full flex flex-col md:pr-6">
            <h3 class="text-bgColor font-bold text-xl mb-2">{{LN['other cities']}}</h3>
            <a href="/tourism?id=2" class="py-3 px-9 hover:bg-logoColor hover:text-white bg-gray-300 my-1 rounded-lg duration-300">{{LN['toshkent']}}</a>
            <a href="/tourism?id=2" class="py-3 px-9 hover:bg-logoColor hover:text-white bg-gray-300 my-1 rounded-lg duration-300">{{LN['samarkhand']}}</a>
            <a href="/tourism?id=2" class="py-3 px-9 hover:bg-logoColor hover:text-white bg-gray-300 my-1 rounded-lg duration-300">{{LN['khiva']}}</a>
            <a href="/tourism?id=2" class="py-3 px-9 hover:bg-logoColor hover:text-white bg-gray-300 my-1 rounded-lg duration-300">{{LN['karakalpakstan']}}</a>
            <a href="/tourism?id=2" class="py-3 px-9 hover:bg-logoColor hover:text-white bg-gray-300 my-1 rounded-lg duration-300">{{LN['navoiy']}}</a>
            <a href="/tourism?id=2" class="py-3 px-9 hover:bg-logoColor hover:text-white bg-gray-300 my-1 rounded-lg duration-300">{{LN['fergana']}}</a>
            <a href="/tourism?id=2" class="py-3 px-9 hover:bg-logoColor hover:text-white bg-gray-300 my-1 rounded-lg duration-300">{{LN['bukhara']}}</a>
            <a href="/tourism?id=2" class="py-3 px-9 hover:bg-logoColor hover:text-white bg-gray-300 my-1 rounded-lg duration-300">{{LN['horezm']}}</a>
            <a href="/tourism?id=4" class="py-3 px-9 hover:bg-logoColor hover:text-white bg-gray-300 my-1 rounded-lg duration-300">{{LN['qashqararyo']}}</a>
            <a href="/tourism?id=3" class="py-3 px-9 hover:bg-logoColor hover:text-white bg-gray-300 my-1 rounded-lg duration-300">{{LN['jizzah']}}</a>
            <a href="/tourism?id=1" class="py-3 px-9 hover:bg-logoColor hover:text-white bg-gray-300 my-1 rounded-lg duration-300">{{LN['termiz']}}</a>
            <a href="/tourism?id=5" class="py-3 px-9 hover:bg-logoColor hover:text-white bg-gray-300 my-1 rounded-lg duration-300">{{LN['andijon']}}</a>
          </div>
        </div>
      </div>
    </section>

    @include('blocks.footer')
  </div>

  @include('blocks.foot_js')
</body>

</html>