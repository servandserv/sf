;(function(h,app) {
    
    /**
    *
    * All events collection list
    * initialized on global event 'EventsLoaded'
    * - manage EventForm initialization
    */
    
    var eventFormView = app.View.EventForm.extend({});
    
    var eventFormRender = function(ev,v) {
        ev.subscribe("EventsCollectionSpoiled", function(evnt,ev) {
            setTimeout(function() {
                app.Adaptor.Events.fetch( function(evs) {
                    h.Mediator.publish("EventsLoaded",evs);
                });
            },500);
        });
        eventFormView.render(ev);
    }
    
    app.View.EventsList = h.SXSLTView.extend({
	    elementId: 'events-list-cont',
	    /*template: '/sfdev/stylesheets/Archive/App/Templates/EventsListForm.xsl',*/
	    template: 'xsltview.php?xsltDocument=App/Templates/EventsListForm.xsl',
	    events: {
	        // render on EventsLoaded global event
	        "EventsLoaded": function(evs) {
	            this.render(evs);
	            var ev = h.Locator("Archive.Port.Adaptor.Data.Archive.Events.Event");
	            eventFormRender(ev,this);
	        }
	    },
	    bind: function(el,model) {
	        var self = this;
	        var selected;
	        $(el).find(".event-delete-modal-agree-btn").on("click",function(e) {
	            e.preventDefault();
	            var ev = h.Locator("Archive.Port.Adaptor.Data.Archive.Events.Event");
	            ev.setID(selected);
	            app.Adaptor.Event.kill(ev, function(ev) {
                    Materialize.toast("Event deleted",2000);
                    app.Adaptor.Events.fetch(function(evs) {
                        h.Mediator.publish("EventsLoaded",evs);
                    });
                });
	        });
	        $(el).find(".events-select-event-btn").on("click",function(e) {
	            e.preventDefault();
	            app.Adaptor.Event.fetchById(this.getAttribute("data-id"),function(ev) {
	                eventFormRender(ev,self);
	            });
	        });
	        $(el).find(".events-delete-event-btn").on("click",function(e) {
	            e.preventDefault();
	            selected = this.getAttribute("data-id");
	            $('#event-delete-modal').openModal();
	        });
	    }
    });
}(Happymeal,window.app));