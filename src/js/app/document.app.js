(function(w){
	// common libs
	Element.prototype.addClass = function(className) {
        var re = new RegExp("(^|\\s)"+className+"(\\s|$)","g");
        if(re.test(this.className)) {
            return this;
        }
        this.className = (this.className+" "+className).replace(/\s+/g," ").replace(/(^ | $)/g,"");
        return this;
    }
    Element.prototype.delClass = function(className) {
        var re = new RegExp("(^|\\s)"+className+"(\\s|$)","g");
        this.className = this.className.replace(re,"$1").replace(/\s+/g," ").replace(/(^ | $)/g,"");
        return this;
    }
    Element.prototype.hasClass = function(className) {
        var re = new RegExp("(^|\\s)"+className+"(\\s|$)","g");
        return re.test(this.className);
    }
	
	w.app = w.app || {
		Router: {},
		Adaptor: {},
		View: {},
		API: "../sfdev/api"
	};
	
	Happymeal.Mediator.subscribe("ErrorOccured", function( args ) {
		document.getElementById("error-message").innerHTML = args.message;
		$('#error-modal').openModal();
	});
	
	Happymeal.Mediator.subscribe("SuccessOccured", function( args ) {
		Materialize.toast(args.message, 2000);
	});
	
	
	$('.materialboxed').materialbox();
	$('.collapsible').collapsible({ accordion : false });
	$(".collapsible li:first-child .collapsible-header").each(function(){
			$(this).click();
	});
	$('.modal-trigger').leanModal();
	
	var cursor = 0;
	
}(window));