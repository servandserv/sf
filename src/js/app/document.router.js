(function(h,app){
    
    // always load unions
    app.Adaptor.Unions.fetch(function(uns){
        h.Mediator.publish("UnionsLoaded", uns);
    });
    
    // Router
	app.Router = Backbone.Router.extend({

		routes:{
			"": "document",
			"home": "document",
			"documents/:id": "document",
			"unions": "unions",
		},
		
		document: function(id) {
		    app.cursor = id || 0;
			//h.Mediator.clear(["DocumentsLoaded","DocumentUnionLinkCreate"]);
			//docs = new app.Collection.Documents({});
			//console.log(docs.toJSON());
			document.getElementById("tabs").materialize("document-tab");
			app.Adaptor.Documents.fetch(app.cursor,function(docs){
			    var doc = docs.getDocument()[0] || h.Locator("Archive.Port.Adaptor.Data.Archive.Documents.Document");
			    h.Mediator.publish("DocumentLoaded",doc);
			});
		},
		unions: function() {
		    //h.Mediator.clear(["UnionsLoaded"]);
		    document.getElementById("tabs").materialize("unions-tab");
		}
    });
	var router = new app.Router();
	Backbone.history.start();
	
}(Happymeal,window.app));