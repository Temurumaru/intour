<?php

use RedBeanPHP\R as R;

$data = R::findOne("blog", "id = ?", [$_GET['post_id']]);

$data -> views++;
R::store($data);

$gallery = json_decode($data -> img, true);
$gl_titles = json_decode($data -> img_titles, true);
// dd($data);
// dd($gallery['img_1']);
?>

<!DOCTYPE html>
<html lang="<?=$data -> lang?>">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Intour</title>
  @include('blocks.head_imp')
</head>

<body>
  <div class="wrapper overflow-hidden">
    <header class="relative">
      @include('blocks.header')
      <div
        class="header__content bg-[url('./upl_data/wallpapers/<?=$data -> wallpaper?>')]  md:mt-0 pt-32 pb-40 md:py-40 md:pb-50 text-white bg-no-repeat bg-cover">
        <div class="container mx-auto">
          <h2 class="text-3xl md:text-6xl font-bold mb-3 uppercase"><?=$data -> title?>
          <h3 class="text-lg md:text-2xl font-semibold"><a href="./index.html">Home</a> / 
              <a href="#"> Blogs</a>/
              <span class="text-logoColor">
                <a href="#"><?=$data -> title?></a></span>
              </h3>
        </div>
      </div>

    </header>

    <section class="py-10 md:py-20">
      <div class="container mx-auto">
        <div class="flex justify-between flex-col md:flex-row">
          <div class="md:w-3/5 w-full">
            <img src="./upl_data/prevs/<?=$data -> preview?>" class="w-full h-[400px] object-cover">
            <div class="flex mt-3">
              <div class="flex items-center mr-5 text-base  md:text-2xl " >
                <i class="ri-eye-line text-base  md:text-2xl  text-logoColor mr-2"></i> <p class="text-xs text-gray-400"><?=$data -> views?></p>
              </div>
              <div class="flex items-center text-base  md:text-2xl">
                <i class="ri-calendar-todo-line text-base  md:text-2xl  text-logoColor mr-2"></i> <p class="text-xs text-gray-400"><?=$data -> date?></p>
              </div>
            </div>
            
            <span>
              <?=$data -> top_text?>

              <div class="grid  md:grid-cols-3 grid-cols-1 gap-10 my-8 lg:my-5">
                <a class="gallery__card max-w-[400px] flex flex-col  justify-center items-center" onclick="card(this)" data-aos="fade-right" data-aos-delay="100" >
                  <img class="w-full card__img" src="<?=(!empty($gallery['img_1'])) ? './upl_data/imgs/'.$gallery['img_1'] : '#' ?>" alt="" />
                  <h2 class="lg:text-base mt-2 font-bold text-xs">
                    <?=@$gl_titles['img_1_title']?>
                  </h2>
                </a>
                <a class="gallery__card max-w-[400px]  flex flex-col  justify-center items-center"  onclick="card(this)" data-aos="fade-down" data-aos-delay="150">
                  <img class="w-full gallery__img card__img" src="<?=(!empty($gallery['img_2'])) ? './upl_data/imgs/'.$gallery['img_2'] : '#' ?>" alt="" />
                  <h2 class="lg:text-base mt-2 font-bold text-xs">
                    <?=@$gl_titles['img_2_title']?>
                  </h2>
                </a>
                <a class="gallery__card max-w-[400px]  flex flex-col  justify-center items-center"  onclick="card(this)" data-aos="fade-left" data-aos-delay="200">
                  <img class="w-full gallery__img card__img" src="<?=(!empty($gallery['img_3'])) ? './upl_data/imgs/'.$gallery['img_3'] : '#' ?>" alt="" />
                  <h2 class="lg:text-base mt-2 font-bold text-xs">
                    <?=@$gl_titles['img_3_title']?>
                  </h2>
                </a>
                <a class="gallery__card max-w-[400px] flex flex-col  justify-center items-center" onclick="card(this)" data-aos="fade-right" data-aos-delay="100" >
                  <img class="w-full card__img" src="<?=(!empty($gallery['img_4'])) ? './upl_data/imgs/'.$gallery['img_4'] : '#' ?>" alt="" />
                  <h2 class="lg:text-base mt-2 font-bold text-xs">
                    <?=@$gl_titles['img_4_title']?>
                  </h2>
                </a>
                <a class="gallery__card max-w-[400px]  flex flex-col  justify-center items-center"  onclick="card(this)" data-aos="fade-down" data-aos-delay="150">
                  <img class="w-full gallery__img card__img " src="<?=(!empty($gallery['img_5'])) ? './upl_data/imgs/'.$gallery['img_5'] : '#' ?>" alt="" />
                  <h2 class="lg:text-base mt-2 font-bold text-xs">
                    <?=@$gl_titles['img_5_title']?>
                  </h2>
                </a>
                <a class="gallery__card max-w-[400px]  flex flex-col  justify-center items-center"  onclick="card(this)" data-aos="fade-left" data-aos-delay="200">
                  <img class="w-full gallery__img card__img " src="<?=(!empty($gallery['img_6'])) ? './upl_data/imgs/'.$gallery['img_6'] : '#' ?>" alt="" />
                  <h2 class="lg:text-base mt-2 font-bold text-xs">
                    <?=@$gl_titles['img_6_title']?>
                  </h2>
                </a>
              </div>

              <?=$data -> bottom_text?>

            </span>

          </div>
          <div class="md:w-2/5 md:pl-5 w-full">
            {{-- <form class="md:p-5 bg-[#F4F5F8]  rounded-lg">
              <div class="relative">

                <input type="search" id="default-search"
                  class="block p-4 pl-5 w-full text-sm text-gray-900  rounded-lg border border-gray-300 focus:ring-logoColor focus:border-logoColor"
                  placeholder="Type here..." required>
                <button type="submit"
                  class="text-white absolute right-1 bottom-1 focus:ring-4 focus:outline-none focus:ring-logoColor font-medium rounded-lg text-sm px-6 py-2 "><i class="ri-search-2-line text-logoColor text-xl"></i></button>
              </div>
            </form> --}}

            <div class=" border-2 border-t-0 rounded-lg">
              <div class=" p-3 pb-4 bg-logoColor rounded-t-lg">
                <h2 class="text-xl font-semibold text-white ">
                  {{LN['recent blogs']}}
                </h2>
              </div>
              <div class="  p-3 pb-0 pt-0">
                <div class="flex pt-2 pb-3 border-b-2 ">
                  <img class="w-20 h-20 rounded-lg mr-3 border-0" src="./project/image/Blog foto.png" alt="">
                  <div>
                    <span class="text-gray-400">
                      1 September, 2022
                    </span>
                    <p class="">The Ancient Mosque City
                      Bukhara, Uzbekistan</p>
                  </div>
                </div>
               
                <div class="flex pt-2 pb-3 border-b-2 ">
                  <img class="w-20 h-20 rounded-lg mr-3 border-0" src="./project/image/Blog foto.png" alt="">
                  <div>
                    <span class="text-gray-400">
                      1 September, 2022
                    </span>
                    <p class="">The Ancient Mosque City
                      Bukhara, Uzbekistan</p>
                  </div>
                </div>
                
                <div class="flex pt-2 pb-3 border-b-2 ">
                  <img class="w-20 h-20 rounded-lg mr-3 border-0" src="./project/image/Blog foto.png" alt="">
                  <div>
                    <span class="text-gray-400">
                      1 September, 2022
                    </span>
                    <p >The Ancient Mosque City
                      Bukhara, Uzbekistan</p>
                  </div>
                </div>
                
                <div class="flex pt-2 pb-3 ">
                  <img class="w-20 h-20 rounded-lg mr-3 border-0" src="./project/image/Blog foto.png" alt="">
                  <div>
                    <span class="text-gray-400">
                      1 September, 2022
                    </span>
                    <p >The Ancient Mosque City
                      Bukhara, Uzbekistan</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    @include('blocks.footer')
  </div>

  @include('blocks.foot_js')
</body>

</html>