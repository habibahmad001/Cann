// "use strict";
var SlideTimeline = function(opt)
{
	base(this, opt);

	if ( Modernizr.interactive )
	this.parallax = new ScrollParallax({
		container: this.$container,
		layers: [
			// {selector: '.icon_bg', ratio: .30},
			// {selector: '.icon_bg2', ratio: .30},
			// {selector: '.icon_bg3', ratio: .30},
			// {selector: '.icon_bg4', ratio: .30},
			// {selector: '.icon_bg5', ratio: .30},

			{selector: '.icon_bg', ratio: .30, moveBg: true},
			{selector: '.icon_bg2', ratio: .30, moveBg: true, offsetRight: 200},
			{selector: '.icon_bg3', ratio: .30, moveBg: true},
			{selector: '.icon_bg4', ratio: .30, moveBg: true, offsetRight: 300},
			{selector: '.icon_bg5', ratio: .30, moveBg: true},

		]
	});
};
inherits(SlideTimeline,  Slide);
