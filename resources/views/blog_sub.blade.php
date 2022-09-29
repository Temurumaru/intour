<?php
use RedBeanPHP\R as R;
?>

<!DOCTYPE html>
<html lang="en">

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
        class="header__content bg-[url('./project/image/Blog.png')]  md:mt-0 pt-32 pb-40 md:py-40 md:pb-50 text-white bg-no-repeat bg-cover">
        <div class="container mx-auto">
          <h2 class="text-3xl md:text-6xl font-bold mb-3">{{LN['blog']}}</h2>
          <h3 class="text-lg md:text-2xl font-semibold"><a href="./">{{LN['home']}}</a> / <span class="text-logoColor">
              <a href="#">{{LN['blog']}}</a></span></h3>
        </div>
      </div>

    </header>

    <section class="py-10 md:py-20">
      <div class="container mx-auto">
        <div class="grid grid-cols-1  md:grid-cols-3  gap-6 gap-y-12  md:gap-y-16 md:gap-x-8 ">

          <?php
          
          if(@$_COOKIE['lang'] != "ru") {
          $arr = [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
          ];
        } else {
          $arr = [
            'Янв',
            'Фев',
            'Мрт',
            'Апр',
            'Май',
            'Июн',
            'Июл',
            'Авг',
            'Сен',
            'Окт',
            'Ноя',
            'Дек'
          ];
        }


          $limit = 9;

          $bl_lng = (@$_COOKIE['lang'] != 'ru') ? 'en' : 'ru';
            
          $needles = R::count('blog', 'lang = ?', [$bl_lng]);
           
          $n2 = false;
          if($needles > $limit) $n2 = true;
            
          $blog_total_pages = ceil($needles / $limit);
           
          if($blog_total_pages < 2) $n2 = false;
            
          if(isset($_GET['b_page'])) {
            $b_page = $_GET['b_page'];
            if($b_page < 1 || $b_page > $blog_total_pages) {$b_page = 1;}
          } else {
            $b_page = 1;
          }
            
          $blogs = R::find("blog","lang = ? ORDER BY id DESC LIMIT " . (($b_page-1)*$limit).', '.$limit, [$bl_lng]);
          foreach ($blogs as $val) { 
            $month = intval((explode(" ", $val -> date)[0]) - 1);  
            ?>

            <a href="/blog?post_id=<?=$val -> id?>" data-aos-delay="100" data-aos="fade-up"
            class="relative rounded-lg travel__card w-3/4 mx-auto md:w-full">
            <span
              class="absolute top-[5%] left-[5%] bg-logoColor p-2 text-xs uppercase text-center text-white rounded-lg">
              <?=$arr[$month]?> <br>
              <?=str_replace(",", "", (explode(" ", $val -> date)[1]))?>
            </span>
            <img class="w-full h-[250px]  md:h-[300px]    rounded-lg  max-h-[300px]  object-cover" src="./upl_data/prevs/<?=$val -> preview?>" alt="">
            <div class="absolute -bottom-10 left-[5%] w-[90%] bg-white rounded-lg  p-5 travel__card-content">
              <h2 class="text-logoColor text-lg">
                {{LN['_travel']}}
              </h2>
              <p class="font-bold lg:text-xl text-lg font-medium">
                <?=$val -> title?>
              </p>
            </div>
            </a>

            <?php } ?>
        </div>
      </div>

      <section class=" py-10 md:py-20">
        <div class="container mx-auto">
          <div class=" flex justify-center items-center">

            <nav aria-label="Page navigation example">
              <ul class="inline-flex items-center space-x-2 border-lg">
                <?php if($n2) {?>
                  <?php if(!($b_page <= 1)) {?>
                    <li>
                      <a href="?b_page=1"
                        class="block py-2 px-3  bg-white rounded-lg border border-gray-300 leading-tight text-black bg-white border border-gray-300 hover:text-white hover:bg-black">
                        <span class="sr-only">Left</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                        </svg>
                      </a>
                    </li>
                    {{-- <a class="pgn" href="?b_page=1"><u>Start</u></a></u> --}}
                    <!-- &nbsp; -->
                  <?php }?>
                  <!-- &nbsp; -->
                  <?php
                    $st = $b_page - 2;
                    if($st < 1) $st = 1;
                    $en = $b_page + 2;
                    if($en > ($blog_total_pages)) $en = $blog_total_pages+1;
                    while ($st != $en) {
                  ?>
                  <li>
                    <a href="?b_page=<?php echo $st;?>"
                      class="py-2 px-3 rounded-lg leading-tight text-black bg-white border border-gray-300 hover:text-white hover:bg-black "><?php echo $st;?></a>
                  </li>
                    
                  <?php
                    $st++; }
                  ?>
                  
                  <?php if(!($b_page >= $blog_total_pages)) {?>

                    <li>
                      <a href="?b_page=<?php echo ++$b_page;?>"
                        class="block py-2 px-3  bg-white rounded-lg border border-gray-300 leading-tight text-black bg-white border border-gray-300 hover:text-white hover:bg-black">
                        <span class="sr-only">Right</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                        </svg>
                      </a>
                    </li>

                  <?php }
                  }
                ?>
                {{-- <li>
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
                </li> --}}
              </ul>

          </div>
          </nav>

        </div>
      </section>

    </section>

    @include('blocks.footer')
  </div>

  @include('blocks.foot_js')
</body>

</html>