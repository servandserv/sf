;(function(h,app) {
    app.Adaptor.Events = h.Port.Adaptor.HTTP.extend({
	    fetch: function(cb) {
	        var self = this;
		    this.get({
			    url: "../sfdev/api/events",
			    accept: "application/xml", 
			    callback: function(http) {
				    var evs = h.Locator("Archive.Port.Adaptor.Data.Archive.Events");
				    evs.XML = http.responseXML;
				    evs.fromXmlStr(http.responseText, function(evs) {
				        cb(evs);
				    });
			    }
		    });
	    }
    });
}(Happymeal,window.app));