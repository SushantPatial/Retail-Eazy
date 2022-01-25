
(function() {
  "use strict";

  /* Easy selector helper function */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /* Easy event listener function */
  const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all)
    if (selectEl) {
      if (all) {
        selectEl.forEach(e => e.addEventListener(type, listener))
      } else {
        selectEl.addEventListener(type, listener)
      }
    }
  }

  /* Easy on scroll event listener  */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  /* Navbar links active state on scroll */
  let navbarlinks = select('#navbar .scrollto', true)
  const navbarlinksActive = () => {
    let position = window.scrollY + 200
    navbarlinks.forEach(navbarlink => {
      if (!navbarlink.hash) return
      let section = select(navbarlink.hash)
      if (!section) return
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        navbarlink.classList.add('active')
      } else {
        navbarlink.classList.remove('active')
      }
    })
  }
  window.addEventListener('load', navbarlinksActive)
  onscroll(document, navbarlinksActive)

  /* Scrolls to an element with header offset */
  const scrollto = (el) => {
    let header = select('#header')
    let offset = header.offsetHeight

    if (!header.classList.contains('header-scrolled')) {
      offset -= 16
    }

    let elementPos = select(el).offsetTop
    window.scrollTo({
      top: elementPos - offset,
      behavior: 'smooth'
    })
  }

  /* Toggle .header-scrolled class to #header when page is scrolled */
  let selectHeader = select('#header')
  if (selectHeader) {
    const headerScrolled = () => {
      if (window.scrollY > 100) {
        selectHeader.classList.add('header-scrolled')
      } else {
        selectHeader.classList.remove('header-scrolled')
      }
    }
    window.addEventListener('load', headerScrolled)
    onscroll(document, headerScrolled)
  }

  /* Back to top button */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 200) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }

  /* Book Demo button */
  let bookdemobtn = select('.book-demo-btn')
  if (bookdemobtn) {
    const bookDemo = () => {
      if (window.scrollY > 200) {
        bookdemobtn.classList.add('active')
      } else {
        bookdemobtn.classList.remove('active')
      }
    }
    window.addEventListener('load', bookDemo)
    onscroll(document, bookDemo)
  }

  /* Mobile nav toggle */
  on('click', '.mobile-nav-toggle', function(e) {
    select('#navbar').classList.toggle('navbar-mobile')
    this.classList.toggle('bi-list')
    this.classList.toggle('bi-x')
  })

  /* Mobile nav dropdowns activate */
  on('click', '.navbar .dropdown > a', function(e) {
    if (select('#navbar').classList.contains('navbar-mobile')) {
      e.preventDefault()
      this.nextElementSibling.classList.toggle('dropdown-active')
    }
  }, true)

  /* Scroll with ofset on links with a class name .scrollto */
  on('click', '.scrollto', function(e) {
    if (select(this.hash)) {
      e.preventDefault()

      let navbar = select('#navbar')
      if (navbar.classList.contains('navbar-mobile')) {
        navbar.classList.remove('navbar-mobile')
        let navbarToggle = select('.mobile-nav-toggle')
        navbarToggle.classList.toggle('bi-list')
        navbarToggle.classList.toggle('bi-x')
      }
      scrollto(this.hash)
    }
  }, true)

  /* Scroll with ofset on page load with hash links in the url */
  window.addEventListener('load', () => {
    if (window.location.hash) {
      if (select(window.location.hash)) {
        scrollto(window.location.hash)
      }
    }
  });
  
  /* Animation on scroll */
  window.addEventListener('load', () => {
    AOS.init({
      duration: 1000,
      easing: 'ease-in-out',
      once: false,
      mirror: true
    })
  });
 

  /* Detect scroll to div */
  function isScrolledIntoView(elem) {
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();
    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop;
    return ((elemBottom >= docViewTop) && (elemTop <= docViewBottom) && (elemBottom <= docViewBottom) && (elemTop >= docViewTop));
  }

  $(window).scroll(function() {    
    if(isScrolledIntoView($('#stats-box'))) {
      $('.counting').each(function() {
        var $this = $(this),
            countTo = $this.attr('data-count');
        
        $({ countNum: $this.text()}).animate({
          countNum: countTo
        },
        {
          duration: 3000,
          easing:'linear',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
          }
        });  
      });  
    }    
  });

  /* Hero typing and deleting effect */
  const words = ["Communication gap between Manufacturers & Retailers", "Blame Game between Distributors & Retailers"];

  let i = 0;
  // Character number of the current word being processed 
  var ch = 0;
  let timer;

  /* Implements typing effect
  function Type() { 
    var text =  words[i].substring(0, ch + 1);
    document.querySelector("#word").innerHTML = text;
    ch++;

    // If full word has been displayed then start to delete the word after some time
    if(text === words[i]) {
      clearInterval(timer);
      setTimeout(function() {
        timer = setInterval(Delete, 30);
      }, 2000);
    }
  }

  // Implements deleting effect
  function Delete() {
    var text =  words[i].substring(0, ch - 1);
    document.querySelector("#word").innerHTML = text;
    ch--;

    // If word has been deleted then start to display the next word
    if(text === '') {
      clearInterval(timer);

      // If last word then display the first one, else move to the next
      if(i == (words.length - 1))
        i = 0;
      else
        i++;
      
      ch = 0;

      // Start to display the next word after some time
      setTimeout(function() {
        timer = setInterval(Type, 100);
      }, 200);
    }
  }

  timer = setInterval(Type, 100);
 */
  /**
   * Services  slider
   */
 



  $( window ).resize(function() {
    if ($(window).width() < 700) {
      $(".features-img").attr("src","assets/images/features-mobile.jpg");
      $(".features-img").addClass("features-img-mobile");
      $("#vid").addClass("hero-vid-mobile");
    }
    else {
      $(".features-img").attr("src","assets/images/features.jpg");
      $(".features-img").removeClass("features-img-mobile");
      $("#vid").removeClass("hero-vid-mobile");
    }
  });

  if ($(window).width() < 700) {
    $("#vid").addClass("hero-vid-mobile");
  }
  else {
    $("#vid").removeClass("hero-vid-mobile");
  }

  if ($(window).width() < 576) {
    $("#video .section-title h2").html("Video Tutorials");
  }
  else {
    $("#video .section-title h2").html("Some Short Video Tutorials");
  }

  $(window).on("resize", function() {
    if ($(window).width() < 576) {
      $("#video .section-title h2").html("Video Tutorials");
    }
    else {
      $("#video .section-title h2").html("Some Short Video Tutorials");
    }
  })

  var w = window.matchMedia("(max-width: 700px)");
  var vid = document.getElementById("vid");
  var source = document.createElement("source");
  source.id = "hvid";
  source.setAttribute("type", "video/mp4");
  vid.appendChild(source);

  if (w.matches) {
    vid.pause();
    source.removeAttribute("src");
    source.setAttribute("src", "assets/images/hero-bg-mobile.mp4");
    vid.load();
    vid.play();
  } else {
    vid.pause();
    source.removeAttribute("src");
    source.setAttribute("src", "assets/images/hero-bg-crop.mp4");
    vid.load();
    vid.play();
  }

  window.addEventListener("resize", function(){
  var w = window.matchMedia("(max-width: 700px)");
  var vid = document.getElementById("vid");
  var source = document.getElementById("hvid");

  if (w.matches) {
    vid.pause();
    source.src = "assets/images/hero-bg-mobile.mp4";
    vid.load();
    vid.play();
  } else {
    vid.pause();
    source.src = "assets/images/hero-bg-crop.mp4";
    vid.load();
    vid.play();
  }
  });


  // For desktops
  $(window).scroll(function(){
    if (($(window).scrollTop() >= $('.slide-test1').offset().top - 200 || $(window).scrollTop() <= $('.slide-test1').offset().top + $('.slide-test1').height() - 400) && $(window).width() > 1200) {
      $('.slide1-test-phone1').addClass('animate-slide1-test-phone1');
      $('.slide1-test-phone2').addClass('animate-slide1-test-phone2');
      $('.slide1-test-phone3').addClass('animate-slide1-test-phone3');
      $('.slide1-test-phone4').addClass('animate-slide1-test-phone4');
      $('.slide1-test-phone5').addClass('animate-slide1-test-phone5');
      $('.slide1-test-phone6').addClass('animate-slide1-test-phone6'); 
      $('.slide1-test-phone7').addClass('animate-slide1-test-phone7'); 
    }
    if (($(window).scrollTop() <= $('.slide-test1').offset().top - 200 || $(window).scrollTop() >= $('.slide-test1').offset().top + $('.slide-test1').height() - 400) && $(window).width() > 1200) {
      $('.slide1-test-phone1').removeClass('animate-slide1-test-phone1');
      $('.slide1-test-phone2').removeClass('animate-slide1-test-phone2');
      $('.slide1-test-phone3').removeClass('animate-slide1-test-phone3');
      $('.slide1-test-phone4').removeClass('animate-slide1-test-phone4');
      $('.slide1-test-phone5').removeClass('animate-slide1-test-phone5');
      $('.slide1-test-phone6').removeClass('animate-slide1-test-phone6');       
      $('.slide1-test-phone7').removeClass('animate-slide1-test-phone7');  
    }

    if (($(window).scrollTop() >= $('.slide-test2').offset().top - 200 || $(window).scrollTop() <= $('.slide-test2').offset().top + $('.slide-test2').height() - 400) && $(window).width() > 1200) {
      $('.slide2-test-phone').addClass('animate-slide2-test-phone');      
    }
    if (($(window).scrollTop() <= $('.slide-test2').offset().top - 200 || $(window).scrollTop() >= $('.slide-test2').offset().top + $('.slide-test2').height() - 400) && $(window).width() > 1200) {
      $('.slide2-test-phone').removeClass('animate-slide2-test-phone');   
    }

    if (($(window).scrollTop() >= $('.slide-test3').offset().top - 200 || $(window).scrollTop() <= $('.slide-test3').offset().top + $('.slide-test3').height() - 400) && $(window).width() > 1200) {
      $('.slide3-test-phone1').addClass('animate-slide3-test-phone1');
      $('.slide3-test-phone2').addClass('animate-slide3-test-phone2');
      $('.slide3-test-phone3').addClass('animate-slide3-test-phone3');
      $('.slide3-test-phone4').addClass('animate-slide3-test-phone4');
      $('.slide3-test-phone5').addClass('animate-slide3-test-phone5');   
    }
    if (($(window).scrollTop() <= $('.slide-test3').offset().top - 200 || $(window).scrollTop() >= $('.slide-test3').offset().top + $('.slide-test3').height() - 400) && $(window).width() > 1200) {
      $('.slide3-test-phone1').removeClass('animate-slide3-test-phone1');
      $('.slide3-test-phone2').removeClass('animate-slide3-test-phone2');
      $('.slide3-test-phone3').removeClass('animate-slide3-test-phone3');
      $('.slide3-test-phone4').removeClass('animate-slide3-test-phone4');
      $('.slide3-test-phone5').removeClass('animate-slide3-test-phone5');     
    }
  });

  // For tablets
  $(window).scroll(function(){
    if (($(window).scrollTop() >= $('.slide-mobile1').offset().top - 200 || $(window).scrollTop() <= $('.slide-mobile1').offset().top + $('.slide-mobile1').height() - 400) && ($(window).width() <= 1200 && $(window).width() > 620)) {
      $('.slide1-mobile-phone1').addClass('animate1-slide1-mobile-phone1');
      $('.slide1-mobile-phone2').addClass('animate1-slide1-mobile-phone2');
      $('.slide1-mobile-phone3').addClass('animate1-slide1-mobile-phone3');
      $('.slide1-mobile-phone4').addClass('animate1-slide1-mobile-phone4');
      $('.slide1-mobile-phone5').addClass('animate1-slide1-mobile-phone5');
      $('.slide1-mobile-phone6').addClass('animate1-slide1-mobile-phone6');      
    }
    if (($(window).scrollTop() <= $('.slide-mobile1').offset().top - 200 || $(window).scrollTop() >= $('.slide-mobile1').offset().top + $('.slide-mobile1').height() - 400) && ($(window).width() <= 1200 && $(window).width() > 620)) {
      $('.slide1-mobile-phone1').removeClass('animate1-slide1-mobile-phone1');
      $('.slide1-mobile-phone2').removeClass('animate1-slide1-mobile-phone2');
      $('.slide1-mobile-phone3').removeClass('animate1-slide1-mobile-phone3');
      $('.slide1-mobile-phone4').removeClass('animate1-slide1-mobile-phone4');
      $('.slide1-mobile-phone5').removeClass('animate1-slide1-mobile-phone5');
      $('.slide1-mobile-phone6').removeClass('animate1-slide1-mobile-phone6');       
    }

    if (($(window).scrollTop() >= $('.slide-mobile2').offset().top - 200 || $(window).scrollTop() <= $('.slide-mobile2').offset().top + $('.slide-mobile2').height() - 400) && ($(window).width() <= 1200 && $(window).width() > 620)) {
      $('.slide2-mobile-phone').addClass('animate1-slide2-mobile-phone');      
    }
    if (($(window).scrollTop() <= $('.slide-mobile2').offset().top - 200 || $(window).scrollTop() >= $('.slide-mobile2').offset().top + $('.slide-mobile2').height() - 400) && ($(window).width() <= 1200 && $(window).width() > 620)) {
      $('.slide2-mobile-phone').removeClass('animate1-slide2-mobile-phone');   
    }

    if (($(window).scrollTop() >= $('.slide-mobile3').offset().top - 200 || $(window).scrollTop() <= $('.slide-mobile3').offset().top + $('.slide-mobile3').height() - 400) && ($(window).width() <= 1200 && $(window).width() > 620)) {
      $('.slide3-mobile-phone1').addClass('animate1-slide3-mobile-phone1');
      $('.slide3-mobile-phone2').addClass('animate1-slide3-mobile-phone2');
      $('.slide3-mobile-phone3').addClass('animate1-slide3-mobile-phone3');
      $('.slide3-mobile-phone4').addClass('animate1-slide3-mobile-phone4');
      $('.slide3-mobile-phone5').addClass('animate1-slide3-mobile-phone5');   
    }
    if (($(window).scrollTop() <= $('.slide-mobile3').offset().top - 200 || $(window).scrollTop() >= $('.slide-mobile3').offset().top + $('.slide-mobile3').height() - 400) && ($(window).width() <= 1200 && $(window).width() > 620)) {
      $('.slide3-mobile-phone1').removeClass('animate1-slide3-mobile-phone1');
      $('.slide3-mobile-phone2').removeClass('animate1-slide3-mobile-phone2');
      $('.slide3-mobile-phone3').removeClass('animate1-slide3-mobile-phone3');
      $('.slide3-mobile-phone4').removeClass('animate1-slide3-mobile-phone4');
      $('.slide3-mobile-phone5').removeClass('animate1-slide3-mobile-phone5');     
    }
  });

  // For phones
  $(window).scroll(function(){
    if (($(window).scrollTop() >= $('.slide-mobile1').offset().top - 200 || $(window).scrollTop() <= $('.slide-mobile1').offset().top + $('.slide-mobile1').height() - 400) && $(window).width() <= 620) {
      $('.slide1-mobile-phone1').addClass('animate2-slide1-mobile-phone1');
      $('.slide1-mobile-phone2').addClass('animate2-slide1-mobile-phone2');
      $('.slide1-mobile-phone3').addClass('animate2-slide1-mobile-phone3');
      $('.slide1-mobile-phone4').addClass('animate2-slide1-mobile-phone4');
      $('.slide1-mobile-phone5').addClass('animate2-slide1-mobile-phone5');
      $('.slide1-mobile-phone6').addClass('animate2-slide1-mobile-phone6');      
    }
    if ((($(window).scrollTop() <= $('.slide-mobile1').offset().top - 200 || $(window).scrollTop() >= $('.slide-mobile1').offset().top + $('.slide-mobile1').height() - 400) && $(window).width() <= 620) || $(window).width() > 620) {
      $('.slide1-mobile-phone1').removeClass('animate2-slide1-mobile-phone1');
      $('.slide1-mobile-phone2').removeClass('animate2-slide1-mobile-phone2');
      $('.slide1-mobile-phone3').removeClass('animate2-slide1-mobile-phone3');
      $('.slide1-mobile-phone4').removeClass('animate2-slide1-mobile-phone4');
      $('.slide1-mobile-phone5').removeClass('animate2-slide1-mobile-phone5');
      $('.slide1-mobile-phone6').removeClass('animate2-slide1-mobile-phone6');       
    }

    if (($(window).scrollTop() >= $('.slide-mobile2').offset().top - 200 || $(window).scrollTop() <= $('.slide-mobile2').offset().top + $('.slide-mobile2').height() - 400) && $(window).width() <= 620) {
      $('.slide2-mobile-phone').addClass('animate1-slide2-mobile-phone');      
    }
    if ((($(window).scrollTop() <= $('.slide-mobile2').offset().top - 200 || $(window).scrollTop() >= $('.slide-mobile2').offset().top + $('.slide-mobile2').height() - 400) && $(window).width() <= 620)) {
      $('.slide2-mobile-phone').removeClass('animate1-slide2-mobile-phone');   
    }

    if (($(window).scrollTop() >= $('.slide-mobile3').offset().top - 200 || $(window).scrollTop() <= $('.slide-mobile3').offset().top + $('.slide-mobile3').height() - 400) && $(window).width() <= 620) {
      $('.slide3-mobile-phone1').addClass('animate2-slide3-mobile-phone1');
      $('.slide3-mobile-phone2').addClass('animate2-slide3-mobile-phone2');
      $('.slide3-mobile-phone3').addClass('animate2-slide3-mobile-phone3');
      $('.slide3-mobile-phone4').addClass('animate2-slide3-mobile-phone4');
      $('.slide3-mobile-phone5').addClass('animate2-slide3-mobile-phone5');   
    }
    if ((($(window).scrollTop() <= $('.slide-mobile3').offset().top - 200 || $(window).scrollTop() >= $('.slide-mobile3').offset().top + $('.slide-mobile3').height() - 400) && $(window).width() <= 620) || $(window).width() > 620) {
      $('.slide3-mobile-phone1').removeClass('animate2-slide3-mobile-phone1');
      $('.slide3-mobile-phone2').removeClass('animate2-slide3-mobile-phone2');
      $('.slide3-mobile-phone3').removeClass('animate2-slide3-mobile-phone3');
      $('.slide3-mobile-phone4').removeClass('animate2-slide3-mobile-phone4');
      $('.slide3-mobile-phone5').removeClass('animate2-slide3-mobile-phone5');     
    }
  }); 
})()


/* Stats */
particlesJS("particles-js",{particles:{number:{value:120,density:{enable:!0,value_area:500}},color:{value:"#ffffff"},shape:{type:"circle",stroke:{width:0,color:"#000000"},polygon:{nb_sides:5},image:{src:"img/github.svg",width:100,height:100}},opacity:{value:.5,random:!1,anim:{enable:!1,speed:1,opacity_min:.1,sync:!1}},size:{value:5,random:!0,anim:{enable:!1,speed:40,size_min:.1,sync:!1}},line_linked:{enable:!0,distance:150,color:"#ffffff",opacity:.4,width:1},move:{enable:!0,speed:6,direction:"none",random:!1,straight:!1,out_mode:"out",attract:{enable:!1,rotateX:600,rotateY:1200}}},interactivity:{detect_on:"canvas",events:{onhover:{enable:!0,mode:"grab"},onclick:{enable:!0,mode:"repulse"},resize:!0},modes:{grab:{distance:400,line_linked:{opacity:1}},bubble:{distance:400,size:40,duration:2,opacity:8,speed:3},repulse:{distance:200},push:{particles_nb:4},remove:{particles_nb:2}}},retina_detect:!0,config_demo:{hide_card:!1,background_color:"#b61924",background_image:"",background_position:"50% 50%",background_repeat:"no-repeat",background_size:"cover"}});

let servicesSwiper = new Swiper('.services-slider', {
  speed: 600,
  loop: true,
  autoplay: {
    delay: 3000,
    disableOnInteraction: true
  },
  slidesPerView: 'auto',
  pagination: {
    el: '.swiper-pagination',
    type: 'bullets',
    clickable: true
  },
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 20
    },

    1000: {
      slidesPerView: 3,
      spaceBetween: 20
    }
  }
});

let swiper1 = new Swiper(".slide4-test-swiper", {
  loop: true,
  slidesPerView: 3,
  centeredSlides: true,
  spaceBetween: 30,
  speed: 500,
  autoplay: {
    delay: 2000,
  },
  pagination: {
    el: ".swiper-pagination2",
    clickable: true,
  },
});

let swiper2 = new Swiper(".slide4-mobile-swiper", {
  loop: true,
  simulateTouch: false,
  slidesPerView: 3,
  centeredSlides: true,
  spaceBetween: 30,
  speed: 1000,
  autoplay: {
    delay: 2000,
  },
  pagination: {
    el: ".swiper-pagination2",
    clickable: true,
  },
});