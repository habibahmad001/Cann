"use strict";
/**
* @requires Blocker
*/
var Pagination = function(opt)
{
	this.$window = $(window);
	this.$pagination = null;
	this.$dots = null;
	this.count = null;
	this.active = null;

	if ( typeof opt === 'object' )
	{
		if ( opt.window )
		{
			this.$window = $(opt.window);
		}
		if ( opt.container )
		{
			this.$pagination = $(opt.container);
		}
		else throw Error('You need to suply a container element');
		if ( opt.dots )
		{
			this.$dots = this.$pagination.find(opt.dots);
		}
		else throw Error('You need to suply a dots collection');
	}
	else throw TypeError('Wrong option parameter');

	this.init();
};
Pagination.prototype.init = function()
{
	this.count = this.$dots.length;
	this.$window.bind(Blocker.EVENT_UNBLOCK, $.proxy(this.clearInactive_, this));

	this.setActive(0);
};
Pagination.prototype.next = function()
{
	var $next = this.$dots.filter('.active')
		.addClass('inactive right')
		.removeClass('active left')
		.next();

	if ( $next.length )
		$next.addClass('active left'), ++ this.active;
	else
		this.$dots.first().addClass('active left'), this.active = 0;
};
Pagination.prototype.previous = function()
{
	var $prev = this.$dots.filter('.active')
		.addClass('inactive left')
		.removeClass('active right')
		.prev();

	if ( $prev.length )
		$prev.addClass('active right'), -- this.active;
	else
		this.$dots.last().addClass('active right'), this.active = this.count - 1;
};
Pagination.prototype.clearInactive_ = function()
{
	this.$dots.removeClass('inactive left right');
};
Pagination.prototype.setActive = function(id)
{
	if ( id < 0 || id > this.count )
		throw RangeError('ID is out of range');

	if ( id === this.active + 1 )
		return this.next();
	else if ( id === this.active - 1 )
		return this.previous();

	this.active = id;
	
	this.$dots.eq(id)
		.addClass('active')
		.siblings()
			.removeClass('active left right');
};