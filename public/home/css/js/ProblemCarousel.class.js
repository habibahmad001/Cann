// "use strict";

var ProblemCarousel = function(opt)
{
	this.animatedSecondSlide = false;
	this.timeout = null;
	
	base(this, opt);
};
inherits(ProblemCarousel, SequentialCarousel);

ProblemCarousel.prototype.setPosition = function(position)
{
	if ( !this.animatedSecondSlide )
	{
		if ( position == 1 )
		{
			this.seenSecondSlide = true;
			var self = this;
			this.timeout = setTimeout(function(){
				self.$slides.eq(1).addClass('animated');
				self.animatedSecondSlide = true;
			}, 12601);
		}
		else
		{
			clearTimeout(this.timeout);
		}
	}

	return base(this, 'setPosition', position);
};
