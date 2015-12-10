;(function(h,app) {
    
    var view = h.XMLView.extend({
	    elementId: 'document-form-cont',
	    template: '/sfdev/stylesheets/Archive/App/Templates/DocumentForm.xsl',
	    events: {
	        // render view when document loaded
	        "DocumentLoaded": function(doc) {
	            this.render(doc);
	        }
	    },
	    bind: function(el,model) {
    	    var form = document.getElementById('document-form');
    	    var s = document.getElementById('document-submit');
    	    // control elements listeners
    	    form.elements['document-type']
    	        .materialize()
    	        .addValidationListener(model,"type")
    	        .addEventListener("change",function() {
                 model.setType(this.value.length === 0?null:this.value);
            });
            form.elements['document-year']
                .materialize()
                .addValidationListener(model,"year")
                .addEventListener("change",function() {
                    model.setYear(this.value.length===0?null:this.value);
                });
            form.elements['document-published']
                .addValidationListener(model,"published")
                .addEventListener("change",function() {
                    model.setPublished(this.checked?1:0);
                });
            form.elements['document-comments']
                .materialize()
                .addEventListener("change",function() {
                    model.setComments(h.escapeHTML(this.value.length===0?null:this.value));
                });
            s.addEventListener("click", function()  {
                form.ready = true;
                model.validate(model);
                if(form.ready===true) {
                    app.Adaptor.Document.modify(model,function(doc) {
                        Materialize.toast("Document updated",2000);
                    });
                } else {
                    Materialize.toast("Form data validation error",2000);
                }
                return false;
            });
        }
    });
}(Happymeal,window.app));