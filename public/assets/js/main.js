'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

(function ($) {
"use strict";

	

	/**
   * [isMobile description]
   * @type {Object}
   */
	window.isMobile = {
		Android: function Android() {
			return navigator.userAgent.match(/Android/i);
		},
		BlackBerry: function BlackBerry() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
		iOS: function iOS() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
		Opera: function Opera() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
		Windows: function Windows() {
			return navigator.userAgent.match(/IEMobile/i);
		},
		any: function any() {
			return isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows();
		}
	};
	window.isIE = /(MSIE|Trident\/|Edge\/)/i.test(navigator.userAgent);
	window.windowHeight = window.innerHeight;
	window.windowWidth = window.innerWidth;

	/**
   * Match height 
   */
	$('.row-eq-height > [class*="col-"]').matchHeight();

	var myEfficientFn = debounce(function () {
		$('.row-eq-height > [class*="col-"]').matchHeight();
	}, 250);

	window.addEventListener('resize', myEfficientFn);

	// Wow js
	var wow = new WOW({
		boxClass: 'wow',
		animateClass: 'animated',
		offset: 100,
		mobile: false,
		live: false
	});
	$(window).on('load', function () {
		wow.init();
	});

	$.fn.numberTextLine = function (opts) {
		$(this).each(function () {
			var el = $(this),
				    defaults = {
				numberLine: 0
			},
				    data = el.data(),
				    dataTemp = $.extend(defaults, opts),
				    options = $.extend(dataTemp, data);

			if (!options.numberLine) return false;

			el.bind('customResize', function (event) {
				event.stopPropagation();
				reInit();
			}).trigger('customResize');
			$(window).resize(function () {
				el.trigger('customResize');
			});
			function reInit() {
				var fontSize = parseInt(el.css('font-size')),
					    lineHeight = parseInt(el.css('line-height')),
					    overflow = fontSize * (lineHeight / fontSize) * options.numberLine;

				el.css({
					'display': 'block',
					'max-height': overflow,
					'overflow': 'hidden'
				});
			}
		});
	};
	$('[data-number-line]').numberTextLine();

	$('[data-gradient-bg]').each(function (index, el) {
		var _self = $(this),
			    _img = '',
			    _opacity = _self.data('gradient-opacity') ? _self.data('gradient-opacity') : '1,1',
			    _direction = _self.data('gradient-direction') ? _self.data('gradient-direction') : 'diagonal',
			    _gradient = _self.data('gradient-bg').replace(/'/g, '"');
		_gradient = JSON.parse("[" + _gradient + "]");
		_opacity = _opacity.split(',');
		if (_self.data('gradient-img')) {
			_img = ' class="md-bg-cover" style="background-image: url(\'' + _self.data('gradient-img') + '\')"';
		}

		_self.prepend('<canvas id="gradient-' + index + '"' + _img + '></canvas>');
		var granimInstance = new Granim({
			element: '#gradient-' + index,
			direction: _direction,
			opacity: _opacity,
			isPausedWhenNotInView: true,
			states: {
				"default-state": {
					gradients: _gradient
				}
			}
		});
	});

	/**
   * [debounce description]
   * @param  {[type]} func      [description]
   * @param  {[type]} wait      [description]
   * @param  {[type]} immediate [description]
   * @return {[type]}           [description]
   */
	function debounce(func, wait, immediate) {
		var timeout;
		return function () {
			var context = this,
				    args = arguments;
			var later = function later() {
				timeout = null;
				if (!immediate) func.apply(context, args);
			};
			var callNow = immediate && !timeout;
			clearTimeout(timeout);
			timeout = setTimeout(later, wait);
			if (callNow) func.apply(context, args);
		};
	}

	/**
   * Accordions
   */
	$('.ac-accordion').each(function () {
		var self = $(this),
			    optData = eval('(' + self.attr('data-options') + ')'),
			    optDefault = {
			active: false,
			collapsible: true,
			activeEvent: 'click',
			duration: 200,
			onOffIcon: {
				enable: true,
				expandIcon: "fa fa-minus",
				collapseIcon: "fa fa-plus",
				position: "right"
			}
		},
			    options = $.extend(optDefault, optData);
		self.aweAccordion(options);
	});

	$('.menu-mobile .menu-item-has-children .toggle-submenu').on('click', function () {
		$(this).parent('li').toggleClass('active');
		$(this).next().slideToggle();
	});

	$('.menu-mobile__close').on('click', function () {
		$('.menu-mobile').removeClass('menu-active');
		$('body').removeClass('body-fix-scroll');
	});
	/**
  * Popup
  */
	$('[data-init="magnificPopup"]').each(function (index, el) {
		var $el = $(this);

		var magnificPopupDefault = {
			removalDelay: 500, //delay removal by X to allow out-animation
			closeOnContentClick: false,
			closeBtnInside: true,
			closeOnBgClick: false,
			callbacks: {
				beforeOpen: function beforeOpen() {
					this.st.mainClass = this.st.el.attr('data-effect');
				}
			},
			midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.


			// Merge settings.
		};var settings = $.extend(true, magnificPopupDefault, $el.data('options'));

		$el.magnificPopup(settings);
	});
	/**
   * Swiper
   */
	$('.swiper__module').each(function () {
		var self = $(this),
			    wrapper = $('.swiper-wrapper', self),
			    optData = eval('(' + self.attr('data-options') + ')'),
			    optDefault = {
			pagination: {
				el: self.find('.swiper-pagination-custom'),
				clickable: true
			},
			navigation: {
				nextEl: self.find('.swiper-button-next-custom'),
				prevEl: self.find('.swiper-button-prev-custom')
			},
			spaceBetween: 30
		},
			    options = $.extend(optDefault, optData);
		wrapper.children().wrap('<div class="swiper-slide"></div>');
		var swiper = new Swiper(self, options);

		function thumbnails(selector) {

			if (selector.length > 0) {
				var wrapperThumbs = selector.children('.swiper-wrapper'),
					    optDataThumbs = eval('(' + selector.attr('data-options') + ')'),
					    optDefaultThumbs = {
					spaceBetween: 10,
					centeredSlides: true,
					slidesPerView: 3,
					touchRatio: 0.3,
					slideToClickedSlide: true,
					pagination: {
						el: selector.find('.swiper-pagination-custom')
					},
					navigation: {
						nextEl: selector.find('.swiper-button-next-custom'),
						prevEl: selector.find('.swiper-button-prev-custom')
					}
				},
					    optionsThumbs = $.extend(optDefaultThumbs, optDataThumbs);
				wrapperThumbs.children().wrap('<div class="swiper-slide"></div>');
				var swiperThumbs = new Swiper(selector, optionsThumbs);
				swiper.controller.control = swiperThumbs;
				swiperThumbs.controller.control = swiper;
			}
		}
		thumbnails(self.next('.swiper-thumbnails__module'));
	});

	var tablePricing = function () {
		function tablePricing() {
			_classCallCheck(this, tablePricing);

			this.css = { "module": ".table-pricing", "table": ".table-pricing__table", "mobile": ".table-pricing__mobile", "": "" };
			this.apply();
		}

		_createClass(tablePricing, [{
			key: 'apply',
			value: function apply() {
				var css = this.css;

				this.toogleContent(css);
			}
		}, {
			key: 'toogleContent',
			value: function toogleContent(css) {
				var click = $('.mobile-table-toogle-content');

				click.on('click', function () {
					var self = $(this);

					self.toggleClass('active');;
					self.closest('.table-mobile-item').find('.mobile-table-content').slideToggle();
				});
			}
		}]);

		return tablePricing;
	}();

	new tablePricing();

	function dropdowMenu() {
		$('.page-nav').dropdownMenu({
			menuClass: 'page-menu',
			breakpoint: 1200,
			toggleClass: 'active',
			classButtonToggle: 'navbar-toggle',
			subMenu: {
				class: 'sub-menu',
				parentClass: 'menu-item-has-children',
				toggleClass: 'active'
			}
		});
	};
	dropdowMenu();

	var header = function () {
		function header() {
			_classCallCheck(this, header);

			this.css = { "module": ".header", "process": ".header__process", "inner": ".header__inner", "fixheader": ".header__fixheader", "transparent": ".header__transparent", "logo": ".header__logo", "btn": ".header__btn", "flexspace": ".header__flexspace", "register": ".header__register", "": "" };
			this.apply();
		}

		_createClass(header, [{
			key: 'apply',
			value: function apply() {
				var css = this.css;

				this.handleFix(css);
			}
		}, {
			key: 'handleFix',
			value: function handleFix(css) {
				var header = $(css.module);
				var fixheader = css.fixheader.replace(/^\./g, '');
				var processh = $(css.process);

				var appendFix = debounce(function () {
					if (header.length) {
						var hHeader = Math.round(header.outerHeight());
						var headerFix = '<div class="fixheight-header"></div>';

						if (header.hasClass(fixheader)) {
							if ($('.fixheight-header').length === 0) header.closest('.page-wrap').prepend(headerFix);
							$('.fixheight-header').css('height', hHeader + 'px');
						}
					}
				}, 600);
				appendFix();

				$('.navbar-toggle').on('click', function () {
					$('.menu-mobile').toggleClass('menu-active');
					$(this).toggleClass('navbar-toggle-active');
				});

				var processPage = function processPage() {

					var wh = parseInt($('body').height() - $(window).height()),
						    scrollTop = $(window).scrollTop();

					var total = parseInt(scrollTop / wh * 100);
					processh.css({
						'width': total + '%'
					});
				};
				processPage();
				$(window).on('scroll', processPage);

				var headroom = new Headroom(document.querySelector('.header'), {
					tolerance: 5,
					offset: 200,
					classes: {
						pinned: "header-pin",
						unpinned: "header-unpin"
					},
					onPin: function onPin() {},
					onUnpin: function onUnpin() {
						setTimeout(function () {
							$('.header').addClass('bg-gradient');
						}, 600);

						$('.menu-mobile').removeClass('menu-active');
						$('.navbar-toggle').removeClass('navbar-toggle-active');
					},

					onTop: function onTop() {
						$('.header').removeClass('header-pin');
						setTimeout(function () {
							$('.header').removeClass('bg-gradient');
						}, 500);
					},

					onNotTop: function onNotTop() {
						$('.header').addClass('header-unpin');
						$('.header').addClass('bg-gradient');
					}
				});

				headroom.init();
			}
		}]);

		return header;
	}();

	new header();

	var listFunctionScroll = debounce(function () {
		var headerH = $('.header').height();

		// One page
		$('.list-function__list').onePageNav({
			currentClass: 'current',
			changeHash: false,
			scrollOffset: headerH
		});
	}, 600);
	listFunctionScroll();

	// Enllax
	$(window).enllax();

	$('#xemthemtinhnang').on('click', function (e) {
		e.preventDefault();
		$.scrollTo($(this), 800);
		$('#themtinhnang').addClass('hientinhnang');
	});

	var hash = window.location.hash;
	$(hash).trigger('click');
	
})(jQuery);