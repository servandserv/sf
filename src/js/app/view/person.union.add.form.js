;(function(h,app) {
    var d;
    
    var view = h.XMLView.extend({
	    elementId: 'person-unions-union-form-cont',
	    template: '/sfdev/stylesheets/Archive/App/Templates/PersonUnionAddForm.xsl',
	    events: {
	        "PersonLoaded": function(pers) {
	            this.render(pers);
	        }
	    },
	    bind: function(el,model) {
	         $('.collapsible').collapsible({});
	        var form = document.getElementById("person-unions-add-form");
	        var add = form.querySelector(".person-union-add-btn");
	        
	        // bind unions options view
	        app.View.UnionsOptions.element = form.elements["person-union-id"];
	        app.Adaptor.Unions.fetch(function(uns) {
	            app.View.UnionsOptions.render(uns);
	        });
	        
	        var link = h.Locator("Archive.Port.Adaptor.Data.Archive.Links.Link");
	        
	        form.elements['person-union-id']
	            .materialize()
	            .addValidationListener(link,"destination")
	            .addEventListener("change",function() {
	                link.setDestination(this.value.length === 0?null:this.value);
                });
            add.addEventListener("click", function(e) {
                e.preventDefault();
                form.ready = true;
                link.validate(link);
                if(form.ready) {
                    link.setSource(model.getID());
                    link.setType("person");
                    
                    $('#person-union-link-modal').openModal();
                    link.subscribe("LinkedResourcesCollectionSpoiled",function(evnt,link) {
                        model.publish("PersonUnionsCollectionSpoiled",model);
                        $('#person-union-link-modal').closeModal();
                    });
                    var v = app.View.LinkForm.extend({
                        elementId: "person-union-link-form-cont"
                    });
                    v.render(link);
                } else {
                    Materialize.toast("Form data validation error",2000);
                }
                
                return false;
            });
            
	    }
    });
}(Happymeal,window.app));