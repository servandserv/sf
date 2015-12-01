(function(h,app){
    // Router
	app.Router = Backbone.Router.extend({

		routes:{
			"": "document",
			"home": "document",
			"documents/:id": "document",
		},
		
		document: function(id) {
		    cursor = id || 0;
			//Happymeal.Mediator.clear(["DocumentLoaded","ResourceLoaded"]);
			//docs = new app.Collection.Documents({});
			//console.log(docs.toJSON());
			app.Adaptor.Documents.fetch(cursor);
			
		},
    });
	var router = new app.Router();
	Backbone.history.start();
	
}(Happymeal,window.app));