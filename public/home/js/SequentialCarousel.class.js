// "use strict";

var SequentialCarousel = function(opt)
{
	this.blocker = new Blocker(0);
	this.flag = false;

	if ( typeof opt === 'object' )
	{
		if ( opt.blocker && opt.blocker.blocking )
		{
			this.blocker = opt.blocker;
		}
	}
	else throw TypeError('Wrong option parameter');

	base(this, opt);
};
inherits(SequentialCarousel, AccelCarousel);

SequentialCarousel.prototype.next = function()
{
	 if ( this.blocker.blocking() )
	 	return false;
	this.flag = true;
	var tmp = base(this, 'next');
	this.flag = false;
	return tmp;
};
SequentialCarousel.prototype.previous = function()
{
	if ( this.blocker.blocking() )
		return false;
	this.flag = true;
	var tmp = base(this, 'previous');
	this.flag = false;
	return tmp;
};
SequentialCarousel.prototype.setPosition = function(position)
{
	if ( !this.flag && this.blocker.blocking() )
		return false;

	return base(this, 'setPosition', position);
};