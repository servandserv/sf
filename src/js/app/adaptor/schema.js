;(function(h,app) {
    app.Adaptor.Schema = h.Port.Adaptor.HTTP.extend({
	    fetch: function(name,cb) {
	        var self = this;
		    this.get({
			    url: app.SCHEMAS+"/"+name,
			    accept: "application/xml", 
			    callback: function(http){
			        cb({
			            XML: http.responseXML,
			            toXmlStr: function() {
			                return this.XML
			            }
			        });
			    }
		    });
	    },
    });
}(Happymeal,window.app));