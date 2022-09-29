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
        <div style="filter: brightness(0.5);"  class="header__content contact__bg bg-[url('./project/image/bg-about.png')]  md:mt-0 pt-32 pb-40 md:py-40 md:pb-50 text-white bg-no-repeat bg-cover">
          <div class="container mx-auto">
            <h2 class="text-3xl md:text-6xl font-bold mb-3" data-aos="fade-right">{{LN['contact us']}}</h2>
            <h3 class="text-lg md:text-2xl font-semibold" data-aos="fade-right" >{{LN['home']}}/ <span class="text-logoColor"> {{LN['contact']}}</span></h3>
          </div>
        </div> 
        
      </header>

      <section class="py-10 md:py-20">
        <div class="container mx-auto">
          <div class="grid lg:grid-cols-4 grid-cols-2 gap-5 lg:gap-10">
            <div class=" flex flex-col justify-center items-center" data-aos="fade-up" data-aos-delay="50">
              <img src="./project/image/contact/Location.png" alt="">
              <h3 class="text-lg font-semibold my-3 text-bgColor ">{{LN['location']}}</h3>
              
                <p class="text-black">{{LN['uzbekistan, tashkent city,']}}</p>
                <p class="text-black">{{LN['navoiy 2 st']}}</p>
            </div>
            <div class=" flex flex-col justify-center items-center" data-aos="fade-up" data-aos-delay="100">
              <img src="./project/image/contact/phone.png" alt="">
              <h3 class="text-lg font-semibold my-3 text-bgColor ">{{LN['phones']}}</h3>
              <p class="text-black">+998 (71) 200-59-00</p>
              <p class="text-black">+998 (90) 188-33-33</p>
            </div>
            <div class=" flex flex-col justify-center items-center" data-aos="fade-up" data-aos-delay="150">
              <img src="./project/image/contact/messenger.png" alt="">
              <h3 class="text-lg font-semibold my-3 text-bgColor ">{{LN['mails']}}</h3>
              <p class="text-black">info@intours.uz</p>
              <p class="text-black">info@travelintour.uz</p>
            </div>
            <div class=" flex flex-col justify-center items-center" data-aos="fade-up" data-aos-delay="200">
              <img src="./project/image/contact/time.png" alt="">
              <h3 class="text-lg font-semibold my-3 text-bgColor ">{{LN['working hours']}}</h3>
              <p class="text-black">{{LN['monday friday']}}</p>
              <p class="text-black">9:00 AM - 7:00 PM</p>
            </div>
          </div>
        </div>
      </section>
      <section>
        <div class="grid grid-cols-1">
          <iframe class="w-full h-[400px] md:h-[600px]" data-aos="fade-up" data-aos-delay="50" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d749.1202033568303!2d69.26661007073444!3d41.32015696188094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38ae8b5c208283f1%3A0xc822f76ae358f24f!2sGimnastika%20bo&#39;yicha%20Respublika%20ixtisoslashtirilgan%20Olimpiya%20zaxiralari!5e0!3m2!1sru!2s!4v1662275869133!5m2!1sru!2s"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </section>

      @include('blocks.footer')
    </div>

    @include('blocks.foot_js')
  </body>
</html>