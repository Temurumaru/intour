function getCook(cookiename ){
  var cookiestring=RegExp(cookiename+"=[^;]+").exec(document.cookie);
  return decodeURIComponent(!!cookiestring ? cookiestring.toString().replace(/^[^=]+./,"") : "");
}

let data = [   //tumanlar haqidagi ma'lumotlar 
  {
    title: "Karakalpakstan", title1: "qoraqalpog'iston", title2: "3 Interesting facts",
    desc1: "Karakalpakstan is located in the western part of Uzbekistan and occupies more than a third of its territory. The population is 1 million 920 people.", desc2: "The capital is the city of Nukus. The official languages are Karakalpak and Uzbek.", desc3: "According to historical data, the Republic of Karakalpakstan is a fragment of an ancient civilization – the once powerful state of Khorezm."
  },
  {
    title: "Khorezm", title1: "xorazm", title2: "3 Interesting facts",
    desc1: "Khorezm is the oldest region of Uzbekistan.", desc2: "In the city of Khiva there are the most beautiful sights, which are the property of Uzbekistan.", desc3: "Homeland of the greatest scientists of the East."
  },
  {
    title: "Navoi", title1: "navoiy", title2: "3 Interesting facts",
    desc1: "Navoi region is the youngest in Uzbekistan. Its administrative center, the city of Navoi, was founded in 1958.", desc2: "Valuable archaeological finds were found in the Sarmyshsai Gorge, and ancient rock carvings were discovered on the southern slope of the Nuratinsky ridge.", desc3: "One of the most beautiful places in the region is Lake Aydarkul – a place of pristine beauty."
  },
  {
    title: "Bukhara", title1: "buxoro", title2: "3 Interesting facts",
    desc1: "Bukhara is one of the oldest cities in Uzbekistan and Central Asia, once the capital of the Bukhara Khanate.", desc2: "Bukhara is a city whose name means a successful area in translation.", desc3: "Its majestic architectural monuments - minarets, mosques and madrasas, commercial domes and hospitals, houses-reservoirs, squares are witnesses of the great history of Bukhara, numbering 25 centuries."
  },
  {
    title: "Jizakh", title1: "jizzax", title2: "3 Interesting facts",
    desc1: "There are various nature reserves in the Jizzakh region, where a rich variety of flora and fauna is protected.", desc2: "The Temir Darvoz Gate is located in Jizzakh – the 'gate of Amir Temur'.", desc3: '"Jizzakh samsa" is a popular and favorite dish, as well as a symbol of the Jizzakh region.'
  },
  {
    title: "Samarkand", title1: "samarqand", title2: "3 Interesting facts",
    desc1: "Samarkand is an ancient pearl of the East and one of the most beautiful cities in Uzbekistan", desc2: "During the reign of Amir Temur, Samarkand became the cultural and political capital of the Timurid Empire.", desc3: "The great traveler Marco Polo visited Samarkand. He visited the city in 1213, during a trip to China."
  },
  {
    title: "Kashkadarya", title1: "qashqadaryo", title2: "3 Interesting facts",
    desc1: "Kashkadarya region is the birthplace of Amir Temur.", desc2: "In Shakhrisabz, Amir Temur erected the Ak-Sarai (White House), a huge palace in which his residence was located in the XIV — early XV century.", desc3: "Kashkadarya region is the main breadbasket of the country, a supplier of cotton and other agricultural products."
  },
  {
    title: "Termez", title1: "termiz", title2: "3 Interesting facts",
    desc1: "Termez is one of the oldest cities in Central Asia — it is more than 2500 years old.", desc2: "A number of ancient archaeological and architectural monuments, ruins of ancient Zoroastrian, Nestorian and Buddhist fortresses have been preserved in Termez.", desc3: "In 1938-1939, Soviet archaeologist A.P.Okladnikov discovered the Teshik-Tash cave with a buried Neanderthal child in the Baysuntau Mountains."
  },
  {
    title: "Sirdarya", title1: "sirdaryo", title2: "3 Interesting facts",
    desc1: "Syrdarya region is located in the central part of Uzbekistan on the left side of the Syrdarya River.", desc2: "Syrdarya region continues to hold the leadership in the country in the production of wheat, melons and cotton.", desc3: "Syrdarya region continues to hold the leadership in the country in the production of wheat, melons and cotton."
  },
  {
    title: "Tashkent", title1: "toshkent va toshkent viloyati", title2: "3 Interesting facts",
    desc1: "Tashkent is the largest city in Central Asia.", desc2: "Parks, squares and other green spaces occupy almost a third of the entire Tashkent.", desc3: "Tashkent is an ancient city. He is over 2200 year."
  },
  {
    title: "Andijan", title1: "andijon", title2: "3 Interesting facts",
    desc1: "Andijan is one of the oldest cities in the fertile Ferghana Valley, a major trading post on the Great Silk Road, an ancient craft center of the region.", desc2: "Andijan is also famous for the fact that Zahir ad-din Muhammad Babur was born here in 1483.", desc3: "The Jami complex is the largest in the Ferghana Valley and one of the main historical and architectural monuments of Andijan, consisting of a mosque, a minaret and a madrasah."
  },
  {
    title: "Namangan", title1: "namangan", title2: "3 Interesting facts",
    desc1: "The second most populous city in Uzbekistan after Tashkent.", desc2: "Namangan was known as a handicraft center where potters, weavers, coppersmiths, blacksmiths, dyers, jewelers, print makers and shoemakers lived..", desc3: "Football is one of the most popular sports in Namangan"
  },
  {
    title: "Fergana", title1: "farg'on", title2: "3 Interesting facts",
    desc1: "The Ferghana Valley is the most densely populated part of Uzbekistan.", desc2: "Namangan was known as a handicraft center where potters, weavers, coppersmiths, blacksmiths, dyers, jewelers, print makers and shoemakers lived.", desc3: "One of the branches of the Great Silk Road passed through the Ferghana Valley"
  },

];

if(getCook('lang') == 'ru') {
  data = [   //tumanlar haqidagi ma'lumotlar 
    {
      title: "Каракалпакстан", title1: "qoraqalpog'iston", title2: "3 интересных факта",
      desc1: "Каракалпакия расположена в западной части Узбекистана и занимает более трети ее территории. Население насчитывает 1 млн. 920 человек.", desc2: "Столица – город Нукус. Государственные языки – каракалпакский и узбекский.", desc3: "Согласно историческим данным республика Каракалпакстан это осколок древней цивилизации – когда-то могущественного государства Хорезм."
    },
    {
      title: "Харезм", title1: "xorazm", title2: "3 интересных факта",
      desc1: "Хорезм - древнейшая область Узбекистана.", desc2: "В городе Хива расположены красивейшие достопримечательности, являющаяся достоянием Узбекистана.", desc3: "Родина величайших ученых востока"
    },
    {
      title: "Наваи", title1: "navoiy", title2: "3 интересных факта",
      desc1: "Навоийский регион самый молодой в Узбекистане. Его административный центр город Навои был основан в 1958 году.", desc2: "В ущелье Сармышсай были найдены ценные археологические находки, а на южном склоне Нуратинского хребта были обнаружены древние наскальные рисунки.", desc3: "Одно из самых красивейших мест в регионе озеро Айдаркуль – место первозданной красоты."
    },
    {
      title: "Бухара", title1: "buxoro", title2: "3 интересных факта",
      desc1: "Бухара — один из древнейших городов Узбекистана и Центральной Азии, некогда столица Бухарского ханства.", desc2: "Бухара – город, название, которого в переводе означает «удачная местность».", desc3: "Его величественные архитектурные памятники - минареты, мечети и медресе, торговые купола и больницы, хаузы-водоемы, площади являются свидетелями великой истории Бухары, насчитывающей 25 веков."
    },
    {
      title: "Джиззах", title1: "jizzax", title2: "3 интересных факта",
      desc1: "В джизакской области расположены различные заповедники, где под защитой находится богатое разнообразие флоры и фауны.", desc2: 'В Джизаке расположены Ворота Темир Дарвоза – "ворота Амира Темура".', desc3: '"Джизакская самса" – популярное и любимое блюдо, а также символ Джизакской области.'
    },
    {
      title: "Самарканд", title1: "samarqand", title2: "3 интересных факта",
      desc1: "Самарканд — древняя жемчужина Востока и один из красивейших городов Узбекистана.", desc2: "Во времена правления Амира Темура Самарканд стал культурной и политической столицей империи Темуридов.", desc3: "В Самарканде побывал великий путешественник Марко Поло. Он посетил город в 1213 году, во время путешествия в Китай."
    },
    {
      title: "Кашкадарья", title1: "qashqadaryo", title2: "3 интересных факта",
      desc1: "Кашкадарьинская область - родина Амира Темура.", desc2: "В Шахрисабзе Амиром Темуром был воздвигнут Ак-Сарай (Белый дом) — огромный дворец, в котором находилась его резиденция в XIV — начале XV века.", desc3: "Кашкадарьинская область — главная житница страны, поставщик хлопка и другой земледельческой продукции."
    },
    {
      title: "Термиз", title1: "termiz", title2: "3 интересных факта",
      desc1: "Термез является одним из древнейших городов Средней Азии — ему более 2500 лет.", desc2: "В Термезе сохранились ряд древнейших археологических и архитектурных памятников, руины древних зороастрийских, несторианских и буддистских крепостей.", desc3: "В 1938—1939 годах советский археолог А.П.Окладников обнаружил в горах Байсунтау пещеру Тешик-Таш с погребённым ребёнком-неандертальцем."
    },
    {
      title: "Сырдарья", title1: "sirdaryo", title2: "3 интересных факта",
      desc1: "Сырдарьинская область расположена в центральной части Узбекистана на левой стороне реки Сырдарья.", desc2: "Сырдарьинская область продолжает удерживать лидерство в стране по производству пшеницы, бахчевых и хлопка.", desc3: "В переводе с персидского языка, название города звучит очень романтично – «сад роз»."
    },
    {
      title: "Ташкент и Ташкентская область", title1: "toshkent va toshkent viloyati", title2: "3 интересных факта",
      desc1: "Ташкент — самый крупный город Средней Азии.", desc2: "Парки, скверы и прочие зелёные насаждения занимают почти треть всего Ташкента.", desc3: "Ташкент — древний город. Ему более 2200 лет."
    },
    {
      title: "Андижан", title1: "andijon", title2: "3 интересных факта",
      desc1: "Андижан - один из древнейших городов плодородной Ферганской долины, крупный торговый пункт на Великом шелковом пути, древний ремесленный центр региона.", desc2: "Андижан знаменит и тем, что в 1483 году здесь родился Захир-ад-дин Мухаммад Бабур.", desc3: "Комплекс Джами - крупнейший в Ферганской долине и один из главных историко-архитектурных памятников Андижана, состоящий из мечети, минарета и медресе."
    },
    {
      title: "Наманган", title1: "namangan", title2: "3 интересных факта",
      desc1: "Второй по численности населения город в Узбекистане после Ташкента.", desc2: "Наманган был известен как ремесленный центр, в котором проживали гончары, ткачи, медники, кузнецы, красильщики, ювелиры, набойщики тканей и сапожники.", desc3: "Футбол — один из популярнейших видов спорта в Намангане."
    },
    {
      title: "Фергана", title1: "farg'on", title2: "3 интересных факта",
      desc1: "Ферганская долина является самой густонаселенной частью Узбекистана.", desc2: "По территории Ферганской долины протекает одна из двух главных рек Центральной Азии – Сырдарья, образующаяся путем слияния рек Нарын и Карадарья. ", desc3: "Через Ферганскую долину проходила одна из ветвей Великого шелкового пути."
    },

  ];
}



window.addEventListener("DOMContentLoaded", () => {
  const mapVil = document.querySelector("#map-uz"),
    content = document.querySelector(".map-content");

  var generatedHTML = "";
  mapVil.addEventListener("click", event => { //xaritani biror joyiga bosganda targetni olish uchun listener
    var targetValue = event.target.getAttribute('tuman'); //bosilganda "tuman" atributidan bosilgan tuman nomini o'zgaruvchiga olvolish
    for (let item of data) { //data obyektini aylanib chiqib bosilgan tuman nomi bilan data dagi tumanlarni solishtirish va mos kelganini htmlga yozish;
      if (targetValue == item.title1) {
        generatedHTML = `
        <h2 class="text-2xl font-bold text-logoColor uppercase text-center">${item.title}</h2>
        <h3 class="text-center text-xl font-semibold">
        ${item.title2}
        </h3>
        <ul class="list-disc ml-5 text-lg">
          <li class="mt-3">${item.desc1}</li>
          <li class="mt-3">${item.desc2}
          </li>
          <li class="mt-3">
          ${item.desc3}
          </li>
        </ul>`
      }
    }

    content.innerHTML = generatedHTML
  })
});