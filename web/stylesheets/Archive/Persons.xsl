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

<xsl:variable name="ROOT" select="'../'" />

<xsl:template match="pers:Persons">
    <html lang="en" xml:lang="en">
        <head>
            <title>Old Summerfieldians | Summerfields</title>
            <xsl:call-template name="common-main-header" />
        </head>
        <body>
        
            <div class="sf-grid">
                <div>
                    <!--img src="{$ROOT}images/defaultbackgroundimage.jpg" /-->
                    <h4>Old Summerfieldians</h4>
                    <!--xsl:apply-templates select="." mode="left-panel" /-->
                    <p>You can search boys from Old Summerfieldians list by the studied year or by the part of name or your can choose both filters.</p>
                    <form action="persons" method="GET">
                        <div style="">
                            <div style="">
                                <input type="text" name="in" value="{refs:Ref[refs:rel='in']/refs:href}" placeholder="Studied in ..." title="Studied in"/>
                            </div>
                            <div style="">
                                <input type="text" name="fn" value="{refs:Ref[refs:rel='fn']/refs:href}" placeholder="Name contains ..." title="Name contains"/>
                            </div>
                        </div>
                        <div>
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit">SEARCH</button>
                        </div>
                    </form>
                </div>
                <div>
                    <div class="mdl-grid">
                        <xsl:apply-templates select="pers:Person" />
                    </div>
                </div>
                <div>
                    <xsl:call-template name="links">
                        <xsl:with-param name="from" select="'persons'" />
                    </xsl:call-template>
                </div>
            </div>
            <script src="{$ROOT}js/material.min.js">;</script>
        </body>
    </html>
</xsl:template>

<xsl:template name="rrr">
    <html>
        <body>
        <div class="mdl-grid mdl-grid--no-spacing">
            <div class="mdl-cell mdl-cell--3-col mdl-cell--stretch" 
                style="background:url({$ROOT}images/SF_Logo_on_black_LG.png) #202020 top center no-repeat;border-right:solid 3px rgb(255,10,0);background-size:contain;">
                <p style="color:white;margin-top:10rem;text-align:center;"><small>Mens sana in corpore sano</small></p>
                <p style="">
                    <img src="{$ROOT}images/defaultbackgroundimage.jpg" style="width:100%;" />
                    <h4>Old Summerfieldians</h4>
                </p>
                
                <p style="color:white;padding:8px;font-weight:300;">
                    At Summer Fields we aim to create an interest, a curiosity and an enthusiasm in all that we do. We find that by stimulating the boys at an early age the interests they discover when young often remain with them throughout their lives. 
                </p>
                
            </div>
            <div class="mdl-cell mdl-cell--stretch mdl-cell--7-col" 
                style="padding:16px;">
                
                <form action="persons" method="GET" style="padding: 16px;">
                        <span>Search string: </span>
                        <input type="text" name="search" value="{refs:Ref[refs:rel='search']/refs:href}" />&#160;
                        <!-- Colored mini FAB button -->
                        <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored" type="submit">
                            <i class="material-icons">search</i>
                        </button>
                    </form>
                <div class="mdl-grid">
                    <xsl:apply-templates select="pers:Person" />
                </div>
            </div>
            <div class="mdl-cell mdl-cell--stretch mdl-cell--2-col"
                style="background: #202020;color:white;opacity:0.5;padding:16px 0">
                <ul style="list-style:none;">
                    <li><a href="{$ROOT}api/timeline">Timeline</a></li>
                    <li><a href="">Link 2</a></li>
                    <li><a href="">Link 3</a></li>
                    <li><a href="">Link 4</a></li>
                </ul>
            </div> 
        </div>
        <script src="{$ROOT}js/material.min.js">;</script>

        </body>
    </html>
</xsl:template>

<xsl:template match="pers:Person">
    <div class="mdl-cell mdl-cell--6-col">
        <a href="person.edit.view.php?ID={pers:ID}">
            <xsl:value-of select="pers:fullName" />
            <xsl:text> (</xsl:text>
            <xsl:value-of select="substring(pers:DOB,1,4)" />
            <xsl:text> - </xsl:text>
            <xsl:if test="pers:deceased='1'">?</xsl:if>
            <xsl:text>), SF </xsl:text>
            <xsl:value-of select="link:Link/link:dtStart" /> - <xsl:value-of select="link:Link/link:dtEnd" />
        </a>
        <!--br/>
        <sup>
            <xsl:if test="not(link:Link/link:dtStart = '')">entered: <xsl:value-of select="link:Link/link:dtStart" />&#160;</xsl:if>
            <xsl:if test="not(link:Link/link:dtEnd = '')">left: <xsl:value-of select="link:Link/link:dtEnd" />&#160;</xsl:if>
            <xsl:if test="not(pers:rollNo = '')">rollNo: <xsl:value-of select="pers:rollNo" /></xsl:if>
        </sup-->
    </div>
</xsl:template>

<xsl:template match="pers:DOB" mode="date">
    <xsl:if test="string-length(.) = 10">
        <xsl:text>, </xsl:text>
        <xsl:value-of select="substring(.,9,2)" />/<xsl:value-of select="substring(.,6,2)" />/<xsl:value-of select="substring(.,1,4)" />
    </xsl:if>
</xsl:template>


</xsl:stylesheet>