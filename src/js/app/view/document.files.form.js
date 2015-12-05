;(function(h,app) {
    var view = h.XMLView.extend({
	    elementId: 'document-files-cont',
	    template: '/sfdev/stylesheets/Archive/App/Templates/DocumentFilesForm.xsl',
	    events: {
	        // render view when documents loaded
	        "DocumentLoaded": function(doc){
	            this.render(doc);
	        }
	    },
	    bind: function(el,model) {
	        //console.log(doc.toJSON());
	    }
    });
}(Happymeal,window.app));