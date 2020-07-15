// @constructor
FormAjax = function(form)
{
	var context = this;
	this.$form = $(form);
	if ( this.$form.length < 1)
		throw new Error('You have to supply form element');

	this.ajax = new Ajax({
		//'url': this.$form.attr('action'),
		'type': context.$form.attr('method'),
		'complete': $.proxy(this.onComplete, this)
	});
	
	this.$form.submit($.proxy(this.onSubmit, this));
};
// @private
FormAjax.prototype.onSubmit = function(e)
{
	e.preventDefault();
	//console.log(this, e);
	if ( this.validate() )
	{
		console.log('valid, sending', this.$form.serialize());
		this.ajax.post(this.$form.attr('action'), this.$form.serialize());
		this.onSend(e);
	}
};
FormAjax.prototype.onSend = function(){};
FormAjax.prototype.onComplete = function(xhr, status){};
FormAjax.prototype.validate = function()
{
	return true;
};
