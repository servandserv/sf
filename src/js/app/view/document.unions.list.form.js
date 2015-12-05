;(function(h,app) {

    var fetchUnions = function(docID) {
        app.Adaptor.Destination.fetchUnions(docID,function(uns) {
            app.View.DocumentUnionsListForm.render(uns);
        });
    }
    
    app.View.DocumentUnionsListForm = h.XMLView.extend({
	    elementId: 'document-unions-list-cont',
	    template: '/sfdev/stylesheets/Archive/App/Templates/DocumentUnionsListForm.xsl',
	    events: {
	        "DocumentLoaded": function(doc) {
	            doc.subscribe("DocumentUnionsCollectionSpoiled", function(evnt,doc) {
	                fetchUnions(doc.getID());
	            });
	            fetchUnions(doc.getID());
	        }
	    },
	    bind: function(el,model) {
	        var self = this;
	        $(el).find(".document-union-link-remove-btn").on("click",function(e) {
	            e.preventDefault();
	            var link = h.Locator("Archive.Port.Adaptor.Data.Archive.Links.Link");
	            link.setID(this.getAttribute("data-id"));
	            app.Adaptor.Link.kill(link,function(link) {
	                //target document id in destination property
	                Materialize.toast("Link deleted",2000);
	                fetchUnions(link.getDestination());
	            });
	        });
	    }
	    
    });
}(Happymeal,window.app));