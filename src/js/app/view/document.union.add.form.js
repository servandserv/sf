;(function(h,app) {
    var d;
    
    var view = h.XMLView.extend({
	    elementId: 'document-unions-union-form-cont',
	    template: '/sfdev/stylesheets/Archive/App/Templates/DocumentUnionAddForm.xsl',
	    events: {
	        "DocumentLoaded": function(doc) {
	            this.render(doc);
	        }
	    },
	    bind: function(el,model) {
	        var form = document.getElementById("document-unions-add-form");
	        var add = form.querySelector(".document-union-add-btn");
	        
	        // bind unions options view
	        app.View.UnionsOptions.element = form.elements["document-union-id"];
	        
	        var link = h.Locator("Archive.Port.Adaptor.Data.Archive.Links.Link");
	        
	        form.elements['document-union-id']
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
                    link.setType("union");
                    link.setDtStart(model.getYear());
                    link.setDtEnd(model.getYear());
                    
                    app.Adaptor.Link.create(link,function(link) {
                        Materialize.toast("Link create", 2000);
                        model.publish("DocumentUnionsCollectionSpoiled",model);
                    });
                    
                } else {
                    Materialize.toast("Form data validation error",2000);
                }
                return false;
            });
            
	    }
    });
}(Happymeal,window.app));