;(function(h,app) {
    var unions,doc;
    
    var adaptor = app.Adaptor.Unions.extend({
        events: {
            onFetch: function(uns) {
                unions = uns;
                view.render(uns.toXmlStr());
                return uns;
            }
        }
    });
    
    adaptor.fetch();
    
    var view = h.XMLView.extend({
	    elementId: 'unions-list-cont',
	    template: '/sfdev/stylesheets/Archive/App/Templates/DocumentUnionAddForm.xsl',
	    events: {
	        "DocumentsLoaded": function(docs){
	            doc = docs.getDocument()[0] || h.Locator("Archive.Port.Adaptor.Data.Archive.Documents.Document");
	        }
	    },
	    bind: function(el,data) {
	        //console.log(data);
	    }
    });
}(Happymeal,window.app));