// import external dependencies
import 'jquery';
import '@fancyapps/fancybox/dist/jquery.fancybox.min.js';
import 'slick-carousel/slick/slick.min';

// Import everything from autoload
import './autoload/**/*'

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,

  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());


var viewportWidth = $(window).width();





// logo on scroll
var header_a = $('.header-a');

if (viewportWidth >= 50) {
  $(window).scroll(function() {
    var scrollX = $(this).scrollTop();

    if (scrollX >= 10) {
      $(header_a).addClass('scroll-head--a');
    } else {
      $(header_a).removeClass('scroll-head--a');
    }
  });
}


// logo on scroll
var header_b = $('.header-b');

if (viewportWidth >= 50) {
  $(window).scroll(function() {
    var scrollX = $(this).scrollTop();

    if (scrollX >= 10) {
      $(header_b).addClass('scroll-head--b');
    } else {
      $(header_b).removeClass('scroll-head--b');
    }
  });
}

// logo on scroll
var header_d = $('.header-d');

if (viewportWidth >= 50) {
  $(window).scroll(function() {
    var scrollX = $(this).scrollTop() - 100;

    if (scrollX >= 10) {
      $(header_d).addClass('scroll-head--d');
    } else {
      $(header_d).removeClass('scroll-head--d');
    }
  });
}



/// Read size of the screen. include margin barrier for activation for both top and bottom
function isScrolledIntoView(elem) {
  var docViewTop = $(window).scrollTop();
  var docViewBottom = docViewTop + $(window).height();

  var elemTop = $(elem).offset().top;
  var elemBottom = elemTop + $(elem).height();

  return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}

// Class holder animations set

$(window).scroll(function () {
  $('.animate-left').each(function () {
    if (isScrolledIntoView(this) === true) {
      $(this).addClass('slide-in-left')
    }
  });
});

$(window).scroll(function () {
  $('.animate-right').each(function () {
    if (isScrolledIntoView(this) === true) {
      $(this).addClass('slide-in-right')
    }
  });
});

$(window).scroll(function () {
  $('.animate-top').each(function () {
    if (isScrolledIntoView(this) === true) {
      $(this).addClass('slide-in-top')
    }
  });
});

$(window).scroll(function () {
  $('.animate-bottom').each(function () {
    if (isScrolledIntoView(this) === true) {
      $(this).addClass('slide-in-bottom')
    }
  });
});



$(window).scroll(function () {

  /// Animations for Header tags

  //// Left
  window.setTimeout(function(){
    $('.animate-h-left h1,.animate-h-left h2,.animate-h-left h3,.animate-h-left h4,.animate-h-left h5,.animate-h-left h6').each(function () {
      if (isScrolledIntoView(this) === true) {
        $(this).addClass('slide-in-left');
      }
    });
  }, 500);

  //// Right
  window.setTimeout(function(){
    $('.animate-h-right h1,.animate-h-right h2,.animate-h-right h3,.animate-h-right h4,.animate-h-right h5,.animate-h-right h6').each(function () {
      if (isScrolledIntoView(this) === true) {
        $(this).addClass('slide-in-right');
      }
    });
  }, 500);

  //// Top
  window.setTimeout(function(){
    $('.animate-h-top h1,.animate-h-top h2,.animate-h-top h3,.animate-h-top h4,.animate-h-top h5,.animate-h-top h6').each(function () {
      if (isScrolledIntoView(this) === true) {
        $(this).addClass('slide-in-top');
      }
    });
  }, 500);

  //// Top
  window.setTimeout(function(){
    $('.animate-h-bottom h1,.animate-h-bottom h2,.animate-h-bottom h3,.animate-h-bottom h4,.animate-h-bottom h5,.animate-h-bottom h6').each(function () {
      if (isScrolledIntoView(this) === true) {
        $(this).addClass('slide-in-bottom');
      }
    });
  }, 500);



  /// Animations for Paragraph tags

  //// Left
  window.setTimeout(function(){
    $('.animate-p-left p,.animate-p-left p,.animate-p-left p,.animate-p-left p,.animate-p-left p,.animate-p-left p').each(function () {
      if (isScrolledIntoView(this) === true) {
        $(this).addClass('slide-in-left');
      }
    });
  }, 500);

  //// Right
  window.setTimeout(function(){
    $('.animate-p-right p,.animate-p-right p,.animate-p-right p,.animate-p-right p,.animate-p-right p,.animate-p-right p').each(function () {
      if (isScrolledIntoView(this) === true) {
        $(this).addClass('slide-in-right');
      }
    });
  }, 500);

  //// Top
  window.setTimeout(function(){
    $('.animate-p-top p,.animate-p-top p,.animate-p-top p,.animate-p-top p,.animate-p-top p,.animate-p-top p').each(function () {
      if (isScrolledIntoView(this) === true) {
        $(this).addClass('slide-in-top');
      }
    });
  }, 500);

  //// Top
  window.setTimeout(function(){
    $('.animate-p-bottom p,.animate-p-bottom p,.animate-p-bottom p,.animate-p-bottom p,.animate-p-bottom p,.animate-p-bottom p').each(function () {
      if (isScrolledIntoView(this) === true) {
        $(this).addClass('slide-in-bottom');
      }
    });
  }, 500);
});
