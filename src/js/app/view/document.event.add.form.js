;(function(h,app) {
    var d;
    
    var view = h.XMLView.extend({
	    elementId: 'document-events-event-form-cont',
	    template: '/sfdev/stylesheets/Archive/App/Templates/DocumentEventAddForm.xsl',
	    events: {
	        "DocumentLoaded": function(doc) {
	            this.render(doc);
	        }
	    },
	    bind: function(el,model) {
	        var form = document.getElementById("document-events-add-form");
	        var add = form.querySelector(".document-event-add-btn");
	        
	        // bind unions options view
	        app.View.EventsOptions.element = form.elements["document-event-id"];
	        app.Adaptor.Events.fetch(function(evs) {
	            app.View.EventsOptions.render(evs);
	        });
	        
	        var link = h.Locator("Archive.Port.Adaptor.Data.Archive.Links.Link");
	        
	        form.elements['document-event-id']
	            .materialize()
	            .addValidationListener(link,"source")
	            .addEventListener("change",function() {
	                link.setSource(this.value.length === 0?null:this.value);
                });
            add.addEventListener("click", function(e) {
                e.preventDefault();
                form.ready = true;
                link.validate(link);
                if(form.ready) {
                    link.setDestination(model.getID());
                    link.setType("event");
                    link.setDtStart(model.getYear());
                    link.setDtEnd(model.getYear());
                    
                    app.Adaptor.Link.create(link,function(link) {
                        Materialize.toast("Link create", 2000);
                        model.publish("DocumentEventsCollectionSpoiled",model);
                    });
                    
                } else {
                    Materialize.toast("Form data validation error",2000);
                }
                return false;
            });
            
	    }
    });
}(Happymeal,window.app));