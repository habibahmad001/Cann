"use strict";

// @constructor
// @requires Jsonp
var FormJsonp = function(form)
{
	var context = this;
	this.$form = $(form);
	if ( this.$form.length < 1)
		throw new Error('You have to supply form element');


	this.jsonp = new Jsonp({
		'callback': $.proxy(function(data)
		{
			//data.status data.message
			this.onComplete(null, data.status, data);
		}, this)
	});
	
	this.$form.submit($.proxy(this.onSubmit, this));
};
// @private
FormJsonp.prototype.onSubmit = function(e)
{
	e.preventDefault();
	//console.log(this, e);
	if ( this.validate() )
	{
		console.log('valid, sending', this.$form.serialize());
		// this.ajax.post(this.$form.attr('action'), this.$form.serialize());
		this.jsonp.get(this.$form.attr('action') + '/jsonp?' + this.$form.serialize());
		this.onSend(e);
	}
};
FormJsonp.prototype.onSend = function(){};
FormJsonp.prototype.onComplete = function(xhr, status){};
FormJsonp.prototype.validate = function()
{
	return true;
};
