<?php 
use RedBeanPHP\R as R;
?>

<div class="loader-wrapper">
  <span class="loader"></span>
</div>

<div class="hidden py-2 text-white md:block nav__top bg-bgColor">
  <div class="container flex justify-between mx-auto">
    <div>
      <div
        class="inline-flex items-center pr-5 border-r border-borderColor"
      >
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
          $w_days = array( 1 => "Monday" , "Tuesday" , "Wednesday" , "Thursday" , "Friday" , "Saturday" , "Sunday" );
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
          $w_days = array( 1 => "Понедельник" , "Вторник" , "Среда" , "Четверг" , "Пятница" , "Суббота" , "Воскресенье" );
        }
        $month = date('n')-1;
        ?>

        <i class="ri-calendar-todo-line text-2xl mr-2"></i>
        <p class="text-sm"><?=$w_days[date('N')].' '.date('d').' '.$arr[$month].' '.date('Y')?></p>
      </div>
      <div
        class="inline-flex items-center px-5 border-r border-borderColor"
      >
        <i class="ri-map-pin-line text-2xl mr-2"></i>
        <p class="text-sm">{{LN['tashkent uzbekistan']}}</p>
      </div>
      <div class="inline-flex items-center px-5 border-borderColor">
        <i class="ri-time-line text-2xl mr-2"></i>
        <p class="text-sm">{{LN['monFri 10am  5pm']}}</p>
      </div>
    </div>
    <div class="flex items-center">
      <a href="https://www.facebook.com/intourtashkent">
        <i class="ri-facebook-circle-fill text-2xl"></i>
      </a>
      <a href="https://www.instagram.com/intouruz/" class="mx-5">
        <i class="ri-instagram-fill text-2xl"></i>
      </a>
      <a href="https://t.me/intour_uz" class="mr-4">
        <i class="ri-telegram-fill text-2xl"></i>
      </a>
      <div
        class="inline-flex items-center px-5 border-l border-borderColor"
      >
        <button
          id="dropdownDefault"
          data-dropdown-toggle="dropdown"
          class="text-white font-medium rounded-lg text-sm px-1 py-0.5 text-center inline-flex items-center"
          type="button"
        >
        <i class="ri-global-fill text-2xl mr-2"></i>
          <p><?=(@$_COOKIE['lang'] != "ru") ? "ENG" : "РУС"?></p>
        </button>
        <!-- Dropdown menu -->
        <div
          id="dropdown"
          class="hidden z-[99999] w-44 bg-white rounded divide-y divide-gray-100 shadow"
        >
          <ul
            class="py-1 text-sm text-gray-700 "
            aria-labelledby="dropdownDefault"
          >
            <li>
              <a href="#" onclick="setLang('en')" class="block py-2 px-4 hover:bg-gray-100"
                >ENG</a
              >
            </li>
            <li>
              <a href="#" onclick="setLang('ru')" class="block py-2 px-4 hover:bg-gray-100"
                >РУС</a
              >
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<nav
  class="navbar sticky top-0 right-0 md:top-[42px] w-full z-50 bg-white left-0 px-2 py-3 text-xs text-white border-gray-200 "
>
  <div
    class="container flex flex-wrap items-center justify-between mx-auto"
  >
    <a href="/" class="flex items-center">
      <img src="./project/image/Logo.png" alt="" />
    </a>
    <button
      data-collapse-toggle="mobile-menu"
      type="button"
      class="inline-flex items-center justify-center ml-3 text-gray-400 rounded-lg md:hidden hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-300 "
      aria-controls="mobile-menu-2"
      aria-expanded="false"
    >
      <span class="sr-only">{{LN['open main menu']}}</span>
      <svg
        class="w-6 h-6"
        aria-hidden="true"
        fill="currentColor"
        viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          fill-rule="evenodd"
          d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
          clip-rule="evenodd"
        ></path>
      </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="mobile-menu">
      <ul
        class="flex flex-col p-4 mt-4 border rounded-lg md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0"
      >
        <li>
          <a
            href="/"
            class="block py-2 pl-3 pr-4 text-titleText rounded hover:text-logoColor md:bg-transparent md:p-0"
            aria-current="page"
            >{{LN['home']}}</a
          >
        </li>
        <li>
          <button
            id="dropdownNavbarLink"
            data-dropdown-toggle="dropdownNavbar"
            class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-white text-gray-700 rounded hover:text-logoColor logoColor md:hover:bg-transparent md:border-0 md:p-0 md:w-auto "
          >
          {{LN['cities']}}
            
            <svg
              class="w-5 h-5 ml-1"
              aria-hidden="true"
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
          <!-- Dropdown menu -->
          <div
            id="dropdownNavbar"
            class="hidden z-10 block font-normal bg-white divide-y divide-gray-100 rounded shadow w-44"
            data-popper-reference-hidden=""
            data-popper-escaped=""
            data-popper-placement="bottom"
            style="
              position: absolute;
              inset: 0px auto auto 0px;
              margin: 0px;
              transform: translate(381px, 66px);
            "
          >
            <ul
              class="py-1 text-sm text-gray-700"
              aria-labelledby="dropdownLargeButton"
            >
              <li>
                <a
                  href="./tour_cities?id=1"
                  class="block px-4 py-2"
                  >{{LN['toshkent']}}</a
                >
              </li>
              <li>
                <a
                  href="./tour_cities?id=2"
                  class="block px-4 py-2 hover:bg-gray-100 "
                  >{{LN['samarkhand']}}</a
                >
              </li>
              <li>
                <a
                  href="./tour_cities?id=3"
                  class="block px-4 py-2 hover:bg-gray-100 "
                  >{{LN['khiva']}}</a
                >
              </li>
              <li>
                <a
                  href="./tour_cities?id=4"
                  class="block px-4 py-2 hover:bg-gray-100 "
                  >{{LN['karakalpakstan']}}</a
                >
              </li>
              <li>
                <a
                  href="./tour_cities?id=5"
                  class="block px-4 py-2 hover:bg-gray-100 "
                  >{{LN['navoiy']}}</a
                >
              </li>
              <li>
                <a
                  href="./tour_cities?id=6"
                  class="block px-4 py-2 hover:bg-gray-100 "
                  >{{LN['fergana']}}</a
                >
              </li>
              <li>
                <a
                  href="/tour_cities?id=7"
                  class="block px-4 py-2 hover:bg-gray-100 "
                  >{{LN['bukhara']}}</a
                >
              </li>
              <li>
                <a
                  href="./tour_cities?id=8"
                  class="block px-4 py-2 hover:bg-gray-100 "
                  >{{LN['horezm']}}</a
                >
              </li>
              <li>
                <a
                  href="./tour_cities?id=9"
                  class="block px-4 py-2 hover:bg-gray-100 "
                  >{{LN['qashqararyo']}}</a
                >
              </li>
              <li>
                <a
                  href="./tour_cities?id=10"
                  class="block px-4 py-2 hover:bg-gray-100 "
                  >{{LN['jizzah']}}</a
                >
              </li>
              <li>
                <a
                  href="./tour_cities?id=11"
                  class="block px-4 py-2 hover:bg-gray-100 "
                  >{{LN['namangan']}}</a
                >
              </li>
              <li>
                <a
                  href="./tour_cities?id=12"
                  class="block px-4 py-2 hover:bg-gray-100 "
                  >{{LN['termiz']}}</a
                >
              </li>
              <li>
                <a
                  href="./tour_cities?id=13"
                  class="block px-4 py-2 hover:bg-gray-100 "
                  >{{LN['andijon']}}</a
                >
              </li>
              <li>
                <a
                  href="./tour_cities?id=15"
                  class="block px-4 py-2 hover:bg-gray-100 "
                  >{{LN['kokand']}}</a
                >
              </li>
              <li>
                <a
                  href="./tour_cities?id=16"
                  class="block px-4 py-2 hover:bg-gray-100 "
                  >{{LN['chimgan']}}</a
                >
              </li>
              <li>
                <a
                  href="./tour_cities?id=17"
                  class="block px-4 py-2 hover:bg-gray-100 "
                  >{{LN['shakhrisabz']}}</a
                >
              </li>
            </ul>
           
          </div>
        </li>
        <li>
          <button
            id="dropdownNavbarLink"
            data-dropdown-toggle="dropdownNavbar2"
            class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-white text-gray-700 rounded hover:text-logoColor logoColor md:hover:bg-transparent md:border-0 md:p-0 md:w-auto"
          >
          {{LN['tourism']}}
            <svg
              class="w-5 h-5 ml-1"
              aria-hidden="true"
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
          <!-- Dropdown menu -->
          <div
            id="dropdownNavbar2"
            class="hidden z-10 block font-normal bg-white divide-y divide-gray-100 rounded shadow w-44"
            data-popper-reference-hidden=""
            data-popper-escaped=""
            data-popper-placement="bottom"
            style="
              position: absolute;
              inset: 0px auto auto 0px;
              margin: 0px;
              transform: translate(381px, 66px);
            "
          >
            <ul
              class="py-1 text-sm text-gray-700 "
              aria-labelledby="dropdownLargeButton"
            >
              <li>
                <a
                  href="./tourism?id=2"
                  class="block px-4 py-2 hover:bg-gray-100 "
                  >{{LN['gastronomic tourism']}}</a
                >
              </li>
              <li>
                <a
                  href="/tourism?id=4"
                  class="block px-4 py-2 hover:bg-gray-100 "
                  >{{LN['religious tourism']}}</a
                >
              </li>
              <li>
                <a
                  href="/tourism?id=3"
                  class="block px-4 py-2 hover:bg-gray-100 "
                  >{{LN['cultural tourism']}}</a
                >
              </li>
              <li>
                <a
                  href="/tourism?id=1"
                  class="block px-4 py-2 hover:bg-gray-100 "
                  >{{LN['medical tourism']}}</a
                >
              </li>
              <li>
                <a
                  href="/tourism?id=5"
                  class="block px-4 py-2 hover:bg-gray-100 "
                  >{{LN['mountain tourism']}}</a
                >
              </li>
              <li>
                <a
                  href="/tourism?id=6"
                  class="block px-4 py-2 hover:bg-gray-100 "
                  >{{LN['eco tourism']}}</a
                >
              </li>
            </ul>
            
          </div>
        </li>
        <li>
          <a
            href="/destinations"
            class="block py-2 pl-3 pr-4 text-titleText rounded hover:text-logoColor md:bg-transparent md:p-0 "
            >{{LN['destinations']}}</a
          >
        </li>
        <li>
          <button
            id="dropdownNavbarLink"
            data-dropdown-toggle="dropdownNavbar1"
            class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-white text-gray-700 rounded hover:text-logoColor logoColor md:hover:bg-transparent md:border-0 md:p-0 md:w-auto "
          >
          {{LN['explore more']}}
            <svg
              class="w-5 h-5 ml-1"
              aria-hidden="true"
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
          <!-- Dropdown menu -->
          <div
            id="dropdownNavbar1"
            class="hidden z-10 block font-normal bg-white divide-y divide-gray-100 rounded shadow w-44 "
            data-popper-reference-hidden=""
            data-popper-escaped=""
            data-popper-placement="bottom"
            style="
              position: absolute;
              inset: 0px auto auto 0px;
              margin: 0px;
              transform: translate(381px, 66px);
            "
          >
            <ul
              class="py-1 text-sm text-gray-700"
              aria-labelledby="dropdownLargeButton"
            >
              <li>
                <a
                  href="./about"
                  class="block px-4 py-2 "
                  >{{LN['about us']}}</a
                >
              </li>
              <li>
                <a
                  href="./blog_sub"
                  class="block px-4 py-2 hover:bg-gray-100 "
                  >{{LN['our blogs']}}</a
                >
              </li>
              <li>
                <a
                  href="/gallery"
                  class="block px-4 py-2 hover:bg-gray-100 "
                  >{{LN['gallery']}}</a
                >
              </li>
              <li>
                <a
                  href="/contact"
                  class="block px-4 py-2 capitalize hover:bg-gray-100   "
                  >{{LN['_contact us']}}</a
                >
              </li>

              <?php
              $lst = R::findAll('text_pages');
              foreach ($lst as $vl) {
              ?>
              
              <li>
                <a
                  href="/text_page?id={{$vl -> id}}"
                  class="block px-4 py-2 capitalize hover:bg-gray-100   "
                  >{{(@$_COOKIE['lang'] != 'ru') ? $vl -> title : $vl -> title_ru}}</a
                >
              </li>

              <?php }?>

            </ul>
            
          </div>
        </li>
        <li class="md:hidden">
          <div
        class="inline-flex items-center"
      >
        <button
          id="dropdownDefault1"
          data-dropdown-toggle="dropdown1"
          class="text-gray-700  py-2 pl-3 pr-4  font-medium rounded-lg text-sm text-center inline-flex items-center"
          type="button"
        >
        <i class="ri-global-fill text-lg mr-2"></i>
          <p class="text-sm"><?=(@$_COOKIE['lang'] != "ru") ? "ENG" : "РУС"?></p>
        </button>
        <!-- Dropdown menu -->
        <div
          id="dropdown1"
          class="hidden z-[99999] w-full bg-white rounded divide-y divide-gray-100 shadow"
        >
          <ul
            class="py-1 text-sm text-gray-700 "
            aria-labelledby="dropdownDefault1"
          >
            <li>
              <a href="#" onclick="setLang('en')" class="block py-2 px-4 hover:bg-gray-100"
                >ENG</a
              >
            </li>
            <li>
              <a href="#" onclick="setLang('ru')" class="block py-2 px-4 hover:bg-gray-100"
                >РУС</a
              >
            </li>
          </ul>
        </div>
      </div>
        </li>
        
      </ul>
    </div>
  </div>
</nav>