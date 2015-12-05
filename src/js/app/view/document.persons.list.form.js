;(function(h,app) {

    var fetchPersons = function(docID) {
        app.Adaptor.Destination.fetchPersons(docID,function(pers) {
            app.View.DocumentPersonsListForm.render(pers);
        });
    }
    
    app.View.DocumentPersonsListForm = h.XMLView.extend({
	    elementId: 'document-persons-list-cont',
	    template: '/sfdev/stylesheets/Archive/App/Templates/DocumentPersonsListForm.xsl',
	    events: {
	        "DocumentLoaded": function(doc) {
	            doc.subscribe("DocumentPersonsCollectionSpoiled", function(evnt,doc) {
	                fetchPersons(doc.getID());
	            });
	            fetchPersons(doc.getID());
	        }
	    },
	    bind: function(el,model) {
	        var self = this;
	        $(el).find(".document-person-link-remove-btn").on("click",function(e) {
	            e.preventDefault();
	            var link = h.Locator("Archive.Port.Adaptor.Data.Archive.Links.Link");
	            link.setID(this.getAttribute("data-id"));
	            app.Adaptor.Link.kill(link,function(link) {
	                //target document id in destination property
	                Materialize.toast("Link deleted",2000);
	                fetchPersons(link.getDestination());
	            });
	        });
	    }
	    
    });
}(Happymeal,window.app));