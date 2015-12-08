;(function(h,app) {

    app.View.LinkForm = h.XMLView.extend({
	    template: '/sfdev/stylesheets/Archive/App/Templates/LinkForm.xsl',
	    events: {
	    },
	    bind: function(el,model) {
	        var self = this;
	        var form = el.querySelector('#link-form');
	        var save = el.querySelector('#link-save-btn');
	        var del = el.querySelector('#link-del-btn');
	        if(model.getID()===null || model.getID().length===0) {
	            del.addClass("disabled");
	        }
	        // control elements listeners
	        form.elements['link-dtstart']
	            .materialize()
	            .addValidationListener(model,"dtStart")
	            .addEventListener("change",function() {
                    model.setDtStart(this.value.length === 0?null:this.value);
                });
            form.elements['link-dtend']
                .materialize()
                .addValidationListener(model,"dtEnd")
                .addEventListener("change",function() {
                    model.setDtEnd(this.value.length===0?null:this.value);
                });
            form.elements['link-comments']
                .materialize()
                .addEventListener("change",function() {
                    model.setComments(this.value.length===0?null:this.value);
                });
             save.addEventListener("click", function(e)  {
                e.preventDefault();
                form.ready = true;
                model.validate(model);
                if(form.ready===true) {
                    if(model.getID() !== null && model.getID().length !== 0) {
                        app.Adaptor.Link.update(model,function(link) {
                            Materialize.toast("Link updated",2000);
                        });
                    } else {
                        app.Adaptor.Link.create(model,function(link) {
                            model.publish("LinkedResourcesCollectionSpoiled",model);
                            Materialize.toast("Link created",2000);
                        });
                    }
                } else {
                    Materialize.toast("Link data validation error",2000);
                }
                return false;
            });
            if(!del.hasClass("disabled")) {
                del.addEventListener("click", function(e)  {
                    e.preventDefault();
                    if(model.getID()!==null && model.getID().length!==0) {
                        app.Adaptor.Link.kill(model, function(link) {
                            model.publish("LinkedResourcesCollectionSpoiled",model);
                            Materialize.toast("Link deleted",2000);
                        });
                    }
                    return false;
                });
            }
        }
    });
    
}(Happymeal,window.app));