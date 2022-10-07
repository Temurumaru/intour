<?php 
use RedBeanPHP\R as R;

// $gl = R::find("gallery", "sec_id = ?", [$_GET['id']]);


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Intour/VISA</title>
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
            <h2 class="text-3xl md:text-6xl font-bold mb-3">{{LN['visa']}}</h2>
            <h3 class="text-lg md:text-2xl font-semibold">
              <a href="./">{{LN['home']}}</a> /
              <a href="./visa">{{LN['visa']}}</a>
            </h3>
          </div>
        </div>
      </header>

      <section class="py-10 p-10 m-6 md:py-20">
        <article>
          <h3 class="text-bgColor mb-3 text-2xl my-5 m-5 font-semibold">Visa Information</h3>

          <p class="text-bgColor m-5 mb-5">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum voluptas a vero quaerat quisquam voluptatem eum corporis iure nihil! Quibusdam saepe dignissimos officiis voluptates! Accusamus itaque sint porro repudiandae ut!
            Porro mollitia deleniti eligendi ad omnis facere aspernatur id dolorem tenetur quasi voluptatibus veritatis aliquid molestias dignissimos corporis voluptatum facilis, at, suscipit, impedit consectetur doloremque. Corporis libero incidunt sequi fuga!
            Dolorum fuga a pariatur quia, nemo perferendis velit quos sint aspernatur omnis asperiores. Aperiam iste magnam deserunt labore eveniet delectus, quaerat laborum consequatur ipsum placeat nisi porro dolor praesentium perferendis.
            Iure recusandae impedit itaque, ea ab iste quas fuga laboriosam inventore, modi sunt veniam necessitatibus officia vitae cupiditate assumenda minus tempore, quae iusto voluptatibus? Sit animi reiciendis enim laboriosam pariatur.
            Exercitationem harum ducimus iusto alias, porro sit velit qui optio dolore laudantium itaque dicta. Dolor non quod nostrum, optio recusandae itaque veniam quae, quo mollitia culpa beatae. Veniam, reiciendis animi?
            Aperiam sint itaque soluta nihil quod, nisi illum molestiae odio libero repudiandae in, debitis eum! Nihil dolor commodi eligendi aut provident explicabo dolorum consequatur, excepturi, fuga alias veniam, optio assumenda?
            Omnis laboriosam quas voluptas quos pariatur quidem mollitia reprehenderit placeat, quisquam dolores, veniam amet quia quo? Aperiam excepturi ipsum perspiciatis quam sint iusto harum, at nam, eum laborum illo non?
          </p>
        </article>
      </section>

      @include('blocks.footer')
    </div>

    @include('blocks.foot_js')
  </body>
</html>
