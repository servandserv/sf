<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet
	xmlns="http://www.w3.org/1999/xhtml"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:html="http://www.w3.org/1999/xhtml"
	xmlns:res="urn:com:summerfields:Archive:Resources"
	xmlns:pers="urn:com:summerfields:Archive:Persons"
	xmlns:link="urn:com:summerfields:Archive:Links"
	xmlns:refs="urn:com:summerfields:Archive:Refs"
	xmlns:sf="urn:com:summerfields"
	xmlns:exsl="http://exslt.org/common"
	xmlns:wadlext="urn:wadlext"
	xmlns:ns="urn:namespace"
	extension-element-prefixes="exsl"
	exclude-result-prefixes="xsl html sf res pers link refs wadlext ns"
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

<xsl:include href="Common.xsl" />
	
<xsl:template match="pers:Person">
    <html>
        <head>
            <xsl:call-template name="common-header" />
            <script src="js/Happymeal.min.js">;</script>
            <script src="js/Archive.Port.Adaptor.Data.min.js">;</script>
        </head>
        <body>
            <!-- Always shows a header, even in smaller screens. -->
            <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
                <header class="mdl-layout__header">
                    <div class="mdl-layout__header-row">
                        <!-- Title -->
                        <span class="mdl-layout-title">SummerFields Admin panel</span>
                        <!-- Add spacer, to align navigation to the right -->
                        <div class="mdl-layout-spacer">&#173;</div>
                        <!-- Navigation. We hide it in small screens. -->
                        <nav class="mdl-navigation mdl-layout--large-screen-only">
                            <a class="mdl-navigation__link" href="">Person</a>
                            <a class="mdl-navigation__link" href="">Team</a>
                            <a class="mdl-navigation__link" href="">Document</a>
                        </nav>
                    </div>
                </header>
                <!--div class="mdl-layout__drawer">
                    <span class="mdl-layout-title">Title</span>
                    <nav class="mdl-navigation">
                        <a class="mdl-navigation__link" href="">Link</a>
                        <a class="mdl-navigation__link" href="">Link</a>
                        <a class="mdl-navigation__link" href="">Link</a>
                        <a class="mdl-navigation__link" href="">Link</a>
                    </nav>
                </div-->
                <main class="mdl-layout__content">
                    <div class="mdl-grid">
                        <xsl:apply-templates select="." mode="edit-form" />
                    </div>
                </main>
            </div>
            <script src="js/material.min.js">;</script>
            
        </body>
    </html>
</xsl:template>

<xsl:template match="pers:Person" mode="edit-form">
    <div class="mdl-cell mdl-cell--4-col mdl-cell--6-col-tablet mdl-cell--12-col-phone">
        <h3 style="text-align:center;">Person edit form</h3>
        <form id="Person" action="#"  onsubmit="return false;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" id="fullName" name="fullName" value="{pers:fullName}" />
                <label class="mdl-textfield__label" for="fullName">Full Name</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" id="lastName" name="lastName" value="{pers:lastName}" />
                <label class="mdl-textfield__label" for="lastName">Surname</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <select name="league" id="league">
                    <option value="">Select league</option>
                    <option value="Case">Case</option>
                    <option value="ewewe">asasaa</option>
                </select>
            </div>
            <button id="s">Ok</button>
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
    </div>
</xsl:template>

<xsl:template match="link:Links">
    
</xsl:template>

</xsl:stylesheet>