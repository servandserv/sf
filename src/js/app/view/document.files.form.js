;(function(h,app) {
    var doc;
    var view = h.XMLView.extend({
	    elementId: 'document-files-cont',
	    template: '/sfdev/stylesheets/Archive/App/Templates/DocumentFilesForm.xsl',
	    events: {
	        "DocumentsLoaded": function(docs){
	            doc = docs.getDocument()[0] || h.Locator("Archive.Port.Adaptor.Data.Archive.Documents.Document");
	            this.render(doc.toXmlStr());
	        }
	    },
	    bind: function(el,data) {
	        //console.log(doc.toJSON());
	    }
    });
}(Happymeal,window.app));