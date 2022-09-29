<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Intour/about</title>
    @include('blocks.head_imp')
  </head>

  <body>
    <div class="wrapper overflow-hidden">
      <header id="header" class="relative">
        @include('blocks.header')
        <div
          class="header__content bg-[url('./project/image/bg-about.png')]  md:mt-0 pt-32 pb-40 md:py-40 md:pb-50 text-white bg-no-repeat bg-cover"
        >
        <div class=" w-full h-full">
          <div class="container mx-auto">
            <h2 class="text-3xl md:text-6xl font-bold mb-3">{{LN['cars']}} </h2>
            <h3 class="text-lg md:text-2xl font-semibold">
              <a href="./">{{LN['home']}}</a> /
              <span class="text-logoColor">
                <a href="#">{{LN['cars']}}</a></span
              >
            </h3>
          </div>
        </div>
        </div>
      </header>

      <section class="md:py-20 py-10">
        <div class="container mx-auto">
          
<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
  <table class="w-full text-sm text-center text-gray-500 ">
      <thead class="text-xs text-white uppercase bg-logoColor ">
          <tr>
              <th scope="col" class="py-4 px-6">
                  {{LN['image']}}
              </th>
              <th scope="col" class="py-4 px-6">
                  {{LN['product']}}
              </th>
            
              <th scope="col" class="py-4 px-6">
                  {{LN['price']}}
              </th>
              
          </tr>
      </thead>
      <tbody>
        <?php 
          use RedBeanPHP\R as R;

          $cars = R::findAll("cars");

          foreach ($cars as  $val) {
          ?>
          <tr class="bg-white border-b ">
              <td class="p-4 w-48">
                  <img src="/upl_data/imgs/<?=$val -> wallpaper?>" alt="Apple Watch">
              </td>
              <td class="py-4 px-6 font-semibold text-gray-900 ">
                  <?=(@$_COOKIE['lang'] != 'ru') ? $val -> car_name : $val -> car_name_ru?>
              </td>

              <td class="py-4 px-6 font-semibold text-gray-900">
                <?=(@$_COOKIE['lang'] != 'ru') ? "$".$val -> price : "₽".$val -> price_ru?>
              </td>
          </tr>

          <?php }?>
          
      </tbody>
  </table>
</div>

        </div>
      </section>
      
      @include('blocks.footer')
    </div>

    @include('blocks.foot_js')
  </body>
</html>