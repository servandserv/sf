(function(h,app){
    
    // Router
	app.Router = Backbone.Router.extend({

		routes:{
			"": "home",
			"home": "home",
			"documents/:id": "document",
		},
		
		home: function() {
		    if(app.Storage.getItem("LastDocument")) {
		        document.location = "#documents/"+app.Storage.getItem("LastDocument");
		    } else {
		        document.location = "#documents/0";
		    }
		},
		
		document: function(id) {
		    app.Storage.setItem("LastDocument",id);
			app.Adaptor.Documents.fetch(id,function(docs){
			    var doc = docs.getDocument()[0] || h.Locator("Archive.Port.Adaptor.Data.Archive.Documents.Document");
			    h.Mediator.publish("DocumentLoaded",doc);
			    h.Mediator.publish("DocumentsLoaded",docs);
			});
		},
    });
	var router = new app.Router();
	Backbone.history.start();
	
}(Happymeal,window.app));