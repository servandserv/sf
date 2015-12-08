(function(h,app){
    
    // Router
	app.Router = Backbone.Router.extend({

		routes:{
			"": "unions",
			"unions" : "unions"
		},
		
		unions: function() {
            app.Adaptor.Unions.fetch( function(uns) {
                h.Mediator.publish("UnionsLoaded", uns);
            });
		}
    });
	var router = new app.Router();
	Backbone.history.start();
	
}(Happymeal,window.app));