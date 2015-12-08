;(function(h,app) {
    app.Adaptor.Person = h.Port.Adaptor.HTTP.extend({
	    fetchById: function(id,cb) {
	        var self = this;
		    this.get({
			    url: "../sfdev/api/persons/"+id,
			    accept: "application/xml", 
			    callback: function(http) {
				    var pers = h.Locator("Archive.Port.Adaptor.Data.Archive.Persons.Person");
				    pers.XML = http.responseXML;
				    pers.fromXmlStr(http.responseText, function(pers) {
				        cb(pers);
				    });
			    }
		    });
	    },
	    update: function(person,cb) {
	        var self = this;
			this.put({
				url: app.API+"/persons/"+person.getID(),
				entity: person,
				content: "application/xml", 
				accept: "application/xml", 
				callback: function(http) {
				    var pers = h.Locator("Archive.Port.Adaptor.Data.Archive.Persons.Person");
				    pers.XML = http.responseXML;
				    pers.fromXmlStr(http.responseText, function(pers) {
				        cb(pers);
				    });
				}
			});
		},
		create: function(person,cb) {
	        var self = this;
			this.post({
				url: app.API+"/persons",
				entity: person,
				content: "application/xml", 
				accept: "application/xml", 
				callback: function(http) {
				    var pers = h.Locator("Archive.Port.Adaptor.Data.Archive.Persons.Person");
				    pers.XML = http.responseXML;
				    pers.fromXmlStr(http.responseText, function(pers) {
				        cb(pers);
				    });
				}
			});
		},
		kill: function(person,cb) {
	        var self = this;
			this.del({
				url: app.API+"/persons/"+person.getID(),
				entity: person,
				content: "application/xml", 
				accept: "application/xml", 
				callback: function(http) {
				    var pers = h.Locator("Archive.Port.Adaptor.Data.Archive.Persons.Person");
				    pers.XML = http.responseXML;
				    pers.fromXmlStr(http.responseText, function(pers) {
				        cb(pers);
				    });
				}
			});
		},
    });
}(Happymeal,window.app));