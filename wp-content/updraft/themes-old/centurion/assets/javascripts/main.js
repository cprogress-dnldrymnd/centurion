jQuery(document).ready(function ($) {
	swiper_slider();
	mobile_menu();
	sticky_cta();
	sticky_header();
});

function sticky_cta() {
	var $footer_cta = jQuery('.footer-cta');
	if ($footer_cta.length > 0) {
		if (window.innerWidth > 991) {
			$footer_cta.find('.column-holder').addClass('aos-animate');
		}

		jQuery(window).scroll(function () {
			var $scrollTop = jQuery(window).scrollTop();

			$offset_top = $footer_cta.position().top;
			$footer_cta_height = $footer_cta.outerHeight(true);
			$screen_height = jQuery(window).height();
			var $top_margin = 0;

			if (jQuery('.admin-bar').length > 0) {
				if (window.innerWidth > 991) {
					$top_margin = 32;
				}
			}

			$bottom_position = $offset_top - $screen_height + $footer_cta_height + $top_margin;

			if ($scrollTop >= 800) {
				jQuery('.sticky-cta').addClass('show-sticky-cta');
			} else {
				jQuery('.sticky-cta').removeClass('show-sticky-cta');
			}

			if ($scrollTop > $bottom_position) {
				jQuery('.sticky-cta').hide();
			} else {
				jQuery('.sticky-cta').show();
			}

		});
	}
}
function mobile_menu() {
	jQuery('.navbar-toggler').click(function (event) {
		jQuery('html').toggleClass('menu-active');
	});
    
    if(window.innerWidth < 992) {
    	jQuery('section.header-navigation .navbar .navbar-collapse ul.navbar-nav li.menu-item:not(.button-box) a.nav-link:not(.dropdown-toggle)').click(function (event) {
    		jQuery('.navbar-toggler').click();
    
    	});
    }
}

function sticky_header() {

	var stickyNavTopElement = jQuery('.header-navigation + .header-bottom .header-bottom-holder');


	var stickyNavTop = stickyNavTopElement.offset().top;

	var stickyNav = function () {
		if (jQuery('body').hasClass('admin-bar')) {
			var scrollTop = jQuery(window).scrollTop() + 32;
		} else {
			var scrollTop = jQuery(window).scrollTop();
		}

		if (scrollTop > stickyNavTop) {
			stickyNavTopElement.addClass('sticky');
		} else {
			stickyNavTopElement.removeClass('sticky');
		}
	};

	stickyNav();

	jQuery(window).scroll(function () {
		stickyNav();
	});

}
function swiper_slider() {
	var logoSwiper = new Swiper(".mySwiper-logoSwiper", {
		loop: true,
		autoplay: {
			delay: 5000,
			disableOnInteraction: true,
		},
		breakpoints: {
			0: {
				slidesPerView: 2,
			},
			768: {
				slidesPerView: 3,
			},
			1200: {
				slidesPerView: 4,
			},
			1400: {
				slidesPerView: 5,
			},
		},

	});

	var testimonialSwiper = new Swiper(".mySwiper-Testimonial", {
		loop: true,
		spaceBetween: 30,
		autoHeight: true,
		autoplay: {
			delay: 5000,
			disableOnInteraction: true,
		},
		breakpoints: {
			0: {
				slidesPerView: 1,
			},
			576: {
				slidesPerView: 2,
			},
			992: {
				slidesPerView: 3,
			},
		},
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
	});

	var logoSwiperFooter = new Swiper(".mySwiper-logoSwiperFooter", {
		loop: true,
		autoplay: {
			delay: 5000,
			disableOnInteraction: true,
		},
		slidesPerView: 1

	});

}

document.addEventListener("DOMContentLoaded", function () {
	if (window.innerWidth > 991) {

		document.querySelectorAll('.navbar .nav-item').forEach(function (everyitem) {

			everyitem.addEventListener('mouseover', function (e) {

				let el_link = this.querySelector('a[data-bs-toggle]');

				if (el_link != null) {
					let nextEl = el_link.nextElementSibling;
					el_link.classList.add('show');
					nextEl.classList.add('show');
				}

			});
			everyitem.addEventListener('mouseleave', function (e) {
				let el_link = this.querySelector('a[data-bs-toggle]');

				if (el_link != null) {
					let nextEl = el_link.nextElementSibling;
					el_link.classList.remove('show');
					nextEl.classList.remove('show');
				}


			})
		});

	}
}); 