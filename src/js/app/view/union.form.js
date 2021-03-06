;(function(h,app) {

    app.View.UnionForm = h.SXSLTView.extend({
	    elementId: 'union-form-cont',
	    template: '/sfdev/xsltview.php?xsltDocument=App/Templates/UnionForm.xsl',
	    events: {
	    },
	    bind: function(el,model) {
	        var self = this;
	        var form = el.querySelector('#union-form');
	        var update = el.querySelector('#union-update-btn');
	        if(model.getID()===null||model.getID().length===0) {
	            update.addClass("disabled");
	        }
	        var create = el.querySelector('#union-create-btn');
	        // control elements listeners
	        form.elements['union-type']
	            .materialize()
	            .addValidationListener(model,"type")
	            .addEventListener("change",function() {
                    model.setType(this.value.length === 0?null:this.value);
                });
            form.elements['union-name']
                .materialize()
                .addValidationListener(model,"name")
                .addEventListener("change",function() {
                    model.setName(this.value.length===0?null:this.value);
                });
            form.elements['union-founded']
                .materialize()
                .addValidationListener(model,"founded")
                .addEventListener("change",function() {
                    model.setFounded(this.value.length===0?null:this.value);
                });
            form.elements['union-comments']
                .materialize()
                .addEventListener("change",function() {
                    model.setComments(h.escapeHTML(this.value.length===0?null:this.value));
                });
            if(!update.hasClass("disabled")) {
                update.addEventListener("click", function(e)  {
                    e.preventDefault();
                    form.ready = true;
                    model.validate(model);
                    if(form.ready===true) {
                        if(model.getID() !== null && model.getID().length !== 0) {
                            app.Adaptor.Union.update(model,function(un) {
                                Materialize.toast("Union updated",2000);
                                model.publish("UnionsCollectionSpoiled", un);
                            });
                        }
                    } else {
                        Materialize.toast("Union data validation error",2000);
                    }
                    return false;
                });
            }
            create.addEventListener("click", function(e)  {
                e.preventDefault();
                form.ready = true;
                model.validate(model);
                if(form.ready===true) {
                    model.setID(null);
                    app.Adaptor.Union.create(model, function(un) {
                       Materialize.toast("Union created",2000);
                       model.publish("UnionsCollectionSpoiled", un);
                    });
                } else {
                    Materialize.toast("Union data validation error",2000);
                }
                return false;
            });
        }
    });
    
}(Happymeal,window.app));