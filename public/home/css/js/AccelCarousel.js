"use strict";
/**
* GPU accelerated carousel with touch support
*
* +---carousel------+
* | +---wrapper----- |--->
* | | +-slide-+ +-slide-+
* | | |              |  |            | |
* | | +------+ +------+
* | +--------------- |--->
* +----------------+
*
* Carousel is the main element.
* Wrapper is moved so that the active slide is in the visible area of carousel
* @param {Object} opt Option parameters
* @constructor
*/
var AccelCarousel = function(opt)
{
	this.$container = null;
	this.$wrapper = null;
	this.$slides = null;
	this.activePosition = 0;
	this.slideWidth = null;
	this.slideCount = null;
	// TODO: extra class MouseSwipeCarousel
	// TODO: extra class TouchCarousel
	this.touchEnabled = 'ontouchstart' in window;

	if ( typeof opt === 'object' )
	{
		if ( opt.container )
		{
			this.$container = $(opt.container);
		}
		else throw ArgumentError('You need to suply a container element');

		if ( opt.wrapper )
		{
			this.$wrapper = this.$container.find(opt.wrapper);
		}
		else
		{
			this.$wrapper = this.$container.find('.wrapper');
		}
		// TODO: check for valid wrapper elem

		if ( opt.slides )
		{
			this.$slides = this.$wrapper.find(opt.slides);
		}
		else
		{
			this.$slides = this.$wrapper.find('.slide');
		}
		// TODO: check for valid slides

		if ( typeof opt.touch === 'boolean' )
		{
			this.touchEnabled = opt.touch;
		}

	}
	else throw TypeError('Wrong option parameter');

	this.init();
};
AccelCarousel.prototype.init = function()
{
	this.slideWidth = this.$slides.outerWidth(true);
	this.slideCount = this.$slides.size();
	// Set width to accommodate children elements (slides)
	this.$wrapper.width(this.slideWidth * this.$slides.size());

	// Animate slides
	//this.$wrapper.css('-webkit-transition', '-webkit-transform 1s linear');
	
	this.setPosition(0);
};
// TODO: 
AccelCarousel.prototype.setPosition = function(position)
{
	// Becomes really active after the transition
	this.activePosition = position;
	if ( Modernizr.ie )
		this.$wrapper.css('-ms-transform', 'translate(' + (- position * this.slideWidth) + 'px, 0px)');
	else
		this.$wrapper.css(Modernizr.prefixed('transform'), 'translate3d(' + (- position * this.slideWidth) + 'px, 0px, 0px)');
	this.$slides
		.removeClass('active')
		.eq(position)
			.addClass('active');
	return true;
};
AccelCarousel.prototype.next = function()
{
	if ( this.activePosition + 1 >= this.slideCount )
		return false;
	this.setPosition(++ this.activePosition);
	return true;
};
AccelCarousel.prototype.previous = function()
{
	if ( this.activePosition < 1 )
		return false;
	this.setPosition(-- this.activePosition);
	return true;
};

/**
* See pitch pagination
* @constructor
*/
// var Pagination = function()
// {};
