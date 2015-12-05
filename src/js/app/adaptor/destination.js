;(function(h,app) {
    app.Adaptor.Destination = h.Port.Adaptor.HTTP.extend({
	    fetchUnions: function(id,cb) {
	        var self = this;
		    this.get({
			    url: "../sfdev/api/destinations/"+id+"/unions",
			    accept: "application/xml", 
			    callback: function(http) {
				    var uns = h.Locator("Archive.Port.Adaptor.Data.Archive.Unions");
				    uns.XML = http.responseXML;
				    uns.fromXmlStr(http.responseText, function(uns) {
				        cb(uns);
				    });
			    }
		    });
	    },
	    fetchPersons: function(id,cb) {
	        var self = this;
		    this.get({
			    url: "../sfdev/api/destinations/"+id+"/persons",
			    accept: "application/xml", 
			    callback: function(http) {
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