;(function(h,app) {
    var doc;
    var view = h.XMLView.extend({
	    elementId: 'document-form-cont',
	    template: '/sfdev/stylesheets/Archive/App/Templates/DocumentForm.xsl',
	    events: {
	        "DocumentsLoaded": function(docs){
	            doc = docs.getDocument()[0] || h.Locator("Archive.Port.Adaptor.Data.Archive.Documents.Document");
	            this.render(doc.toXmlStr());
	        }
	    },
	    bind: function(el,data) {
	        //console.log(doc.toJSON());
	        $('document-type').material_select();
	        
	        var form = document.getElementById('document-form');
	        var s = document.getElementById('document-submit');
	        
	        // control elements listeners
	        form.elements['document-type'].addEventListener("change",function() {
                doc.setType(form.elements['document-type'].value===''?null:form.elements['document-type'].value);
            });
            form.elements['document-year'].addEventListener("change",function() {
                doc.setYear(form.elements['document-year'].value===''?null:form.elements['document-year'].value);
            });
            form.elements['document-published'].addEventListener("change",function() {
                doc.setPublished(form.elements['document-published'].checked?0:1);
            });
            form.elements['document-comments'].addEventListener("change",function() {
                doc.setType(form.elements['document-comments'].value===''?null:form.elements['document-comments'].value);
            });
            
            s.addEventListener("click", function(){
                form.ready = true;
                doc.validate(doc);
                if(form.ready) {
                    console.log(doc.toXmlStr());
                } else {
                    Materialize.toast("Form data validation error",2000);
                }
                return false;
            });
            
            // validation result events
            doc.subscribe("typeValidationErrorOccured",function(args) {
                form.elements['document-type'].addClass('form__select--wrong');
            });
            doc.subscribe("typeValidationSuccessOccured",function(args) {
                form.elements['document-type'].delClass('form__select--wrong');
            });
            doc.subscribe("yearValidationErrorOccured",function(args) {
                form.elements['document-year'].addClass('invalid');
            });
            doc.subscribe("yearValidationSuccessOccured",function(args) {
                form.elements['document-year'].delClass('invalid');
            });
            doc.subscribe("validationErrorOccured",function(ev,args) {
                form.ready = false;
            });
	        
	    }
    });
}(Happymeal,window.app));