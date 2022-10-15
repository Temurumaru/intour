<?php 
use RedBeanPHP\R as R;
use League\CommonMark\CommonMarkConverter;

$md = new CommonMarkConverter([
    'html_input' => 'strip',
    'allow_unsafe_links' => false,
]);


$dt = R::findOne("text_pages", "id = ?", [$_GET['id']]);

$txt = $md -> convert((@$_COOKIE['lang'] != 'ru') ? $dt -> text : $dt -> text_ru);


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Intour/<?=(@$_COOKIE['lang'] != 'ru') ? $dt -> title : $dt -> title_ru?></title>
    @include('blocks.head_imp')

    <style>

      article * {
        font-family: "Inter" , sans-serif;
      }

      article > h1 {
        font-size: 3.25rem !important;
        margin-top: 0.9rem !important;
        color: #F57F26;
      }

      article > h2 {
        font-size: 2.75rem !important;
        margin-top: 0.9rem !important;
        color: #F57F26;
      }

      article > h3 {
        font-size: 2.25rem !important;
        margin-top: 0.9rem !important;
        color: #F57F26;
      }
      
      article > h4 {
        font-size: 1.85rem !important;
        margin-top: 0.9rem !important;
        color: #F57F26;
      }

      article > h5 {
        font-size: 1.35rem !important;
        margin-top: 0.9rem !important;
        color: #F57F26;
      }

      article > h6 {
        font-size: 0.99rem !important;
        margin-top: 0.9rem !important;
      }

      article > ul {
        list-style-type: disc !important;
        margin-left: 1.7rem !important;
      }

      article > ol {
        list-style-type: decimal !important;
        margin-left: 1.7rem !important;
      }

      article * h1 {
        font-size: 3.25rem !important;
        margin-top: 0.9rem !important;
        color: #F57F26;
      }

      article * h2 {
        font-size: 2.75rem !important;
        margin-top: 0.9rem !important;
        color: #F57F26;
      }

      article * h3 {
        font-size: 2.25rem !important;
        margin-top: 0.9rem !important;
        color: #F57F26;
      }
      
      article * h4 {
        font-size: 1.85rem !important;
        margin-top: 0.9rem !important;
        color: #F57F26;
      }

      article * h5 {
        font-size: 1.35rem !important;
        margin-top: 0.9rem !important;
        color: #F57F26;
      }

      article * h6 {
        font-size: 0.99rem !important;
        margin-top: 0.9rem !important;
      }

      article * ul {
        list-style-type: disc !important;
        margin-left: 1.7rem !important;
      }

      article * ol {
        list-style-type: decimal !important;
        margin-left: 1.7rem !important;
      }

      article > a {
        color: #F57F26;
        text-decoration: underline;
        cursor: pointer;
      }

      article * a {
        color: #F57F26;
        text-decoration: underline;
        cursor: pointer;
      }

      article > p {
        margin-top: 0.8rem !important;
      }

      article * p {
        margin-top: 0.8rem !important;
      }
    </style>
  </head>

  <body>
    <div class="wrapper overflow-hidden">
      <header class="relative">
        @include('blocks.header')
        <div
          class="header__content bg-center bg-[url('upl_data/wallpapers/{{$dt -> img}}')] md:mt-0 pt-32 pb-40 md:py-40 md:pb-50 text-white bg-no-repeat bg-cover"
        >
          <div class="container mx-auto">
            <h2 class="text-3xl md:text-6xl font-bold mb-3"><?=(@$_COOKIE['lang'] != 'ru') ? $dt -> title : $dt -> title_ru?></h2>
            <h3 class="text-lg md:text-2xl font-semibold">
              <a href="./">{{LN['home']}}</a> /
              <a href="./text_page?id={{@$_GET['id']}}"><?=(@$_COOKIE['lang'] != 'ru') ? $dt -> title : $dt -> title_ru?></a>
            </h3>
          </div>
        </div>
      </header>

      <section class="py-10 p-10 m-6 md:py-20">
        <article class="container mx-auto">
          <h3 class="text-bgColor mb-3 text-2xl my-5 font-semibold"><?=(@$_COOKIE['lang'] != 'ru') ? $dt -> header : $dt -> header_ru?></h3>

          {{-- <p class="text-bgColor mb-5"> --}}
            <?=$txt?>
          {{-- </p> --}}
        </article>
      </section>

      @include('blocks.footer')
    </div>

    @include('blocks.foot_js')
  </body>
</html>
