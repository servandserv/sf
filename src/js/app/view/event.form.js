;(function(h,app) {

    app.View.EventForm = h.XMLView.extend({
	    elementId: 'event-form-cont',
	    template: '/sfdev/stylesheets/Archive/App/Templates/EventForm.xsl',
	    events: {
	    },
	    bind: function(el,model) {
	        var self = this;
	        var form = el.querySelector('#event-form');
	        var update = el.querySelector('#event-update-btn');
	        if(model.getID()===null||model.getID().length===0) {
	            update.addClass("disabled");
	        }
	        var create = el.querySelector('#event-create-btn');
	        // control elements listeners
	        
	        var typeview = app.View.EventsTypeOptions.extend({
	            element:form.elements['event-type']
	        });
	        app.Adaptor.Schema.fetch("Events.xsd",function(schema) {
	            typeview.render(schema);
	            if(model.getType()!==null) {
    	            element:form.elements['event-type'].value = model.getType();
    	        }
	        });
	        
	        form.elements['event-type']
	            .materialize()
	            .addValidationListener(model,"type")
	            .addEventListener("change",function() {
                    model.setType(this.value.length === 0?null:this.value);
                });
            form.elements['event-name']
                .materialize()
                .addValidationListener(model,"name")
                .addEventListener("change",function() {
                    model.setName(this.value.length===0?null:this.value);
                });
            form.elements['event-dt']
                .materialize()
                .addValidationListener(model,"dt")
                .addEventListener("change",function() {
                    model.setDt(this.value.length===0?null:this.value);
                });
            form.elements['event-comments']
                .materialize()
                .addEventListener("change",function() {
                    model.setComments(h.escapeHTML(this.value.length===0?null:this.value));
                    console.log(model.getComments());
                });
            if(!update.hasClass("disabled")) {
                update.addEventListener("click", function(e)  {
                    e.preventDefault();
                    form.ready = true;
                    model.validate(model);
                    if(form.ready===true) {
                        if(model.getID() !== null && model.getID().length !== 0) {
                            app.Adaptor.Event.update(model,function(ev) {
                                Materialize.toast("Event updated",2000);
                                model.publish("EventsCollectionSpoiled", ev);
                            });
                        }
                    } else {
                        Materialize.toast("Event data validation error",2000);
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
                    app.Adaptor.Event.create(model, function(ev) {
                       Materialize.toast("Event created",2000);
                       model.publish("EventsCollectionSpoiled", ev);
                    });
                } else {
                    Materialize.toast("Event data validation error",2000);
                }
                return false;
            });
        }
    });
    
}(Happymeal,window.app));