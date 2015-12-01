;(function(h,app) {
    app.Adaptor.Unions = h.Port.Adaptor.HTTP.extend({
        events: {
            onFetch: function(uns) {
                h.Mediator.publish("UnionsLoaded", uns);
				return uns;
            }
        },
	    fetch: function() {
	        var self = this;
		    this.get({
			    url: "../sfdev/api/unions",
			    accept: "application/xml", 
			    callback: function(http) {
				    var uns = h.Locator("Archive.Port.Adaptor.Data.Archive.Unions");
				    uns.XML = http.responseXML;
				    uns.fromXmlStr(http.responseText, function(uns) {
				        return self.events.onFetch(uns);
				    });
			    }
		    });
	    }
    });
}(Happymeal,window.app));