<?php

use RedBeanPHP\R as R;

$data = R::findOne("tours", "id = ?", [$_GET['id']]);

$data -> views++;
R::store($data);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Intour/tour-single</title>
    @include('blocks.head_imp')
  </head>

  <body>
    <div class="wrapper overflow-hidden">
      <header id="header" class="relative">
        @include('blocks.header')
        <div
          class="header__content bg-[url('/upl_data/wallpapers/<?=$data -> wallpaper?>')] md:mt-0 pt-32 pb-40 md:py-40 md:pb-50 text-white bg-no-repeat bg-cover"
        >
          <div class="container mx-auto">
            <h2 class="text-3xl md:text-6xl font-bold mb-3 uppercase">
              <?= (@$_COOKIE['lang'] != 'ru') ? $data -> title : $data -> title_ru ?>
            </h2>
            <h3 class="text-lg md:text-2xl font-semibold">
              <a href="./">{{LN['home']}}</a> / <a href="/destinations"> {{LN['destinations']}}</a>/
              <span class="text-logoColor">
                <a href="#"><?= (@$_COOKIE['lang'] != 'ru') ? $data -> title : $data -> title_ru ?></a></span
              >
            </h3>
          </div>
        </div>
      </header>

      <section class="py-10 md:py-20">
        <div class="container mx-auto">
          <div class="flex justify-between flex-col md:flex-row">
            <div class="md:w-3/5 w-full">
              <div data-aos="fade-up" class="py-8 md:py-10">
                <h1 class="text-2xl font-bold uppercase md:text-4xl">
                  <?= (@$_COOKIE['lang'] != 'ru') ? $data -> title : $data -> title_ru ?> <span class="text-logoColor">{{LN['tour']}}</span>
                </h1>
              </div>
              <div class="grid grid-cols-2 gap-6 text-bgColor mb-4 lg:w-3/4">
                <div class="flex items-center">
                  <i class="ri-time-line text-xl mr-1 text-logoColor"></i>
                  <p class="text-md"><?=json_decode($data -> duration) ->duration_days?> Days <?=json_decode($data -> duration) ->duration_nights?> Nights</p>
                </div>
                <div class="flex items-center">
                  <i class="ri-open-arm-line text-xl mr-1 text-logoColor"></i>
                  <p class="text-md">Group <?=$data -> group?> people</p>
                </div>
                <div class="flex items-center">
                  <i class="ri-map-pin-2-line text-xl mr-1 text-logoColor"></i>
                  <p class="text-md"><?=$data -> address?></p>
                </div>
                <div class="flex items-center text-center">
                  <i class="ri-map-2-line text-xl mr-1 text-logoColor"></i>
                  <p class="text-md">Interest places <?=$data -> interest_places?></p>
                </div>
              </div>

              <div>
                <h3 class="text-bgColor mb-3 text-2xl my-5 font-semibold">
                  {{LN['information']}}
                </h3>
                <p class="text-bgColor mb-5">
                  <?php $dst = (@$_COOKIE['lang'] != 'ru') ? $data -> info_text : $data -> info_text_ru;
                   echo str_replace("\r\n", "<br>", $dst);
                  ?>
                </p>
              </div>

              <div class="md:w-3/4 w-full text-bgColor mb-4  flex justify-between items-center">
                <h3 class="mb-3 text-lg font-semibold">{{LN['departure']}}</h3>
                <p class="text-md md:mr-10"><?=$data -> departure_location?></p>
              </div>
              <div class="md:w-3/4 w-full text-bgColor mb-4 flex justify-between items-center">
                <h3 class="mb-3 text-lg font-semibold">{{LN['departure time']}}</h3>
                <p class="text-md md:mr-10"><?=$data -> departure_time?></p>
              </div>
              <div class="md:w-3/4 w-full text-bgColor mb-4 flex justify-between items-center">
                <h3 class="mb-3 text-lg font-semibold">{{LN['return time']}}</h3>
                <p class="text-md md:mr-10"> <?= (@$_COOKIE['lang'] != 'ru') ? $data -> return_time : $data -> return_time_ru ?></p>
              </div>
              <div class="md:w-3/4 w-full text-bgColor mb-4 flex justify-between items-center">
                <h3 class="mb-3 text-lg font-semibold">{{LN['dress code']}}</h3>
                <p class="text-md md:mr-10"> <?= (@$_COOKIE['lang'] != 'ru') ? $data -> dress_code : $data -> dress_code_ru ?></p>
              </div>

              <hr class="mb-6">

              <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="text-bgColor">
                  <h3 class="text-lg font-semibold mb-3">{{LN['price includes']}}</h3>
                  
                  <?php 
                  $pr_in = explode(PHP_EOL, (@$_COOKIE['lang'] != 'ru') ? $data -> price_includes : $data -> price_includes_ru);
                  foreach ($pr_in as $val) {?>

                    <div class="flex items-center">
                      <i class="ri-check-line text-[#22C55E] text-2xl mr-2"></i>
                      <p><?=$val?></p>
                    </div>

                  <?php }?>
                </div>
                <div class="text-bgColor">
                  <h3 class="text-lg font-semibold mb-3">{{LN['price excludes']}}</h3>

                  <?php 
                  $pr_in = explode(PHP_EOL, (@$_COOKIE['lang'] != 'ru') ? $data -> price_excludes : $data -> price_excludes_ru);
                  foreach ($pr_in as $val) {?>

                    <div class="flex items-center">
                      <i class="ri-close-line text-[#DC2626] text-2xl mr-2"></i>
                      <p><?=$val?></p>
                    </div>

                  <?php }?>
                </div>

              </div>
              <div>
                <h3 class="text-bgColor mb-3 text-2xl my-5 font-semibold">
                  {{LN['tour plan']}}
                </h3>

                <div class="mb-4" id="accordion-open" data-accordion="open">
                  
                  <?php 
                  $dts = json_decode((@$_COOKIE['lang'] != 'ru') ? $data -> tour_plan_data : $data -> tour_plan_data_ru);
                  $i = 1;
                  foreach ($dts as $val) {
                    // $val = json_decode($);
                    $dt = str_replace(":star:", "★", $val -> data);
		                $dt = str_replace(":dot:", "⊙", str_replace("\r\n", "<br>", $dt));
                    ?>
                    <h2 id="accordion-open-heading-<?=$i?>" class="mb-5" >
                      <button
                        type="button"
                        class="flex  items-center active:text-black focus:text-logoColor focus:rounded-b justify-between w-full p-5 font-medium text-left border  border-gray-200 rounded-lg  font-semibold  hover:bg-gray-100  active:rounded-b-0  text-black "
                        data-accordion-target="#accordion-open-body-<?=$i?>"
                        aria-expanded="true"
                        aria-controls="accordion-open-body-<?=$i?>"
                      >
                        <span class="flex items-center"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                              clip-rule="evenodd"
                            ></path>
                          </svg>
                        <?=$val -> title?></span
                        >
                        <svg
                          data-accordion-icon=""
                          class="w-6 h-6 rotate-180 shrink-0"
                          fill="currentColor"
                          viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                          ></path>
                        </svg>
                      </button>
                      <div
                      id="accordion-open-body-<?=$i?>"
                      class=" mb-5"
                      aria-labelledby="accordion-open-heading-<?=$i?>">
                      <div
                        class="p-5 font-light border border-b-0 bg-gray-100 border-gray-200"
                      >
                      <?=$dt?>
                      </div>
                    
                    </div>
                    </h2>

                  <?php $i++; }?>
                  
                </div>
              </div>
            </div>
            <div class="md:w-2/5 md:pl-5 w-full md:pr-6 mt-5 md:mt-0 py-5">
              <div class="lg:w-3/4  ml-1/4 flex flex-col">
                <div class="rounded-lg overflow-hidden w-full relative mb-4">
                  <img class=" w-full " src="/upl_data/prevs/<?=$data -> preview?>" >
                  <h2 class="text-white rounded-b-lg p-4 absolute bottom-0 w-full text-center font-semibold bg-logoColor text-xl">Price from  <?= (@$_COOKIE['lang'] != 'ru') ? "$".$data -> price : "₽".$data -> price_ru ?></h2>
                </div>
                <div class="  p-3 md:p-5 bg-[#FFFCF3] border-2 border-[#F4CA64] rounded-lg  mt-7 text-[#5C4813]">
                  <div class="flex items-center">
                    <i class="ri-error-warning-fill text-3xl mr-2 text-[#F4CA64] "></i>
                    <h1 class="font-semibold text-2xl">{{LN['important informations']}}</h1>
                  </div>
                  <ul class="text-xs md:text-base list-disc pl-6 mt-3">
                    <?php
                    $imp = (@$_COOKIE['lang'] != 'ru') ? $data -> important_info : $data -> important_info_ru;
		                $im = str_replace(":dot:", "⊙", str_replace('\r\n', "<br>", $imp));
                      echo $im;
                      ?>
                  </ul>
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