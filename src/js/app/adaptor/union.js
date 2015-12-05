;(function(h,app) {
    app.Adaptor.Union = h.Port.Adaptor.HTTP.extend({
	    fetchById: function(id,cb) {
	        var self = this;
		    this.get({
			    url: "../sfdev/api/unions/"+id,
			    accept: "application/xml", 
			    callback: function(http) {
				    var un = h.Locator("Archive.Port.Adaptor.Data.Archive.Unions.Union");
				    un.XML = http.responseXML;
				    un.fromXmlStr(http.responseText, function(un) {
				        cb(un);
				    });
			    }
		    });
	    },
	    update: function(union,cb) {
	        var self = this;
			this.put({
				url: app.API+"/unions/"+union.getID(),
				entity: union,
				content: "application/xml", 
				accept: "application/xml", 
				callback: function(http) {
				    var un = h.Locator("Archive.Port.Adaptor.Data.Archive.Unions.Union");
				    un.XML = http.responseXML;
				    un.fromXmlStr(http.responseText, function(un) {
				        cb(un);
				    });
				}
			});
		},
		create: function(union,cb) {
	        var self = this;
			this.post({
				url: app.API+"/unions",
				entity: union,
				content: "application/xml", 
				accept: "application/xml", 
				callback: function(http) {
				    var un = h.Locator("Archive.Port.Adaptor.Data.Archive.Unions.Union");
				    un.XML = http.responseXML;
				    un.fromXmlStr(http.responseText, function(un) {
				        cb(un);
				    });
				}
			});
		},
		kill: function(union,cb) {
	        var self = this;
			this.del({
				url: app.API+"/unions/"+union.getID(),
				entity: union,
				content: "application/xml", 
				accept: "application/xml", 
				callback: function(http) {
				    var un = h.Locator("Archive.Port.Adaptor.Data.Archive.Unions.Union");
				    un.XML = http.responseXML;
				    un.fromXmlStr(http.responseText, function(un) {
				        cb(un);
				    });
				}
			});
		},
    });
}(Happymeal,window.app));