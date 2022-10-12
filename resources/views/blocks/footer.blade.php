<footer class="bg-bgColor py-10 md:py-20 relative">

  <div class="container mx-auto">
    <div class="grid md:grid-cols-3 grid-cols-1 gap-6 md:gap-12">
      <div class="flex items-center text-white">
        <div
          class="bg-logoColor w-14 h-14 flex justify-center rounded-lg items-center mr-3"
        >
          <i class="ri-phone-line text-2xl"></i>
        </div>
        <div>
          <h5 class="text-lg font-bold">{{LN['call us']}}</h5>
          <p class="text-md">+ 998 (93) 500-1555</p>
        </div>
      </div>
      <div class="flex items-center text-white">
        <div
          class="bg-logoColor w-14 h-14 flex justify-center rounded-lg items-center mr-3"
        >
          <i class="ri-mail-send-fill text-2xl"></i>
        </div>
        <div>
          <h5 class="text-lg font-bold">{{LN['write to us']}}</h5>
          <p class="text-md">info@intour.uz</p>
        </div>
      </div>
      <div class="flex items-center text-white">
        <div
          class="bg-logoColor w-14 h-14 flex justify-center rounded-lg items-center mr-3"
        >
          <i class="ri-map-pin-line text-2xl"></i>
        </div>
        <div>
          <h5 class="text-lg font-bold"> {{LN['address']}}</h5>
          <p class="text-md">{{LN['Uzbekistan , Tashkent , Navoi 2']}}</p>
        </div>
      </div>
    </div>
    <div
      class="grid grid-cols-2 md:grid-cols-3 md:gap-12 gap-4 mt-10 text-white"
    >
      <div>
        <img src="./project/image/logoWhite.png" alt="" />
        <ul class=" ">
          <li class="my-4 lg:mr-10">
            <a href="#">
            {{LN['our company has been providing its services in the field of tourism since 2016']}}</a
            >
          </li>
          <li class="flex">
            <a href="#">
              <i class="ri-facebook-circle-fill text-2xl"></i>
            </a>
            <a href="#" class="mx-5">
              <i class="ri-instagram-fill text-2xl"></i>
            </a>
            <a href="#" class="mr-4">
              <i class="ri-telegram-fill text-2xl"></i>
            </a>
          </li>
        </ul>
      </div>
      <div>
        <ul class=" ">
          <li class="mb-4 lg:mr-10">
            <h2 class="text-capitalize">{{LN['pages']}}</h2>
          </li>
          <li>
            <a href="/about">{{LN['about us']}}</a>
          </li>
          {{-- <li>
            <a href="/destinations">
            {{LN['tours']}}
            </a>
          </li> --}}
          <li>
            <a href="/destinations">{{LN['destinations']}}</a>
          </li>
          <li>
            <a href="/blog_sub">{{LN['our blogs']}}</a>
          </li>
        </ul>
      </div>
      <div class="md:col-span-1 col-span-2  sm:col-span-2">
        <ul class="">
          <li class="mb-4 lg:mr-10">
            <h2 class="text-capitalize">            {{LN['subscribe']}}
</h2>
          </li>
          <li class="my-4 lg:mr-10">
            <a href="#"
              >
            {{LN['sign up our monthly blogletter to stay informed about
  travel and tours']}}
              </a
            >
          </li>
          <li>
            <form>
              <div class="relative">
                <input
                  type="search"
                  id="default-search"
                  class="block p-4 pl-5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                  placeholder="{{LN['email address']}}"
                  required
                />
                <button
                  type="submit"
                  class="text-white absolute right-2 bottom-1.5 bg-logoColor focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm md:px-6 py-3 px-5 "
                >
                {{LN['send']}}

                </button>
              </div>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <a href="#header" class="bg-logoColor p-3 rounded-full flex justify-center items-center inline-flex absolute right-10 bottom-32 text-white">
    <i class="ri-arrow-up-s-line text-3xl"></i>
  </a>
</footer>