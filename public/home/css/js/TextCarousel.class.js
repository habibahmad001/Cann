// "use strict";
var TextCarousel = function(opt)
{
	base(this, opt);

	this.$texts = null;

	if ( typeof opt === 'object' )
	{
		if ( opt.texts )
		{
			this.$texts = this.$carousel.find(opt.texts);
		}
		else throw ArgumentError('You need to suply a text collection');
	}

	this.setActive(0);
};
inherits(TextCarousel, Carousel);

// TextCarousel.prototype.init = function()
// {
// 	base(this, 'init');
// };

TextCarousel.prototype.next = function()
{
	base(this, 'next');

	if ( this.blocker.blocking() )
		return;

	var $next = this.$texts.filter('.active')
		.removeClass('active')
		.next();

	if ( $next.is(this.$texts) )
		$next.addClass('active');
	else
		this.$texts.first()
			.addClass('active');

};

TextCarousel.prototype.previous = function()
{
	base(this, 'previous');

	if ( this.blocker.blocking() )
		return;

	var $prev = this.$texts.filter('.active')
		.removeClass('active')
		.prev();

	if ( $prev.is(this.$texts) )
		$prev.addClass('active');
	else
		this.$texts.last()
			.addClass('active');
};

TextCarousel.prototype.setActive = function(id)
{
	base(this, 'setActive', id);

	//TODO: dependecy refactoring
	this.$texts && this.$texts.eq(id)
		.addClass('active');
};