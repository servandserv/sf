;(function(h,app) {
    app.Adaptor.Documents = h.Port.Adaptor.HTTP.extend({
	    fetch: function(snumber,cb) {
	        var self = this;
		    this.get({
			    url: app.API+"/documents?snumber="+snumber,
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