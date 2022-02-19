
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

  /* Header scrolled and Back to top button */
  $(window).on('scroll', function() {
    if ($(window).scrollTop() > 200) {
      $("#header").addClass("header-scrolled");
      $(".back-to-top").addClass("active");
      $(".book-demo-btn").addClass("active");
    } else {
      $("#header").removeClass("header-scrolled");
      $(".back-to-top").removeClass("active");
      $(".book-demo-btn").removeClass("active");
    }
  })
  $(window).on('load', function() {
    if ($(window).scrollTop() > 200) {
      $("#header").addClass("header-scrolled");
      $(".back-to-top").addClass("active");
      $(".book-demo-btn").addClass("active");
    } else {
      $("#header").removeClass("header-scrolled");
      $(".back-to-top").removeClass("active");
      $(".book-demo-btn").removeClass("active");
    }
  })

  /* Mobile nav toggle */
  $('.mobile-nav-toggle').on('click', function() {
    $("#navbar").toggleClass('navbar-mobile');
    $(this).toggleClass('bi-list');
    $(this).toggleClass('bi-x');
  })

  
  /* Scroll with offset on links with a class name .scrollto */
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
  
  /* Animation on scroll */
  $(window).on('load', function() {
    AOS.init({
      duration: 1000,
      easing: 'ease-in-out',
      once: true,
      mirror: true
    })

    $('#year').html(new Date().getFullYear());
  })

