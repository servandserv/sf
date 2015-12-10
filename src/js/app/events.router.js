(function(h,app){
    
    // Router
	app.Router = Backbone.Router.extend({

		routes:{
			"": "events",
			"events" : "events"
		},
		
		events: function() {
            app.Adaptor.Events.fetch( function(evs) {
                h.Mediator.publish("EventsLoaded", evs);
            });
		}
    });
	var router = new app.Router();
	Backbone.history.start();
	
}(Happymeal,window.app));