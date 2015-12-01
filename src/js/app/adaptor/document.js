;(function(h,app) {
    app.Adaptor.Document = h.Port.Adaptor.HTTP.extend({
        events: {
            onFetch: loaded,
            onPut: loaded
        },
	    fetch: function(doc) {
	        var self = this;
		    this.get({
			    url: app.API+"/document/"+doc.getID(),
			    accept: "application/xml", 
			    callback: parse
		    });
	    },
	    update: function( doc ) {
	        var self = this;
			this.put({
				url: app.API+"/documents/"+doc.getID(),
				entity: doc,
				content: "application/xml", 
				callback: parse
			});
		},
    });
    
    var parse = function( http ) {
	    var doc = h.Locator("Archive.Port.Adaptor.Data.Archive.Document");
	    doc.XML = http.responseXML;
	    doc.fromXmlStr(http.responseText, function(doc) {
		    return self.events.onFetch(doc);
	    })
	};
	
	var loaded = function(doc) {
        h.Mediator.publish("DocumentLoaded", doc);
	    return doc;
    }
	
}(Happymeal,window.app));