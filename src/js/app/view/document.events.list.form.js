;(function(h,app) {

    var fetchEvents = function(docID) {
        app.Adaptor.Destination.fetchEvents(docID,function(evs) {
            app.View.DocumentEventsListForm.render(evs);
        });
    }
    
    app.View.DocumentEventsListForm = h.XMLView.extend({
	    elementId: 'document-events-list-cont',
	    template: '/sfdev/stylesheets/Archive/App/Templates/DocumentEventsListForm.xsl',
	    events: {
	        "DocumentLoaded": function(doc) {
	            doc.subscribe("DocumentEventsCollectionSpoiled", function(evnt,doc) {
	                fetchEvents(doc.getID());
	            });
	            fetchEvents(doc.getID());
	        }
	    },
	    bind: function(el,model) {
	        var self = this;
	        $(el).find(".document-event-link-remove-btn").on("click",function(e) {
	            e.preventDefault();
	            var link = h.Locator("Archive.Port.Adaptor.Data.Archive.Links.Link");
	            link.setID(this.getAttribute("data-id"));
	            app.Adaptor.Link.kill(link,function(link) {
	                //target document id in destination property
	                Materialize.toast("Link deleted",2000);
	                fetchEvents(link.getDestination());
	            });
	        });
	    }
	    
    });
}(Happymeal,window.app));