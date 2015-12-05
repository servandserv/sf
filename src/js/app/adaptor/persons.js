;(function(h,app) {
    app.Adaptor.Persons = h.Port.Adaptor.HTTP.extend({
	    fetch: function(q,cb) {
	        var self = this;
		    this.get({
			    url: app.API+"/persons?fn="+q.fn,
			    accept: "application/xml", 
			    callback: function(http){
				    var pers = h.Locator("Archive.Port.Adaptor.Data.Archive.Persons");
				    pers.XML = http.responseXML;
				    pers.fromXmlStr(http.responseText, function(pers) {
				        cb(pers);
				    });
			    }
		    });
	    },
    });
}(Happymeal,window.app));