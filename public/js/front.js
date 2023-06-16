/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 8);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports) {

(function ($) {

    $.fn.balanceHeight = function () {

        var max = 0;

        this.each(function (i, v) {
            max = $(v).height() > max ? $(v).height() : max;
        });

        $(this).height(max);

        return this;
    };

    $.fn.productSearch = function () {

        $(document).on({
            click: function click(e) {
                if ($(e.target).parents('.search-bar').length == 0) {
                    $('.searched-items .card-content').addClass('is-hidden');
                } else {
                    $('.searched-items .card-content').removeClass('is-hidden');
                }
            }
        });

        $(document).on({

            keyup: function keyup() {

                var url = $(this).data('url') + '?q=' + $(this).val();

                $('.searched-items .card-content').text('loading..');

                if (window.productSearchInProgress) {

                    window.productSearchInProgress.abort();
                }

                window.productSearchInProgress = $.ajax({
                    method: 'GET',
                    url: url,
                    dataType: 'json',
                    success: function success(data) {

                        $('.searched-items .card-content').empty();

                        if (data.length > 0) {

                            data.forEach(function (v) {
                                $('.searched-items .card-content').append('\n\n                                <a class="media black-text" href="' + v.url + '">\n                                    <div class="media-left margin-right-5">\n                                        <figure class="image is-48x48">\n                                        <img src="' + v.img + '" alt="Thumb">\n                                    </figure>\n                                    </div>\n                                    <div class="media-content">\n                                        <p class="font-size-14 font-weight-700">' + v.name + '</p>\n                                        <p class="font-size-11">Price: ' + v.price + ' tk</p>\n                                    </div>\n                                </a>\n\n                                ');
                            });
                        } else {

                            $('.searched-items .card-content').empty();
                        }
                    }
                });
            }

        }, '.product-search-value');
    };
})(jQuery);

/***/ }),
/* 1 */
/***/ (function(module, exports) {

var imagesPreview = function imagesPreview(input, placeToInsertImagePreview) {

  placeToInsertImagePreview.empty();

  if (input.files) {
    var filesAmount = input.files.length;

    for (i = 0; i < filesAmount; i++) {
      var reader = new FileReader();

      reader.onload = function (event) {
        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
      };

      reader.readAsDataURL(input.files[i]);
    }
  }
};

var copyToClipboard = function copyToClipboard(str) {
  var el = document.createElement('textarea'); // Create a <textarea> element
  el.value = str; // Set its value to the string that you want copied
  el.setAttribute('readonly', ''); // Make it readonly to be tamper-proof
  el.style.position = 'absolute';
  el.style.left = '-9999px'; // Move outside the screen to make it invisible
  document.body.appendChild(el); // Append the <textarea> element to the HTML document
  var selected = document.getSelection().rangeCount > 0 // Check if there is any content selected previously
  ? document.getSelection().getRangeAt(0) // Store selection if found
  : false; // Mark as false to know no selection existed before
  el.select(); // Select the <textarea> content
  document.execCommand('copy'); // Copy - only works as a result of a user action (e.g. click events)
  document.body.removeChild(el); // Remove the <textarea> element
  if (selected) {
    // If a selection existed before copying
    document.getSelection().removeAllRanges(); // Unselect everything on the HTML document
    document.getSelection().addRange(selected); // Restore the original selection
  }
};

function lazyLoad() {

  var lazy = [];

  $('[data-lazy]').each(function (i, v) {

    lazy[i] = new Image();
    lazy[i].src = $(v).data('lazy');
  });

  $('[data-lazy]').each(function (i, v) {

    if ($(window).scrollTop() + $(window).height() + 200 > $(v).offset().top) {

      $(v).attr('src', $(v).data('lazy')).removeAttr('data-lazy');
    }
  });

  $(document).scroll(function () {

    $('[data-lazy]').each(function (i, v) {

      if ($(window).scrollTop() + $(window).height() + 200 > $(v).offset().top) {

        $(v).attr('src', $(v).data('lazy')).removeAttr('data-lazy');
      }
    });
  });
}

$(document).ready(function () {

  setTimeout(function (_) {
    lazyLoad();
  }, 500);

  $('[data-toggle="tooltip"]').tooltip();

  $('[data-toggle="popover"]').popover();

  $(document).productSearch();

  $(document).on({ click: function click() {
      copyToClipboard($(this).text());
    } }, '.copy');

  if ($('.slick').length > 0) {
    $('.slick').slick();
  }

  $(document).on({ change: function change() {
      imagesPreview(this, $(this).parents('.image-upload').find('.preview'));
    } }, '.file.image-file');

  $('.topbar-toggler').click(function (e) {

    e.preventDefault();

    $($(this).data('target')).toggleClass('is-active');
  });

  $('.category-sidebar > .next').click(function (e) {

    e.preventDefault();

    $('.category-sidebar > nav').scrollLeft($('.category-sidebar > nav').scrollLeft() + 100);
  });

  $('.category-sidebar > .prev').click(function (e) {

    e.preventDefault();

    $('.category-sidebar > nav').scrollLeft($('.category-sidebar > nav').scrollLeft() - 100);
  });

  $(document).on({

    click: function click(e) {

      e.preventDefault();

      var source = $(this).data('edit-product');

      var editor = new Promise(function (resolve, reject) {

        if ($(document).find("#product-edit-modal").length == 0) {

          $('body').append('\n                <div class="modal is-active padding-top-70">\n                    <div class="modal-background"></div>\n                    <div class="modal-content">\n                        <section id="product-edit-modal" class="columns is-multiline padding-20">\n                            <span class="button is-loading margin-50 border-width-0"></span>\n                        </section>\n                    </div>\n                    <button class="modal-close is-large product-modal margin-top-60" aria-label="close"></button>\n                </div>\n                ');
        } else {

          $(document).find("#product-edit-modal").html('\n                <section id="product-edit-modal">\n                    <span class="button is-loading margin-50 border-width-0"></span>\n                </section>\n                ').parents('.modal').addClass('is-active');
        }

        console.log('before');
        resolve();
      });

      editor.then(function (_) {
        console.log('after');
        console.log(source);
        $(document).find("#product-edit-modal").load(source);
      });
    }

  }, '[data-edit-product]');

  $(document).on({
    click: function click(e) {

      e.preventDefault();

      $('#product-edit-modal').empty();

      $(this).parents('.modal').removeClass('is-active');
    }
  }, '.modal-close.product-modal');
});

// $(window).load(function(){

//   lazyLoad();

// })

/***/ }),
/* 2 */,
/* 3 */,
/* 4 */,
/* 5 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 6 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 7 */,
/* 8 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(0);
__webpack_require__(1);
__webpack_require__(5);
module.exports = __webpack_require__(6);


/***/ })
/******/ ]);