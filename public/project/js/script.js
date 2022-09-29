

  // window.onload = () => {
  //   // (A) GET LIGHTBOX & ALL .ZOOMD IMAGES
  //   let all = document.getElementsByClassName("zoomD"),
  //       lightbox = document.getElementById("lightbox");
   
  //   // (B) CLICK TO SHOW IMAGE IN LIGHTBOX
  //   // * SIMPLY CLONE INTO LIGHTBOX & SHOW
  //   if (all.length>0) { for (let i of all) {
  //     i.onclick = () => {
  //       let clone = i.cloneNode();
  //       clone.className = "";
  //       lightbox.innerHTML = "";
  //       lightbox.appendChild(clone);
  //       lightbox.className = "show";
  //     };
  //   }}
   
  //   // (C) CLICK TO CLOSE LIGHTBOX
  //   lightbox.onclick = () => {
  //     lightbox.className = "";
  //   };
  // };

  const body=document.querySelector('body')
  const block=document.createElement('div')
  const img=document.createElement('img')
  
  
  
  function card(div) {
    body.style.overflow='hidden'
    console.log(div);
    const src=div.querySelector('.card__img').getAttribute('src')
    block.classList.add('zoom-full')
    img.classList.add('zoom-img')
    img.setAttribute('src',src)
    block.appendChild(img)
    body.appendChild(block)
  }
  block.onclick=function(){
    block.remove()
    body.style.overflow='inherit'
  }
  
  
  function setLang(lang) {
    document.cookie = "lang="+lang;
    window.location.reload();
  }