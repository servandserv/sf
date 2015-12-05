;(function(h,app) {
    app.Adaptor.Document = h.Port.Adaptor.HTTP.extend({
	    fetch: function(doc,cb) {
	        var self = this;
		    this.get({
			    url: app.API+"/document/"+doc.getID(),
			    accept: "application/xml", 
			    callback: function( http ) {
	                var doc = h.Locator("Archive.Port.Adaptor.Data.Archive.Documents.Document");
	                doc.XML = http.responseXML;
	                doc.fromXmlStr(http.responseText, function(doc) {
		                cb(doc);
	                })
	            }
		    });
	    },
	    modify: function(doc,cb) {
	        var self = this;
			this.patch({
				url: app.API+"/documents/"+doc.getID(),
				entity: doc,
				content: "application/xml", 
				accept: "application/xml", 
				callback: function(http) {
				    var doc = h.Locator("Archive.Port.Adaptor.Data.Archive.Documents.Document");
	                doc.XML = http.responseXML;
	                doc.fromXmlStr(http.responseText, function(doc) {
		                cb(doc);
	                })
				}
			});
		},
    });
	
}(Happymeal,window.app));