;(function(h,app) {
    app.Adaptor.Source = h.Port.Adaptor.HTTP.extend({
	    fetchUnions: function(id,cb) {
	        var self = this;
		    this.get({
			    url: "../sfdev/api/sources/"+id+"/unions",
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
			    url: "../sfdev/api/sources/"+id+"/persons",
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
	    fetchDocuments: function(id,cb) {
	        var self = this;
		    this.get({
			    url: "../sfdev/api/sources/"+id+"/documents",
			    accept: "application/xml", 
			    callback: function(http) {
				    var docs = h.Locator("Archive.Port.Adaptor.Data.Archive.Documents");
				    docs.XML = http.responseXML;
				    docs.fromXmlStr(http.responseText, function(docs) {
				        cb(docs);
				    });
			    }
		    });
	    },
	    fetchEvents: function(id,cb) {
	        var self = this;
		    this.get({
			    url: "../sfdev/api/sources/"+id+"/events",
			    accept: "application/xml", 
			    callback: function(http) {
				    var evs = h.Locator("Archive.Port.Adaptor.Data.Archive.Events");
				    evs.XML = http.responseXML;
				    evs.fromXmlStr(http.responseText, function(evs) {
				        cb(evs);
				    });
			    }
		    });
	    },
    });
}(Happymeal,window.app));