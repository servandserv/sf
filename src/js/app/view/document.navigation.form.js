;(function(h,app) {
    
    var snumber = 0, max = 0;
    
    document.getElementById("document-fast-rewind").addEventListener("click",function(e) {
        e.preventDefault();
        var href = parseInt(snumber) - 10 < 0 ? 0 : parseInt(snumber) - 10;
        document.location = "#documents/"+(href).toString();
    });
        
    document.getElementById("document-rewind").addEventListener("click",function(e) {
        e.preventDefault();
        var href = parseInt(snumber) - 1 < 0 ? 0 : parseInt(snumber) - 1;
        document.location = "#documents/"+(href).toString();
    });
        
    document.getElementById("document-forward").addEventListener("click",function(e) {
        e.preventDefault();
        var href = parseInt(snumber) + 1 > max ? max : parseInt(snumber) + 1;
        document.location = "#documents/"+(href).toString();
    });
        
    document.getElementById("document-fast-forward").addEventListener("click", function(e) {
        e.preventDefault();
        var href = parseInt(snumber) + 10 > max ? max : parseInt(snumber) + 10;
        document.location = "#documents/"+(href).toString();
    });

    h.Mediator.subscribe("DocumentsLoaded", function(docs) {
        var refs = docs.getRef();
        for(var i=0;i<refs.length;i++) {
            if(refs[i].getRel() == "snumber") {
                snumber = refs[i].getHref();
            } else if(refs[i].getRel() == "max") {
                max = refs[i].getHref();
            }
        }
    });
}(Happymeal,window.app));