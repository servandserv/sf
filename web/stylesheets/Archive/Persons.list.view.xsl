<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet
	xmlns="http://www.w3.org/1999/xhtml"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:html="http://www.w3.org/1999/xhtml"
	xmlns:res="urn:com:summerfields:Archive:Resources"
	xmlns:pers="urn:com:summerfields:Archive:Persons"
	xmlns:link="urn:com:summerfields:Archive:Links"
	xmlns:refs="urn:com:summerfields:Archive:Refs"
	xmlns:exsl="http://exslt.org/common"
	xmlns:wadlext="urn:wadlext"
	xmlns:ns="urn:namespace"
	extension-element-prefixes="exsl"
	exclude-result-prefixes="xsl html res pers link refs wadlext ns"
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
	
<xsl:template match="pers:Persons">
    <html>
        <head>
            <xsl:call-template name="common-header" />
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
                    <h3 style="text-align:center;">Persons list</h3>
                    <div class="mdl-grid">
                        <xsl:apply-templates select="pers:Person" />
                    </div>
                </main>
            </div>
            <script src="js/material.min.js">;</script>
        </body>
    </html>
</xsl:template>

<xsl:template match="pers:Person">
    <div class="mdl-cell mdl-cell--4-col mdl-cell--6-col-tablet mdl-cell--12-col-phone" style="text-align:center;">
        <a href="person.edit.view.php?ID={pers:ID}"><xsl:value-of select="pers:fullName" />, <xsl:value-of select="pers:DOB" /></a>
    </div>
</xsl:template>

</xsl:stylesheet>