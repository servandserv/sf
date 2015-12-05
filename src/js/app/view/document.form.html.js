;(function(h,app) {
	    var temp = '<form class="row">'+
			'<input type="hidden" id="document-id" value="<%= document.ID %>" />'+
				'<div class="input-field col s12">'+
					'<label>&#173;</label>'+
					'<select id="document-type" class="browser-default">'+
						'<option value="" disabled <% if ( !document.type ) { %> selected  <% } %>>Select type</option>'+
						'<option value="1" <% if ( document.type == 1 ) { %> selected  <% } %>>Individual</option>'+
						'<option value="2" <% if ( document.type == 2 ) { %> selected  <% } %>>Group</option>'+
						'<option value="3" <% if ( document.type == 3 ) { %> selected  <% } %>>Buildings</option>'+
					'</select>'+
				'</div>'+
				'<div class="input-field col s6">'+
					'<input id="document-year" type="text" value="<%= document.year %>" required>'+
					'<label for="document-year">Year</label>'+
				'</div>'+
				'<div class="input-field col s6">'+
						'<input id="document-published" type="checkbox"  <% if( document.published == 1 ) { %>checked="checked"<% } %> />'+
						'<label for="document-published">Published</label>'+
				'</div>'+
				'<div class="input-field col s12">'+
					'<textarea id="document-comments" class="materialize-textarea" required><%= document.comments %></textarea>'+
					'<label>Comments</label>'+
				'</div>'+
				'<div class="col s12">'+
					'<a id="document-submit" class="waves-effect waves-light btn red darken-2">Submit</a>'+
				'</div>'+
		'</form>';
	var view = h.HTMLView.extend({
	    elementId: 'document-form-cont',
	    template: _.template(temp),
	    events: {
	        "DocumentsLoaded": function(docs) {
	            var doc = docs.getDocument()[0] || h.Locator("Archive.Port.Adaptor.Data.Archive.Documents.Document");
	            this.render(doc.toJSON());
	        }
	    },
	    bind: function(el,data) {
		    /*document.getElementById('digest-select-id').addEventListener("change", function(e) {
			    DigestsHTTPAdaptor.findById(this.value);
		    },true);*/
	    }
    });
}(Happymeal,window.app));