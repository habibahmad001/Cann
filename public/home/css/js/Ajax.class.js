"use strict";
// @constructor
var Ajax = function(defaultOpts)
{
	this.defaultOpts = $.extend({
		'url': window.location.pathname,
		//'type': 'POST',
		'dataType': 'text',
		/*'success': function(data){
			// success, error, already, doesntexit
			if ( data === 'success' ); // We O.K.
			else reset();
		},
		'error':* reset*/
	}, defaultOpts);
};
Ajax.prototype.setOption = function(option)
{
	this.defaultOpts = $.extend(this.defaultOpts, option);
};
// @param {Object} opt_meta Some data
Ajax.prototype.request = function(url, opt_meta)
{
	$.ajax($.extend({}, this.defaultOpts, {'url': url, 'metadata': opt_meta}));
};

Ajax.prototype.post = function(url, data)
{
	$.ajax($.extend({}, this.defaultOpts, {'url': url, 'data': data}));
};
