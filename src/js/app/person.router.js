(function(h,app){
    
    // Router
	app.Router = Backbone.Router.extend({

		routes:{
			"": "home",
			"home": "home",
			"persons/:id": "person",
		},
		
		home: function() {
		    var pers = h.Locator("Archive.Port.Adaptor.Data.Archive.Persons.Person");
		    h.Mediator.publish("PersonLoaded",pers);
		},
		
		person: function(id) {
		    app.Storage.setItem("LastPerson",id);
			app.Adaptor.Person.fetchById(id,function(pers) {
			    h.Mediator.publish("PersonLoaded",pers);
			});
		},
    });
	var router = new app.Router();
	Backbone.history.start();
	
}(Happymeal,window.app));