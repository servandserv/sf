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
                    <img src="{$ROOT}images/SF_Logo_on_black_LG.png" />
                    <p>Founded in 1864, Summer Fields is a full-boarding and day school for boys aged 8-13. It is ideally situated in a prime location in the heart of Oxford and within easy access to London and several airports. The school benefits from 70 acres of beautiful grounds and the boys take full advantage of this exceptionally pleasant environment.</p>
                    <p>At Summer Fields we nurture the boys academically, morally, spiritually and culturally to develop their confidence and sense of independence. In doing so, we help them to discover talents, interests and values that not only prepare them for the next stage of their education, but which stay with them for life.</p>
                </div>
                <div>
                    <img src="{$ROOT}images/defaultbackgroundimage.jpg" style="width:100%;" />
                    <img src="{$ROOT}images/timeline.svg" style="width:100%;" />
                </div>
                <div>
                    <xsl:call-template name="links">
                        <xsl:with-param name="from" select="'home'" />
                    </xsl:call-template>
                    <ul class="sf-accordion">
                        <li>
                            <input id="timeline-acco-last" type="checkbox" tabindex="1"/>
                            <label for="timeline-acco-last">Timeline<i class="material-icons">keyboard_arrow_down</i></label>
                                <ul class="sf-collection">
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
                        </li>
                    </ul>
                </div>
            </div>
            <script src="{$ROOT}js/material.min.js">;</script>
        </body>
    </html>
</xsl:template>

</xsl:stylesheet>