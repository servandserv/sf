;(function(h,app) {

    app.View.EventsOptions = h.XMLView.extend({
	    template: '/sfdev/stylesheets/Archive/App/Templates/EventsOptions.xsl',
	    events: {
	        "EventsLoaded": function(uns) {
	            var self = this;
	            if(this.element || document.getElementById(this.elementId)) {
                    // when target element ready render
                    this.render(uns);
                } else {
                    // otherwise just update view model
                    this.model = uns;
                    var timerId = setInterval(function() {
                        if(self.element || document.getElementById(self.elementId)) {
                            self.render(uns);
                            clearInterval(timerId);
                        }
                    }, 500);
                }
	        }
	    },
	    bind: function(el,model) {
	    }
	    
    });
}(Happymeal,window.app));