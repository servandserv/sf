;(function(h,app) {
    app.Adaptor.Link = h.Port.Adaptor.HTTP.extend({
	    fetchById: function(link,cb) {
	        var self = this;
		    this.get({
			    url: app.API+"/links/"+link.getID(),
			    accept: "application/xml", 
			    callback: function(http) {
			        var link = h.Locator("Archive.Port.Adaptor.Data.Archive.Links.Link");
	                link.XML = http.responseXML;
	                link.fromXmlStr(http.responseText, function(link) {
		                cb(link);
	                });
	            }
		    });
	    },
	    update: function(link,cb) {
	        var self = this;
			this.put({
				url: app.API+"/links/"+link.getID(),
				entity: link,
				content: "application/xml", 
				accept: "application/xml", 
				callback: function(http) {
				    var link = h.Locator("Archive.Port.Adaptor.Data.Archive.Links.Link");
	                link.XML = http.responseXML;
	                link.fromXmlStr(http.responseText, function(link) {
		                cb(link);
	                });
				}
			});
		},
		create: function(link,cb) {
	        var self = this;
			this.post({
				url: app.API+"/links",
				entity: link,
				content: "application/xml", 
				accept: "application/xml", 
				callback: function(http) {
				    var link = h.Locator("Archive.Port.Adaptor.Data.Archive.Links.Link");
	                link.XML = http.responseXML;
	                link.fromXmlStr(http.responseText, function(link) {
		                cb(link);
	                });
				}
			});
		},
		kill: function(link,cb) {
	        var self = this;
			this.del({
				url: app.API+"/links/"+link.getID(),
				entity: link,
				content: "application/xml", 
				accept: "application/xml", 
				callback: function(http) {
				    var link = h.Locator("Archive.Port.Adaptor.Data.Archive.Links.Link");
	                link.XML = http.responseXML;
	                link.fromXmlStr(http.responseText, function(link) {
		                cb(link);
	                });
				}
			});
		},
    });
	
}(Happymeal,window.app));