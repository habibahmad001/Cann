"use strict";
/**
* @requires Blocker
*/
var Carousel = function(opt)
{
	this.$window = $(window);
	this.$carousel = null;
	this.$slides = null;
	this.blocker = new Blocker(0);

	if ( typeof opt === 'object' )
	{
		if ( opt.window )
		{
			this.$window = $(opt.window);
		}
		if ( opt.container )
		{
			this.$carousel = $(opt.container);
		}
		else throw ArgumentError('You need to suply a container element');
		if ( opt.slides )
		{
			this.$slides = this.$carousel.find(opt.slides);
		}
		else throw ArgumentError('You need to suply a slide collection');
		if ( opt.blocker && opt.blocker.blocking )
		{
			this.blocker = opt.blocker;
		}
	}
	else throw TypeError('Wrong option parameter');

	this.init();
};
Carousel.prototype.init = function()
{
	this.setActive(0);
};
Carousel.prototype.next = function()
{
	if ( this.blocker.blocking() )
		return;

	var $next = this.$slides.filter('.active')
		.removeClass('active')
		.next();

	if ( $next.is(this.$slides) )
		$next.addClass('active');
	else
		this.$slides.first()
			.addClass('active');
};
Carousel.prototype.previous = function()
{
	if ( this.blocker.blocking() )
		return;

	var $prev = this.$slides.filter('.active')
		.removeClass('active')
		.prev();

	if ( $prev.is(this.$slides) )
		$prev.addClass('active');
	else
		this.$slides.last()
			.addClass('active');
};
Carousel.prototype.setActive = function(id)
{
	if ( id < 0 || id > this.$slides.length )
		throw RangeError('ID is out of range');

	this.$slides.eq(id)
		.addClass('active')
		.siblings()
			.removeClass('active');
};