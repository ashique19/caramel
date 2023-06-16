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
/******/ 	return __webpack_require__(__webpack_require__.s = 7);
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
/* 2 */
/***/ (function(module, exports) {

$(document).ready(function () {

    // if( $('.datepicker').length > 0 ){ $('.datepicker').datepicker({ 'format': 'yyyy-mm-dd' }) }

    $('.datepicker').Calendar7({
        allowTimeStart: '9:00',
        allowTimeEnd: '20:00'
    });

    $('[data-toggle="popover"]').popover();

    $('.toggle-select').click(function () {

        if ($(this).is(':checked')) {

            $(this).parents('.selectable-checkbox-group').find('.selectable.checkbox').prop('checked', true);
        } else {

            $(this).parents('.selectable-checkbox-group').find('.selectable.checkbox').prop('checked', false);
        }
    });

    $('.selectable.checkbox').click(function () {

        $('.selectable-checkbox-group').each(function (i, v) {

            if ($(v).find('.selectable.checkbox:not(".toggle-select")').length == $(v).find('.selectable.checkbox:checked:not(".toggle-select")').length) {

                $(v).find('.selectable.checkbox.toggle-select').prop('checked', true);
            } else {

                $(v).find('.selectable.checkbox.toggle-select').prop('checked', false);
            }
        });
    });

    $('[data-target="#admin-menu"]').click(function () {

        $('#admin-nav').toggleClass('hidden-xs');
    });

    $('[open-admin-search], [close-admin-search]').click(function (e) {

        e.preventDefault();

        $('#admin-search').toggleClass('is-active');
    });
});

/***/ }),
/* 3 */
/***/ (function(module, exports) {

;(function ($) {
    'use strict';

    function Calendar(options) {
        var that = this;

        this.trigger = options.trigger;
        this.calendarSelector = '#calendar-7';
        this.times = {};

        if (options.allowTimeStart && options.allowTimeEnd) {
            this.times.allowHourStart = parseInt(options.allowTimeStart.split(':')[0], 10);
            this.times.allowHourEnd = parseInt(options.allowTimeEnd.split(':')[0], 10);

            this.times.allowMinuteStart = parseInt(options.allowTimeStart.split(':')[1], 10);
            this.times.allowMinuteEnd = parseInt(options.allowTimeEnd.split(':')[1], 10);
        }

        this.trigger.on('click', function (event) {
            event.stopPropagation();
            if ($(that.calendarSelector).length === 0) {
                that.init();
            }
        });
        $(document).click(function (event) {
            if ($(event.target).parents('#calendar-7').length === 0) {
                $(that.calendarSelector).remove();
            }
        });
    }
    Calendar.prototype.init = function () {
        // 未来七天
        var weeksOfzhTW = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var today = new Date();
        this.year = today.getFullYear();
        this.month = Number(today.getMonth()) + 1;
        this.day = today.getDate();

        var html = '<div id="calendar-7" class="calendar-7">\
                            <div class="days">',
            current_month = "";

        for (var i = 0; i < 120; i++) {
            var classNames = i === 0 ? 'calendar-7-day active' : 'calendar-7-day';
            var month = today.getMonth() + 1;

            if (monthNames[today.getMonth()] != current_month) {

                current_month = monthNames[today.getMonth()];

                html += '<button class="button is-fullwidth yellow-bg margin-bottom-5">' + current_month + '</button>';
            }

            html += '<div class="' + classNames + '" data-year="' + today.getFullYear() + '" data-month="' + month + '" data-day="' + today.getDate() + '">\
                            <span>' + month + '/' + today.getDate() + '</span>\
                            <br/>\
                            <span>' + weeksOfzhTW[today.getDay()] + '</span>\
                        </div>';

            today.setDate(today.getDate() - 1);
        }

        html += '</div>\
                            <div class="hours"></div>\
                            <div class="minutes"></div>\
                        </div>';

        // 渲染日历
        $('body').append(html);
        var positionObj = this.trigger.get(0).getBoundingClientRect();

        // 给日历定位
        if ($(window).width() - positionObj.right < 10) {
            $('#calendar-7').css({
                top: positionObj.top + this.trigger.outerHeight() + 5,
                right: 0
            });
        } else {
            $('#calendar-7').css({
                top: positionObj.top + this.trigger.outerHeight() + 5,
                left: positionObj.left
            });
        }

        this.renderHours();
        this.dateClickHandler();
    };
    Calendar.prototype.getHours = function () {
        var today = new Date();
        var currentHour = today.getHours();
        var currentDay = today.getDate();

        var hours24 = [];
        for (var i = 0; i < 24; i++) {
            if (i > this.times.allowHourEnd || i < this.times.allowHourStart || i < currentHour && this.day === currentDay) {
                hours24.push({
                    disabled: true,
                    hour: i + ':' + '00'
                });
            } else {
                hours24.push({
                    disabled: false,
                    hour: i + ':' + '00'
                });
            }
        }
        return hours24;
    };
    Calendar.prototype.renderHours = function () {
        var hours = this.getHours();
        var html = '';
        for (var i = 0; i < hours.length; i++) {
            if (hours[i].disabled) {
                html += '<span class="calendar-7-hour disabled" data-hour="' + hours[i].hour + '">' + hours[i].hour + '</span>';
            } else {
                html += '<span class="calendar-7-hour" data-hour="' + hours[i].hour + '">' + hours[i].hour + '</span>';
            }
        }
        $(this.calendarSelector).find('.hours').html(html).show().siblings('.minutes').hide();
    };
    Calendar.prototype.dateClickHandler = function () {
        var that = this;

        // 綁定日期的點擊
        $('.calendar-7-day').click(function (event) {
            $('.calendar-7-day').removeClass('active');
            $(this).addClass('active');
            that.year = $(this).data('year');
            that.month = $(this).data('month');
            that.day = $(this).data('day');
            that.renderHours();
        });
        // 绑定小时的点击
        $(document).on('click', '.calendar-7-hour', function () {
            $('.calendar-7-hour').removeClass('active');
            $(this).addClass('active');
            that.hour = parseInt($(this).data('hour').split(':')[0], 10);
            if (!$(this).hasClass('disabled')) {
                that.drawMinutes();
            }
        });
    };
    Calendar.prototype.drawMinutes = function () {
        var html = '';
        var today = new Date();
        var currentDay = today.getDate();
        var currentHour = today.getHours();
        var currentMinute = today.getMinutes();

        for (var i = 0, text = ''; i < 60;) {
            text = i < 10 ? '0' + i : i;
            if (currentHour === this.hour && currentMinute > i && currentDay === this.day || this.hour === this.times.allowHourEnd && this.times.allowMinuteEnd < i || this.hour === this.times.allowHourStart && this.times.allowMinuteStart > i) {
                html += '<span class="calendar-7-minute disabled" data-minute="' + text + '">' + this.hour + ':' + text + '</span>';
            } else {
                html += '<span class="calendar-7-minute" data-minute="' + text + '">' + this.hour + ':' + text + '</span>';
            }
            i += 10;
        }

        $('#calendar-7 .hours').hide();

        $('#calendar-7 .minutes').html(html).show();

        this.minuteClickHandler();
    };
    Calendar.prototype.minuteClickHandler = function () {
        var that = this;

        $('.calendar-7-minute').bind('click', function () {
            that.minute = $(this).data('minute');

            that.month = that.month < 10 ? '0' + that.month : that.month;
            that.day = that.day < 10 ? '0' + that.day : that.day;

            var time = that.year + '-' + that.month + '-' + that.day + ' ' + that.hour + ':' + that.minute + ':00';

            if (!$(this).hasClass('disabled')) {
                that.trigger.val(time);
                $(that.calendarSelector).remove();
            }

            that.destroy();
        });
    };

    Calendar.prototype.destroy = function () {
        $('.calendar-7-minute').unbind();
    };

    $.fn.Calendar7 = function (options) {
        this.each(function (index, el) {
            var settings = {
                trigger: $(this),
                allowTimeStart: '',
                allowTimeEnd: ''
            };
            new Calendar($.extend(true, settings, options));
        });
    };
})(jQuery);

/***/ }),
/* 4 */
/***/ (function(module, exports) {

adminCart = function adminCart() {

    cart = this, this.container = null;

    this.applyOn = function (holder) {

        this.container = holder;

        $(document).on({

            'keyup change': function keyupChange(e) {
                cart.update_quantity(e, $(this).parents('.product'), $(this));
            }

        }, '[name="quantity[]"]');

        $(document).on({

            click: function click(e) {
                cart.increase(e, $(this).parents('.product'));
            }

        }, '.increase');

        $(document).on({

            click: function click(e) {
                cart.decrease(e, $(this).parents('.product'));
            }

        }, '.decrease');

        $(document).on({

            'keyup change': function keyupChange(e) {
                cart.update_price(e, $(this).parents('.product'), $(this));
            }

        }, '[name="price[]"]');

        holder.find('[name=sub_total], [name=charge], [name=discount], [name=total]').on('keyup change', function (e) {
            cart.calculate_total();
        });
    };

    this.increase = function (e, product) {

        e.preventDefault();

        var quantity_input = product.find('[name="quantity[]"]'),
            quantity = parseInt(quantity_input.val()) + 1 || 1,
            price = parseInt(product.find('[name="price[]"]').val()) || 0,
            product_total = quantity * price;

        quantity_input.val(quantity);

        product.find('.product-total').text(product_total);

        this.calculate_total();

        return this;
    };

    this.decrease = function (e, product) {

        e.preventDefault();

        var quantity_input = product.find('[name="quantity[]"]'),
            quantity = (parseInt(quantity_input.val()) || 1) * 1 - 1,
            quantity = quantity < 0 ? 0 : quantity,
            price = parseInt(product.find('[name="price[]"]').val()) || 0,
            product_total = quantity * price;

        quantity_input.val(quantity);

        product.find('.product-total').text(product_total);

        this.calculate_total();

        return this;
    };

    this.update_quantity = function (e, product, quantity_input) {

        var quantity = parseInt(quantity_input.val()) || 0,
            price = parseInt(product.find('[name="price[]"]').val()) || 0,
            product_total = quantity * price;

        quantity_input.val(quantity);

        product.find('.product-total').text(product_total);

        this.calculate_total();

        return this;
    };

    this.update_price = function (e, product, price_input) {

        var price = parseInt(price_input.val()) || 0,
            quantity = parseInt(product.find('[name="quantity[]"]').val()) || 0,
            product_total = quantity * price;

        product.find('.product-total').text(product_total);

        this.calculate_total();

        return this;
    };

    this.calculate_total = function () {

        var subTotal = 0,
            charge = parseInt(this.container.find('[name=charge]').val()) || 0,
            discount = parseInt(this.container.find('[name=discount]').val()) || 0,
            total = 0;

        this.container.find('.product-total').each(function (i, v) {
            subTotal += parseInt($(v).text()) || 0;
        });

        total = subTotal * 1 + charge * 1 - discount * 1;

        this.container.find('[name=sub_total]').val(subTotal);
        this.container.find('[name=charge]').val(charge);
        this.container.find('[name=discount]').val(discount);
        this.container.find('[name=total]').val(total);
    };
};

var c = new adminCart();
c.applyOn($('.admin-cart'));

/***/ }),
/* 5 */,
/* 6 */,
/* 7 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(0);
__webpack_require__(3);
__webpack_require__(4);
__webpack_require__(1);
module.exports = __webpack_require__(2);


/***/ })
/******/ ]);