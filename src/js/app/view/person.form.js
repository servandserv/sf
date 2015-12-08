;(function(h,app) {

    app.View.PersonForm = h.XMLView.extend({
	    elementId: 'person-form-cont',
	    template: '/sfdev/stylesheets/Archive/App/Templates/PersonForm.xsl',
	    events: {
	        "PersonLoaded": function(pers) {
	            this.render(pers);
	        }
	    },
	    bind: function(el,model) {
	        var self = this;
	        var form = el.querySelector('#person-form');
	        var update = el.querySelector('#person-update-btn');
	        if(model.getID()===null||model.getID().length===0) {
	            update.addClass("disabled");
	        }
	        var create = el.querySelector('#person-create-btn');
	        if(model.getID()!==null&&model.getID().length!==0) {
	            create.addClass("disabled");
	        }
	        var search = el.querySelector('#persons-search-btn');
	        // control elements listeners
	        form.elements['person-fullname']
	            .materialize()
	            .addValidationListener(model,"fullName")
	            .addEventListener("change",function() {
                    model.setFullName(this.value.length === 0?null:this.value);
                });
            form.elements['person-initials']
                .materialize()
                .addValidationListener(model,"initials")
                .addEventListener("change",function() {
                    model.setInitials(this.value.length===0?null:this.value);
                });
            form.elements['person-lastname']
                .materialize()
                .addValidationListener(model,"lastName")
                .addEventListener("change",function() {
                    model.setLastName(this.value.length===0?null:this.value);
                });
            form.elements['person-firstname']
                .materialize()
                .addValidationListener(model,"firstName")
                .addEventListener("change",function() {
                    model.setFirstName(this.value.length===0?null:this.value);
                });
            form.elements['person-middlenames']
                .materialize()
                .addValidationListener(model,"middleNames")
                .addEventListener("change",function() {
                    model.setMiddleNames(this.value.length===0?null:this.value);
                });
            form.elements['person-dob']
                .materialize()
                .addValidationListener(model,"DOB")
                .addEventListener("change",function() {
                    model.setDOB(this.value.length===0?null:this.value);
                });
            form.elements['person-deceased']
                .materialize()
                .addValidationListener(model,"deceased")
                .addEventListener("change",function() {
                    model.setDeceased(this.value.length===0?null:this.value);
                });
            form.elements['person-rollno']
                .materialize()
                .addValidationListener(model,"rollNo")
                .addEventListener("change",function() {
                    model.setRollNo(this.value.length===0?null:this.value);
                });
            form.elements['person-league']
                .materialize()
                .addValidationListener(model,"league")
                .addEventListener("change",function() {
                    model.setLeague(this.value.length===0?null:this.value);
                });
            form.elements['person-comments']
                .materialize()
                .addEventListener("change",function() {
                    model.setComments(this.value.length===0?null:this.value);
                });
            if(!update.hasClass("disabled")) {
                update.addEventListener("click", function(e)  {
                    e.preventDefault();
                    form.ready = true;
                    model.validate(model);
                    if(form.ready===true) {
                        if(model.getID() !== null && model.getID().length !== 0) {
                            app.Adaptor.Person.update(model,function(un) {
                                Materialize.toast("Person updated",2000);
                            });
                        }
                    } else {
                        Materialize.toast("Person data validation error",2000);
                    }
                    return false;
                });
            }
            if(!create.hasClass("disabled")) {
                create.addEventListener("click", function(e)  {
                    e.preventDefault();
                    form.ready = true;
                    model.validate(model);
                    if(form.ready===true) {
                        model.setID(null);
                        app.Adaptor.Person.create(model, function(un) {
                        Materialize.toast("Person created",2000);
                        });
                    } else {
                        Materialize.toast("Person data validation error",2000);
                    }
                    return false;
                });
            }
            search.addEventListener("click", function(e) {
                e.preventDefault();
                if(form.elements['person-fullname'].value.length !== 0 ) {
                    $('#persons-search-list-modal').openModal();
                    app.Adaptor.Persons.fetch({fn:form.elements['person-fullname'].value}, function(pers) {
                        var view = app.View.PersonsSearchListForm.extend({
                            elementId: "persons-search-list",
                            bind: function(el,pers) {
                                document.getElementById("persons-search-list-count").innerHTML = (pers.getPerson().length).toString();
                                $(el).find(".person-link-add-btn").on("click",function(e) {
	                                e.preventDefault();
	                                document.location = "#persons/"+this.getAttribute("data-id");
                                });
                            }
                        })
                        view.render(pers);
                    })
                } else {
                    Materialize.toast("You have to fill search string",2000);
                }
                return false;
            });
        }
    });
    
}(Happymeal,window.app));