AOS.init();

$('#team-carousel').carousel({
  pause: true,
  interval: 4000
})


$(".apply-btn").on("click", function() {
  $(".job-tab-button").removeClass("active");
  $("#jobs").removeClass("show");
  $("#jobs").removeClass("active");
  
  $(".apply-tab-button").addClass("active");
  $("#apply").addClass("show");
  $("#apply").addClass("active");
})


$(document).on("submit", "#application-form", function(e) {
  if (!$("#app_post").val()) {
    alert("Please select post");
    e.preventDefault();
    return  false;
  }
  if (!$("#attach").val()) {
    alert("Please attach resume");
    e.preventDefault();
    return  false;
  }
});


function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
    $('.image-upload-wrap').addClass('image-dropping');
  });
  $('.image-upload-wrap').bind('dragleave', function () {
    $('.image-upload-wrap').removeClass('image-dropping');
});

/* Life @ Eazy */
$(document).ready(function() {
  let $grid = $('.portfolio-container').imagesLoaded( function() {
    $grid.isotope({
      itemSelector : '.portfolio-item', 
      filter: '.filter-awards',
      layoutMode : 'masonry',
      percentPosition: true
    });
  });
    
  $('#portfolio-flters').on('click', 'li', function() {
    var filterValue = $(this).attr('data-filter');
    $grid.isotope({ filter: filterValue });
    $('#portfolio-flters li').removeClass('filter-active');
    $(this).addClass('filter-active');
  });
})

/** Initiate portfolio lightbox **/
const portfolioLightbox1 = GLightbox({
  selector: '.year-20-21-lightbox'
});
const portfolioLightbox2 = GLightbox({
  selector: '.year-18-19-lightbox'
});
const portfolioLightbox3 = GLightbox({
  selector: '.year-17-18-lightbox'
});
const portfolioLightbox4 = GLightbox({
  selector: '.hanuwantiya-lightbox'
});
const portfolioLightbox5 = GLightbox({
  selector: '.fortune-orange-lightbox'
});
const portfolioLightbox6 = GLightbox({
  selector: '.golden-tulip-lightbox'
});
const portfolioLightbox7 = GLightbox({
  selector: '.rishikesh-lightbox'
});
const portfolioLightbox8 = GLightbox({
  selector: '.diwali-lightbox'
});
const portfolioLightbox9 = GLightbox({
  selector: '.holi-lightbox'
});
const portfolioLightbox10 = GLightbox({
  selector: '.christmas-lightbox'
});
const portfolioLightbox11 = GLightbox({
  selector: '.training-lightbox'
});

$(window).on('load', function() {
  $('.portfolio-container').isotope('reloadItems').isotope();
})

$('.toggler').on('click', function() {
  let masonryWrapper = $(this).attr('id').replace('-toggler', '');
  setTimeout(function() {
    $("#" + masonryWrapper + " .masonry-wrapper").css({
      'opacity': '1',
      'transform': 'scale(1)'
    });
  }, 100)
})

$('#year-20-21-toggler').on('click', function() {
  $('#year-20-21').show();
})
$('#year-18-19-toggler').on('click', function() {
  $('#year-18-19').show();
})
$('#year-17-18-toggler').on('click', function() {
  $('#year-17-18').show();
})

$('#diwali-toggler').on('click', function() {
  $('#diwali').show();
})
$('#holi-toggler').on('click', function() {
  $('#holi').show();
})
$('#christmas-toggler').on('click', function() {
  $('#christmas').show();
})

$('#hanuwantiya-toggler').on('click', function() {
  $('#hanuwantiya').show();
})
$('#fortune-orange-toggler').on('click', function() {
  $('#fortune-orange').show();
})
$('#rishikesh-toggler').on('click', function() {
  $('#rishikesh').show();
})
$('#golden-tulip-toggler').on('click', function() {
  $('#golden-tulip').show();
})

$('#training-toggler').on('click', function() {
  $('#training').show();
})

$('.masonry').click(function(e) {
  if ($(e.target).closest(".masonry-wrapper").length > 0 ) {
    
  } else {
    $('.masonry').hide();
    $(".masonry-wrapper").css({
      'opacity': '0',
      'transform': 'scale(0.5)'
    });
  }
});

$(window).on('click', function() {
  if ($('#year-20-21').css('display') == 'block' || $('#year-18-19').css('display') == 'block' || $('#year-17-18').css('display') == 'block' || $('#diwali').css('display') == 'block' || $('#holi').css('display') == 'block' || $('#christmas').css('display') == 'block' || $('#hanuwantiya').css('display') == 'block' || $('#fortune-orange').css('display') == 'block' || $('#rishikesh').css('display') == 'block' || $('#golden-tulip').css('display') == 'block' || $('#training').css('display') == 'block') {
    $('html').css('overflow-y', 'hidden');
  } else {
    $('html').css('overflow-y', 'scroll');
  }
})

$('.masonry .close-album').on('click', function() {
  $('.masonry').hide();
  $(".masonry-wrapper").css({
    'opacity': '0',
    'transform': 'scale(0.5)'
  });
})
