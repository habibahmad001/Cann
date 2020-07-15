// "use strict";
var SlideProblem = function(opt)
{
	base(this, opt);

	// Showcasing 256 x 384 vs 640 x 960
	this.magnification = 2.5 ;
	this.blocker = new Blocker(401);

	this.pagination = new Pagination({
		container: this.$container.find('.pagination'),
		dots: '.dot'
	});
	this.carousel = new ProblemCarousel({
		container: this.$container,
		wrapper: '.wrapper',
		slides: 'div.slide',
		blocker: this.blocker
	});
};
inherits(SlideProblem, Slide);

SlideProblem.prototype.init = function()
{
	base(this, 'init');

	var self = this,
		end = null;

	this.$container.on('click', '.arrow_right', function(){
		self.carousel.next()
			&& self.pagination.next();
	});
	this.$container.on('click', '.arrow_left', function(){
		self.carousel.previous()
			&& self.pagination.previous();
	});
	this.$container.on('click', '.dot', function(){
		var index = $(this).index('.dot');
		self.carousel.setPosition(index)
		 && self.pagination.setActive(index);
		
	});

	this.$window.keydown(function(e){
		// console.log(self.mainView(), e.keyCode);
		if ( !self.mainView() )
			return;

		switch(e.keyCode)
		{
			// case 13: // Enter & Num enter
			case 32: // Spacebar
			case 39: // Arrow right
				self.carousel.next()
					&& self.pagination.next();
				break;

			case 37: // Arrow left
				self.carousel.previous()
					&& self.pagination.previous();
				break;

			default:
				return;
		}

		e.preventDefault();
	});

	this.glassEvents_();

	this.$window.bind(Slide.EVENT_VIEW, $.proxy(this.handleFirstView_, this));
};

SlideProblem.prototype.glassEvents_ = function()
{
	var self = this,
		moving = false,
		offset = null/*this.$container.find('.image').offset()*/,
		extra;

	this.width = this.$container.find('.slide.loupe .image').width();
	this.height = this.$container.find('.slide.loupe .image').height();
	this.current = {
		x: 0, y: 0,
		diffX: 0, diffY: 0
	};
	this.$container.on('mousedown touchstart', '.glass', function(e)
	{
		// console.log('start', e, e.clientX, e.clientY, e.layerX, e.pageX)
		e.preventDefault();
		moving = true;
		offset = $(this).parents('.image').offset();

		$('.glass').addClass('moving');

		// Touch polyfill
		e.pageX || (e.pageX = e.originalEvent.touches[0].pageX);
		e.pageY || (e.pageY = e.originalEvent.touches[0].pageY);

		// Save distance mouse to center
		self.current.diffX  = e.pageX - offset.left - self.current.x;
		self.current.diffY  = e.pageY - offset.top - self.current.y;
	});
	this.$container.on('mousemove touchmove', /*'.image', */function(e)
	{
		// console.log('move ' + e.type +" "+ e.originalEvent.touches[0].pageX +" "+ e.originalEvent.touches[0].pageY + " " + e.which);
		if ( !moving ) return;
		e.preventDefault();

		// Moving only while pressing left button
		if ( e.type === 'mousemove' )
		{
			if ( e.which !== 1 )
				return end(e);
		}

		// Touch polyfill
		e.pageX || (e.pageX = e.originalEvent.touches[0].pageX);
		e.pageY || (e.pageY = e.originalEvent.touches[0].pageY);

		// Calculate center by diff
		self.current.x = e.pageX - offset.left - self.current.diffX;
		self.current.y = e.pageY - offset.top - self.current.diffY;

		// Apply constrain
		self.current.x = Math.min(Math.max(self.current.x,  0), self.width);
		self.current.y = Math.min(Math.max(self.current.y , 0), self.height);

		self.moveGlass(self.current.x, self.current.y);
	});
	this.$container.on('mouseup touchend', /*'.image', */end=function(e)
	{
		if ( !moving ) return;
		moving = false;
		$('.glass').removeClass('moving');

		 // self.current.x -= self.current.diffX;
		 // self.current.y -= self.current.diffY;
	});
};

SlideProblem.prototype.moveGlass = function(x, y)
{
	console.log('move glass ' + x + " " + y);
	// $('.glass').css({left: x, top: y});
	$('.glass').css(Modernizr.prefixed('transform'), 'translate3d(' + x + 'px, ' + y + 'px, 0)')
	// TODO: dynamic values  
	$('.zoom')
		.css('background-position', 
			Math.floor(59 - x * this.magnification) + 'px ' + 
			Math.floor(-142   - y * this.magnification) + 'px');
};

SlideProblem.prototype.handleFirstView_ = function(e, id)
{
	if ( id === this.id )
	{
		console.log('first', e.target)

		this.$container.addClass('animate');
		var self = this;
		setTimeout(function(){
			self.$container.removeClass('animate');
		}, 5001);

		// No need to listen anymore
		this.$window.unbind(Slide.EVENT_VIEW, $.proxy(this.handleFirstView_, this));
	}
};
