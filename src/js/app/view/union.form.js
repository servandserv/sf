;(function(h,app) {

    app.View.UnionForm = h.XMLView.extend({
	    elementId: 'union-form-cont',
	    template: '/sfdev/stylesheets/Archive/App/Templates/UnionForm.xsl',
	    events: {
	    },
	    bind: function(el,model) {
	        var self = this;
	        var form = el.querySelector('#union-form');
	        var update = el.querySelector('#union-update-btn');
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
                    model.setComments(this.value.length===0?null:this.value);
                });
            update.addEventListener("click", function(e)  {
                e.preventDefault();
                form.ready = true;
                model.validate(model);
                if(form.ready===true) {
                    if(model.getID() !== null && model.getID().length !== 0) {
                        app.Adaptor.Union.update(model,function(un) {
                            Materialize.toast("Union updated",2000);
                            un.publish("UnionsCollectionUpdated",un);
                        });
                    }
                } else {
                    Materialize.toast("Union data validation error",2000);
                }
                return false;
            });
            create.addEventListener("click", function(e)  {
                e.preventDefault();
                form.ready = true;
                model.validate(model);
                if(form.ready===true) {
                    model.setID(null);
                    app.Adaptor.Union.create(model,function(un) {
                       Materialize.toast("Union created",2000);
                       un.publish("UnionsCollectionUpdated",un);
                    });
                } else {
                    Materialize.toast("Union data validation error",2000);
                }
                return false;
            });
        }
    });
    
}(Happymeal,window.app));