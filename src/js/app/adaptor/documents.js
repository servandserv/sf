;(function(h,app) {
    app.Adaptor.Documents = h.Port.Adaptor.HTTP.extend({
        events: {
            onFetch: function(docs) {
                h.Mediator.publish("DocumentsLoaded", docs);
				return docs;
            },
        },
	    fetch: function(snumber) {
	        var self = this;
		    this.get({
			    url: app.API+"/documents?snumber="+snumber,
			    accept: "application/xml", 
			    callback: function(http){
				    var docs = h.Locator("Archive.Port.Adaptor.Data.Archive.Documents");
				    docs.XML = http.responseXML;
				    docs.fromXmlStr(http.responseText, function(docs) {
				        self.events.onFetch(docs);
				        return docs;
				    });
			    }
		    });
	    },
    });
}(Happymeal,window.app));