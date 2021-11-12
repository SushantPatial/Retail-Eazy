
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
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
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
          duration: 2000,
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

  // Implements typing effect
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

  /**
   * Services  slider
   */
   new Swiper('.services-slider', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 5000,
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

  
  let swiper = new Swiper(".swiper-container", {
    direction: "vertical",
    slidesPerView: 1,
    speed: 2000,
    preventInteractionOnTransition: true,
    mousewheel: {
      releaseOnEdges: true,
      sensitivity: 10,
      eventsTarget: '.swiper-container',
    },
    pagination: {
      el: ".swiper-pagination",
      type: "progressbar",
      clickable: true,
    },
    
  });

  let swiper2 = new Swiper(".slide4-swiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    freeMode: true,
    speed: 1000,
    autoplay: {
      delay: 2000,
    },
    pagination: {
      el: ".swiper-pagination2",
      clickable: true,
    },
  });

  $(document).scroll(function() {
    var y = $(this).scrollTop();
    if (y > 3600 && y < 4450) {
      $(".waterfall").addClass("water-fixed");
    } 
    else {
      $(".waterfall").removeClass("water-fixed");
    }

   
  });

  

})()