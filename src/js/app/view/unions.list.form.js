;(function(h,app) {
    
    /**
    *
    * All unions collection list
    * initialized on global event 'UnionsLoaded'
    * - manage UnionForm initialization
    */
    
    var unionFormView = app.View.UnionForm.extend({});
    
    var unionFormRender = function(un,v) {
        un.subscribe("UnionsCollectionSpoiled", function(evnt,un) {
            app.Adaptor.Unions.fetch( function(uns) {
                h.Mediator.publish("UnionsLoaded",uns);
            });
        });
        unionFormView.render(un);
    }
    
    app.View.UnionsList = h.XMLView.extend({
	    elementId: 'unions-list-cont',
	    template: '/sfdev/stylesheets/Archive/App/Templates/UnionsListForm.xsl',
	    events: {
	        // render on UnionsLoaded global event
	        "UnionsLoaded": function(uns) {
	            this.render(uns);
	            var un = h.Locator("Archive.Port.Adaptor.Data.Archive.Unions.Union");
	            unionFormRender(un,this);
	        }
	    },
	    bind: function(el,model) {
	        var self = this;
	        var selected;
	        $(el).find(".union-delete-modal-agree-btn").on("click",function(e) {
	            e.preventDefault();
	            var un = h.Locator("Archive.Port.Adaptor.Data.Archive.Unions.Union");
	            un.setID(selected);
	            app.Adaptor.Union.kill(un, function(un) {
                    Materialize.toast("Union deleted",2000);
                    app.Adaptor.Unions.fetch(function(uns) {
                        h.Mediator.publish("UnionsLoaded",uns);
                    });
                });
	        });
	        $(el).find(".unions-select-union-btn").on("click",function(e) {
	            e.preventDefault();
	            app.Adaptor.Union.fetchById(this.getAttribute("data-id"),function(un) {
	                unionFormRender(un,self);
	            });
	        });
	        $(el).find(".unions-delete-union-btn").on("click",function(e) {
	            e.preventDefault();
	            selected = this.getAttribute("data-id");
	            $('#union-delete-modal').openModal();
	        });
	    }
    });
}(Happymeal,window.app));