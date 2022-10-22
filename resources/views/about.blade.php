<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Intour/About</title>
    @include('blocks.head_imp')
  </head>

  <body>
    <div class="wrapper overflow-hidden">
      <header id="header" class="relative">
        @include('blocks.header')
        <div
          class="header__content bg-center bg-[url('./img/im1.jpg')] bg-blend-darken md:mt-0 pt-32 pb-40 md:py-40 md:pb-50 text-white bg-no-repeat bg-cover"
        >
        <div class=" w-full h-full ">
          <div class="container mx-auto">
            <h2 class="text-3xl md:text-6xl font-bold mb-3">{{LN['about us']}}</h2>
            <h3 class="text-lg md:text-2xl font-semibold">
              <a href="./">{{LN['home']}}</a> /
              <span class="text-logoColor">
                <a href="./about">{{LN['about us']}}</a></span
              >
            </h3>
          </div>
        </div>
        </div>
      </header>

      <section class="py-10 md:py-20">
        <div class="container mx-auto">
          <div class="grid md:grid-cols-2 grid-cols-1 gap-12">
            <div class="">
              <div data-aos="fade-up" class="py-4 md:py-5">
                <h5
                  class="text-base font-semibold uppercase text-logoColor md:text-lg"
                >
                  {{LN['travel agency']}} INTOUR
                </h5>
                <h1
                  class="text-2xl font-bold uppercase md:text-4xl text-bgColor"
                >
                  {{-- {{LN['discover uzbekistan']}} <br class="md:block hidden"> {{LN['with']}}  --}}{{LN['DISCOVER THE WORLD OF ORIENTAL FAIRY TALES TOGETHER WITH']}}
                  <span class="text-logoColor">{{LN['intour']}}!</span>
                </h1>
              </div>
              <p>
                {{LN['Our company has been providing its services in the field of tourism since 2016. Despite its youth, our company has already accumulated experience and knowledge that help us to provide our clients with high-level services. Our company employs the best specialists – experienced and qualified employees who will be happy to organize for you exactly the vacation you dreamed of. Why should you choose us, you ask. In our company you will be able to book a tour that will open the east in front of you, and plunge you into a beautiful oriental fairy tale with its legends and legends, majestic minarets and luxurious palaces in which khans and emirs once lived. We know and understand the wishes of our clients to make their holidays as organized and enjoyable as possible. That is why we apply an individual approach to each of our clients. By contacting our travel company, you can count on qualified advice, understanding and attention from our employees. They will help you in detail and tell you about each tour, as well as pick up a tour, a hotel and a convenient flight option that will suit you. The quality of our services is constantly improving – we take into account all the wishes of our customers, and try to take them into account in order to create the most favorable conditions for our customers rest. If you entrust the organization of your vacation to our company, you will definitely remember your vacation, because here you can choose a vacation for every taste in accordance with your interests and desires.']}}
                {{-- {{LN['our company has been providing its services in the field of tourism since 2016. despite its youth, our company has already accumulated experience and knowledge that help us provide high-level services to our customers.']}} --}}
              </p>
              <div data-aos="fade-right" class="flex my-4 items-center">
                <i
                  class="ri-check-line w-5 h-5 text-white bg-logoColor mr-2.5 flex items-center justify-center rounded-full"
                ></i>
                <p>{{LN['7 years of experience']}}</p>
              </div>
              <div data-aos="fade-right" class="flex my-4 items-center">
                <i
                  class="ri-check-line w-5 h-5 text-white bg-logoColor mr-2.5 flex items-center justify-center rounded-full"
                ></i>
                <p>{{LN['10+ tour destinations']}}</p>
              </div>
              <div data-aos="fade-right" class="flex my-4 items-center">
                <i
                  class="ri-check-line w-5 h-5 text-white bg-logoColor mr-2.5 flex items-center justify-center rounded-full"
                ></i>
                <p>{{LN['1500+ happy customers']}}</p>
              </div>
            </div>
            <div class="flex justify-center items-center">
              <div class="items-center__images">
                <div class="bg-main"></div>
                <img
                  class="absolute -top-5 -left-5"
                  src="./project/image/Circles.svg"
                  alt=""
                />
                <img
                  class="main"
                  src="./project/image/about us/Wallpaper.png"
                  alt=""
                />
                <img
                  class="toppe"
                  src="./project/image/about us/Toppe.svg"
                  alt=""
                />
              </div>
            </div>
          </div>
        </div>
        
        <div class="container mx-auto">
          <div data-aos="fade-up" class="py-8 md:py-10">
            <h5
              class="text-base font-semibold uppercase text-logoColor md:text-lg"
            >
              {{LN['documents']}}
            </h5>
            <h1 class="text-2xl font-bold uppercase md:text-4xl text-bgColor">
              {{LN['certificates']}}
            </h1>
          </div>
          <div class="grid grid-cols-3 md:gap-12 gap-6">
            <a class="gallery__card" onclick="card(this)" data-aos="fade-up" >
              <img class="w-full card__img object-contain  max-w-[440px] max-h-[480px]" src="./project/image/guvohnoma/Guvognoma.png" alt="" />
              <h2 class="lg:text-base mt-2 font-bold text-xs text-center">
                Certificate
              </h2>
            </a>
            <a class="gallery__card"  onclick="card(this)" data-aos="fade-up">
              <img class="w-full  card__img object-contain  max-w-[440px] max-h-[480px]" src="./project/image/guvohnoma/Licence.png" alt="" />
              <h2 class="lg:text-base mt-2 font-bold text-xs text-center">
                Licence
              </h2>
            </a>
            <a class="gallery__card text-center" onclick="card(this)" data-aos="fade-up">
              <img class="w-full object-contain   card__img max-w-[440px] max-h-[480px]" src="./project/image/guvohnoma/Photo Guide.png" alt="" />
              <h2 class="lg:text-base mt-2 font-bold text-xs ">
                Accordance
              </h2>
            </a>
          </div>
        </div>
      </section>

      @include('blocks.footer')
    </div>

    @include('blocks.foot_js')
  </body>
</html>