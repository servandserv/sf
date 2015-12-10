;(function(h,app) {
    app.Adaptor.Event = h.Port.Adaptor.HTTP.extend({
	    fetchById: function(id,cb) {
	        var self = this;
		    this.get({
			    url: "../sfdev/api/events/"+id,
			    accept: "application/xml", 
			    callback: function(http) {
				    var ev = h.Locator("Archive.Port.Adaptor.Data.Archive.Events.Event");
				    ev.XML = http.responseXML;
				    ev.fromXmlStr(http.responseText, function(ev) {
				        cb(ev);
				    });
			    }
		    });
	    },
	    update: function(event,cb) {
	        var self = this;
			this.put({
				url: app.API+"/events/"+event.getID(),
				entity: event,
				content: "application/xml", 
				accept: "application/xml", 
				callback: function(http) {
				    var ev = h.Locator("Archive.Port.Adaptor.Data.Archive.Events.Event");
				    ev.XML = http.responseXML;
				    ev.fromXmlStr(http.responseText, function(ev) {
				        cb(ev);
				    });
				}
			});
		},
		create: function(event,cb) {
	        var self = this;
			this.post({
				url: app.API+"/events",
				entity: event,
				content: "application/xml", 
				accept: "application/xml", 
				callback: function(http) {
				    var ev = h.Locator("Archive.Port.Adaptor.Data.Archive.Events.Event");
				    ev.XML = http.responseXML;
				    ev.fromXmlStr(http.responseText, function(ev) {
				        cb(ev);
				    });
				}
			});
		},
		kill: function(event,cb) {
	        var self = this;
			this.del({
				url: app.API+"/events/"+event.getID(),
				entity: event,
				content: "application/xml", 
				accept: "application/xml", 
				callback: function(http) {
				    var ev = h.Locator("Archive.Port.Adaptor.Data.Archive.Events.Event");
				    ev.XML = http.responseXML;
				    ev.fromXmlStr(http.responseText, function(ev) {
				        cb(ev);
				    });
				}
			});
		},
    });
}(Happymeal,window.app));