"use strict";
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
    
    HTMLElement.prototype.addValidationListener = function(m,name) {
        var self=this;
        var pref = name || this.name;
        m.subscribe(pref+"ValidationErrorOccured",function(args) {
            self.addClass('invalid');
            self.form.ready = false;
        });
        m.subscribe(pref+"ValidationSuccessOccured",function(args) {
            self.delClass('invalid');
        });
        return this;
    }
    
    //materialize addons
    Element.prototype.materialize = function(arg) {
        switch(this.nodeName) {
            case "INPUT":
                if(this.value.length != 0 && this.nextSibling.nodeName == "LABEL") {
                    this.nextSibling.addClass('active');
                }
                break;
            case "SELECT":
                $(this).material_select();
                break;
            case "TEXTAREA":
                if(this.innerHTML.length!==0 && this.nextSibling.nodeName == "LABEL") {
                    this.nextSibling.addClass('active');
                }
                //content = $(this).val();
			    //content = content.replace(/\n/g, '<br>');
			    //$('.hiddendiv').html(content + '<br>');
			    //$(this).css('height', $('.hiddendiv').height());
			    //$(this).siblings('label, i').addClass('active');
                $(this).trigger('autoresize');
                break;
        }
        if(arg && this.hasClass("tabs")) {
            var $links = $(this).find('li.tab a');
            $links.each(function(){
                var $content;
                if(this.hash == "#"+arg) {
                    this.addClass('active');
                    $content = $(this.hash).show();
                } else {
                    //this.addClass('active');
                    $content = $(this.hash).hide();
                }
            });

        }
        return this;
    }
    
	
	w.app = w.app || {
		Router: {},
		Adaptor: {},
		View: {},
		Storage: Happymeal.Storage.extend({
		    prefix: "sf"
		}),
		API: "../sfdev/api"
	};
	
	Happymeal.Mediator.subscribe("ErrorOccured", function( args ) {
		document.getElementById("error-message").innerHTML = args.message;
		$('#error-modal').openModal();
	});
	
	Happymeal.Mediator.subscribe("SuccessOccured", function( args ) {
		Materialize.toast(args.message, 2000);
	});
	
	//$('.materialboxed').materialbox();
	//$('.collapsible').collapsible({ accordion : false });
	//$(".collapsible li:first-child .collapsible-header").each(function(){
	//		$(this).click();
	//});
	$('.modal-trigger').leanModal();
	
}(window));