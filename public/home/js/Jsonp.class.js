"use strict";

//@constructor
var Jsonp = function(opt)
{
	this.counter = 0;
	this.callback = opt.callback || function(){};
};
Jsonp.prototype.get = function(url)
{
	console.log('get', url);

	var context = this;
	var func = 'callback' + this.counter ++;
	window[func] = function(data)
	{
		context.callback(data);
		try {
			delete window[func];
		} catch(e) {}
		window[func] = null;
	};

	var $script =
	$('<script>')
		.attr({
			'src': url + '&callback=' + func, // ?callback=x gets treated as jsonp request
			'async': true
		});
	
	$script.appendTo('head');
};

