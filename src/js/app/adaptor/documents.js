;(function(h,app) {
    app.Adaptor.Documents = h.Port.Adaptor.HTTP.extend({
	    fetch: function(filter,cb) {
	        var self = this;
	        var query = parseInt(filter).toString() == filter.toString() ? "snumber="+filter : "path="+filter;
		    this.get({
			    url: app.API+"/documents?"+query,
			    accept: "application/xml", 
			    callback: function(http){
				    var docs = h.Locator("Archive.Port.Adaptor.Data.Archive.Documents");
				    docs.XML = http.responseXML;
				    docs.fromXmlStr(http.responseText, function(docs) {
				        cb(docs);
				    });
			    }
		    });
	    },
    });
}(Happymeal,window.app));