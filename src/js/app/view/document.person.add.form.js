;(function(h,app) {
    var d;
    
    var view = h.XMLView.extend({
	    elementId: 'document-persons-person-form-cont',
	    template: '/sfdev/stylesheets/Archive/App/Templates/DocumentPersonAddForm.xsl',
	    events: {
	        "DocumentLoaded": function(doc) {
	            this.render(doc);
	        }
	    },
	    bind: function(el,model) {
	        var form = document.getElementById("document-persons-add-form");
	        var search = form.querySelector(".document-persons-search-btn");
	        
	        var link = h.Locator("Archive.Port.Adaptor.Data.Archive.Links.Link");
	        
	        form.elements['document-persons-search']
	            .materialize()
                
            search.addEventListener("click", function(e) {
                e.preventDefault();
                if(form.elements['document-persons-search'].value.length !== 0 ) {
                    $('#persons-search-list-modal').openModal();
                    app.Adaptor.Persons.fetch({fn:form.elements['document-persons-search'].value}, function(pers) {
                        var view = app.View.PersonsSearchListForm.extend({
                            elementId: "persons-search-list",
                            bind: function(el,pers) {
                                document.getElementById("persons-search-list-count").innerHTML = (pers.getPerson().length).toString();
                                $(el).find(".person-link-add-btn").on("click",function(e) {
	                                e.preventDefault();
	                                $('#persons-search-list-modal').closeModal();
	                                var link = h.Locator("Archive.Port.Adaptor.Data.Archive.Links.Link");
	                                link.setSource(this.getAttribute("data-id"));
	                                link.setDestination(model.getID());
                                    link.setType("person");
                                    link.setDtStart(model.getYear());
                                    link.setDtEnd(model.getYear());
                                    app.Adaptor.Link.create(link,function(link) {
                                        Materialize.toast("Link create", 2000);
                                        model.publish("DocumentPersonsCollectionSpoiled",model);
                                    });
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