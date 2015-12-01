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

<xsl:include href="Common.xsl" />

<xsl:variable name="ROOT" select="'../'" />

<xsl:template match="events:Events">
    <html lang="en" xml:lang="en">
        <head>
            <title>Timeline | Summerfields</title>
            <xsl:call-template name="common-main-header" />
        </head>
        <body>
            <div class="sf-grid">
                <div>
                    <h4>History archive</h4>
                </div>
                <div>
                    <img src="{$ROOT}images/timeline.svg" style="width:100%;" />
                </div>
                <div>
                    <xsl:call-template name="links">
                        <xsl:with-param name="from" select="'home'" />
                    </xsl:call-template>
                    <ul style="list-style:none;">
                        <li><a href="">19th century</a></li>
                        <li><a href="">1900s</a></li>
                        <li><a href="">WWI</a></li>
                        <li><a href="">1920s</a></li>
                        <li><a href="">1930s</a></li>
                        <li><a href="">WWII</a></li>
                        <li><a href="">1950s</a></li>
                        <li><a href="">1960s</a></li>
                        <li><a href="">1970s</a></li>
                        <li><a href="">1980s</a></li>
                        <li><a href="">1990s</a></li>
                        <li><a href="">21 century</a></li>
                    </ul>
                </div>
            </div>
            <script src="{$ROOT}js/material.min.js">;</script>
        </body>
    </html>
</xsl:template>

</xsl:stylesheet>