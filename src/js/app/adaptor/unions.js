;(function(h,app) {
    app.Adaptor.Unions = h.Port.Adaptor.HTTP.extend({
	    fetch: function(cb) {
	        var self = this;
		    this.get({
			    url: "../sfdev/api/unions",
			    accept: "application/xml", 
			    callback: function(http) {
				    var uns = h.Locator("Archive.Port.Adaptor.Data.Archive.Unions");
				    uns.XML = http.responseXML;
				    uns.fromXmlStr(http.responseText, function(uns) {
				        //uns.subscribe("UnionsCollectionSpoiled", function(callback) {
                        //    self.fetch(callback);
				        //})
				        cb(uns);
				    });
			    }
		    });
	    }
    });
}(Happymeal,window.app));