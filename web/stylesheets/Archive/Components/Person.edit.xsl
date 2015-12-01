<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet
	xmlns="http://www.w3.org/1999/xhtml"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:html="http://www.w3.org/1999/xhtml"
	xmlns:res="urn:com:summerfields:Archive:Resources"
	xmlns:pers="urn:com:summerfields:Archive:Persons"
	xmlns:events="urn:com:summerfields:Archive:Events"
	xmlns:link="urn:com:summerfields:Archive:Links"
	xmlns:refs="urn:com:summerfields:Archive:Refs"
	xmlns:exsl="http://exslt.org/common"
	xmlns:wadlext="urn:wadlext"
	xmlns:ns="urn:namespace"
	extension-element-prefixes="exsl"
	exclude-result-prefixes="xsl html res pers events link refs wadlext ns"
	version="1.0">

<xsl:output
	media-type="application/xhtml+xml"
	method="xml"
	encoding="UTF-8"
	indent="yes"
	omit-xml-declaration="no"
	doctype-public="-//W3C//DTD XHTML 1.1//EN"
	doctype-system="http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd" />
	
<xsl:strip-space elements="*"/>

<xsl:template match="pers:Person">
    <form class="col s12 l4">
        <div class="row">
            <div class="input-field col l4 s12">
                <input id="yearEntered" type="text"/>
                <label for="yearEntered">Year Entered</label>
            </div>
            <div class="input-field col l4 s12">
                <input id="yearLeft" type="text"/>
                <label for="yearLeft">Year Left</label>
            </div>
            <div class="input-field col l4 s12">
                <input id="dob" type="text"/>
                <label for="dob">DOB</label>
            </div>
            <div class="input-field col l4 s6">
                <input id="rollNo" type="text" />
                <label for="rollNo">RollNo</label>
            </div>
            <div class="input-field col l4 s6">
                <input id="no" type="text" />
                <label for="no">No</label>
            </div>
            <div class="input-field col l4 s12">
                <select class="browser-default">
                    <option value="" disabled selected>League</option>
                    <option value="Maclaren">Maclaren</option>
                    <option value="Case">Case</option>
                    <option value="Congreve">Congreve</option>
                    <option value="Moseley">Moseley</option>
                </select>
            </div>
            <div class="input-field col s12">
                <input id="fullName" type="text"/>
                <label for="fullName">Full Name</label>
            </div>
            <div class="input-field col l6 s12">
                <input id="lastName" type="text"/>
                <label for="lastName">Last Name</label>
            </div>
                <div class="input-field col l6 s12">
                                    <input id="firstName" type="text"/>
                                    <label for="firstName">First Name</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="middleNames" type="text" />
                                    <label for="middleNames">Middle Names</label>
                                </div>
                                <div class="input-field col l4 s12">
                                    <input id="initials" type="text" />
                                    <label for="initials">Initials</label>
                                </div>
                                <div class="input-field col l4 s6">
                                    <input type="checkbox" id="Esq" />
                                    <label for="esq">Esq</label>
                                </div>
                                <div class="input-field col l4 s6">
                                    <input type="checkbox" id="deceased" />
                                    <label for="deceased">Deceased</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <a class="waves-effect waves-light btn-large">Save</a>&#160;
                                    <a class="waves-effect waves-light btn-large">Search</a>
                                </div>
                            </div>
                        </form>
    <script type="text/javascript">
            (function(m){
                var form = document.getElementById("Person");
                var sub = document.getElementById("s");
                
                // events bindings
                m.subscribe("leagueValidationErrorOccured",function(args) {
                    form.elements['league'].style.background = "red";
                });
                m.subscribe("leagueValidationSuccessOccured",function(args) {
                    form.elements['league'].style.background = null;
                });
                m.subscribe("validationErrorOccured",function(ev,args) {
                    form.ready = false;
                });
                s.addEventListener("click", function(){
                    form.ready = true;
                    m.validate(m);
                    if(form.ready) {
                        console.log(m.toXmlStr());
                        console.log(form.ready);
                    }
                    return false;
                });
                
                // change values listeners
                form.elements['fullName'].addEventListener("change",function() {
                    m.setFullName(form.elements['fullName'].value===''?null:form.elements['fullName'].value);
                });
                form.elements['lastName'].addEventListener("change",function() {
                    m.setFullName(form.elements['lastName'].value===''?null:form.elements['lastName'].value);
                });
                form.elements['league'].addEventListener("change",function() {
                    m.setLeague(form.elements['league'].value===''?null:form.elements['league'].value);
                });
                
                m.setFullName(form.elements['fullName'].value===''?null:form.elements['fullName'].value);
                m.setFullName(form.elements['lastName'].value===''?null:form.elements['lastName'].value);
                m.setLeague(form.elements['league'].value===''?null:form.elements['league'].value);
                
                console.log(m.toXmlStr());
                
            }(Happymeal.Locator("Archive.Port.Adaptor.Data.Archive.Persons.Person")));
        </script>
</xsl:template>

</xsl:stylesheet>