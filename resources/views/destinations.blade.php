<?php
use RedBeanPHP\R as R;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Intour/Destinations</title>
    @include('blocks.head_imp')
  </head>

  <body>
    <div class="wrapper overflow-hidden">
      <header id="header" class="relative">
        @include('blocks.header')
        <div
          class="header__content bg-center bg-[url('./project/image/bg-about.png')]  md:mt-0 pt-32 pb-40 md:py-40 md:pb-50 text-white bg-no-repeat bg-cover"
        >
        <div class=" w-full h-full">
          <div class="container mx-auto">
            <h2 class="text-3xl md:text-6xl font-bold mb-3">{{LN['destinations']}}</h2>
            <h3 class="text-lg md:text-2xl font-semibold">
              <a href="./">{{LN['home']}}</a> /
              <span class="text-logoColor">
                <a href="./about">{{LN['destinations']}}</a></span
              >
            </h3>
          </div>
        </div>
        </div>
      </header>

      <section class="py-10 md:py-20">
        <div class="container mx-auto">
          <div class="grid md:grid-cols-3 grid-cols-1 sm:grid-cols-2 md:gap-6 sm:gap-4 gap-2">
            <?php
            $trs = (R::findAll("tours", "ORDER BY IF(views > 0, 1, 1), views DESC LIMIT 5"));
            // dd($trs);
  
            foreach ($trs as $vl) {?>

            <div data-aos="fade-up"   class="card relative overflow-hidden">
              <a href="/tour?id=<?=$vl['id']?>"><img class="card__img w-full sm:h-full h-60 rounded-md object-cover" src="/upl_data/wallpapers/<?=$vl['wallpaper']?>" alt="">
              <div class="card-blur w-full  h-full absolute -bottom-full left-0"></div>
              <div class="card__title  w-full md:px-5   px-2 absolute left-0 -bottom-6 ">
                <div class="flex justify-between items-center">
                  <h1 class="text-lg md:text-xl lg:text-2xl font-semibold text-white"><?=(@$_COOKIE['lang'] != 'ru') ? $vl['title'] : $vl['title_ru']?></h1>
                  <div class="price sm:text-base text-xs py-1 px-2 bg-logoColor rounded text-white">
                    <?= (@$_COOKIE['lang'] != 'ru') ? "$".$vl['price'] : "₽".$vl['price_ru'] ?>
                  </div>
                </div>
                <p class="line mt-2 w-1/5 h-0.5 bg-lineColor"></p>
                <div class="flex justify-between items-center mt-4 lg:w-7/12 md:w-8/12 w-11/12 text-white">
                  <div class="flex justify-evenly items-center ">
                    <i class="ri-map-pin-line text-sm mr-1"></i>
                    <h5 class="text-sm font-bold "><?=$vl['address']?></h5>
                  </div>
                  <div class="flex justify-evenly items-center">
                    <i class="ri-time-line text-sm  mr-1"></i>
                    <p class="text-sm font-bold ">
                      <?=json_decode($vl['duration']) -> duration_days?>
                    </p>                  
                  </div>
                  <div class="flex justify-evenly items-center">
                    <i class="ri-user-line  text-sm mr-1"></i>
                    <span class="text-sm font-bold "><?=$vl['group']?></span>                  
                  </div>
                </div>
              </div></a>
            </div>
            <?php }?>
          </div>
        </div>
      </section>
      {{-- <section class=" py-10 md:py-20">
        <div class="container mx-auto">
          <div class=" flex justify-center items-center">

            <nav aria-label="Page navigation example">
              <ul class="inline-flex items-center space-x-2 border-lg">
                <li>
                  <a href="#"
                    class="block py-2 px-3  bg-white rounded-lg border border-gray-300 leading-tight text-black bg-white border border-gray-300 hover:text-white hover:bg-black">
                    <span class="sr-only">Previous</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                    </svg>
                  </a>
                </li>
                <li>
                  <a href="#"
                    class="py-2 px-3 rounded-lg leading-tight text-black bg-white border border-gray-300 hover:text-white hover:bg-black ">1</a>
                </li>
                <li>
                  <a href="#"
                    class="py-2 px-3 rounded-lg leading-tight text-black bg-white border border-gray-300 hover:text-white hover:bg-black ">2</a>
                </li>
                <li>
                  <a href="#"
                    class="py-2 px-3 rounded-lg leading-tight text-black bg-white border border-gray-300 hover:text-white hover:bg-black ">3</a>
                </li>

                <li>
                  <a href="#"
                    class="block py-2 px-3  bg-white rounded-lg border border-gray-300 leading-tight text-black bg-white border border-gray-300 hover:text-white hover:bg-black">
                    <span class="sr-only">Next</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                    </svg>
                  </a>
                </li>
              </ul>

          </div>
          </nav>

        </div>
      </section> --}}

      @include('blocks.footer')
    </div>

    @include('blocks.foot_js')
  </body>
</html>