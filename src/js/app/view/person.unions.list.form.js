;(function(h,app) {

    var fetchUnions = function(personID) {
        app.Adaptor.Source.fetchUnions(personID,function(uns) {
            uns.subscribe("PersonUnionsCollectionSpoiled", function(evnt,uns) {
	            fetchUnions(personID);
	        });
            app.View.PersonUnionsListForm.render(uns);
        });
    }
    
    app.View.PersonUnionsListForm = h.XMLView.extend({
	    elementId: 'person-unions-list-cont',
	    template: '/sfdev/stylesheets/Archive/App/Templates/PersonUnionsListForm.xsl',
	    events: {
	        "PersonLoaded": function(pers) {
	            pers.subscribe("PersonUnionsCollectionSpoiled", function(evnt,pers) {
	                fetchUnions(pers.getID());
	            });
	            fetchUnions(pers.getID());
	        }
	    },
	    bind: function(el,model) {
	        var self = this;
	        $(el).find(".person-union-link-info-btn").on("click",function(e) {
	            e.preventDefault();
	            var link = h.Locator("Archive.Port.Adaptor.Data.Archive.Links.Link");
	            link.setID(this.getAttribute("data-id"));
	            app.Adaptor.Link.fetchById(link,function(link) {
	                $('#person-union-link-modal').openModal();
                    link.subscribe("LinkedResourcesCollectionSpoiled",function(evnt,l) {
                        model.publish("PersonUnionsCollectionSpoiled",model);
                        $('#person-union-link-modal').closeModal();
                    });
                    var v = app.View.LinkForm.extend({
                        elementId: "person-union-link-form-cont"
                    });
                    v.render(link);
	            });
	        });
	    }
	    
    });
}(Happymeal,window.app));