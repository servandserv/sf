<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet
	xmlns="http://www.w3.org/1999/xhtml"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:html="http://www.w3.org/1999/xhtml"
	xmlns:res="urn:com:summerfields:Archive:Resources"
	xmlns:docs="urn:com:summerfields:Archive:Documents"
	xmlns:pers="urn:com:summerfields:Archive:Persons"
	xmlns:link="urn:com:summerfields:Archive:Links"
	xmlns:refs="urn:com:summerfields:Archive:Refs"
	xmlns:uns="urn:com:summerfields:Archive:Unions"
	xmlns:exsl="http://exslt.org/common"
	xmlns:wadlext="urn:wadlext"
	xmlns:ns="urn:namespace"
	extension-element-prefixes="exsl"
	exclude-result-prefixes="xsl html res pers link refs uns wadlext ns"
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

<xsl:variable name="ROOT" select="'../../'" />
<!--xsl:variable name="CDN" select="'../../images/'" /-->
<xsl:variable name="CDN" select="'http://servandserv.synology.me:8080/sfdev/images/SF'" />

<xsl:template match="uns:Union">
    <xsl:variable name="ID" select="uns:ID" />
    <xsl:variable name="DOCUMENTS" select="document(concat('../../api/sources/',uns:ID,'/documents'))/docs:Documents" />
    <html lang="en" xml:lang="en">
        <head>
            <title><xsl:value-of select="uns:name" /> | Summerfields</title>
            <xsl:call-template name="common-main-header" />
            <style type="text/css">
                <xsl:text disable-output-escaping="yes">
                .sf-grid &gt; div:first-child {
                    border-right:none;
                }
                .sf-grid &gt; div:first-child + div {
                }
                </xsl:text>
            </style>
        </head>
        <body>
        
            <div class="sf-grid">
                <div>
                    <!--img src="{$ROOT}images/defaultbackgroundimage.jpg" /-->
                    <img src="{$ROOT}images/SF_Logo_on_black_LG.png" />
                    <h4><xsl:value-of select="uns:name" /></h4>
                    <!--xsl:apply-templates select="." mode="left-panel" /-->
                    <p>You can search boys from Old Summerfieldians list by the studied year or by the part of name or your can choose both filters.</p>
                </div>
                <div>
                    <xsl:choose>
                        <xsl:when test="$DOCUMENTS/docs:Document">
                            <div class="sf-mosaic">
                                <xsl:apply-templates select="$DOCUMENTS/docs:Document" />
                            </div>
                        </xsl:when>
                        <xsl:otherwise>
                            <p>Oops! </p>
                        </xsl:otherwise>
                    </xsl:choose>
                </div>
                <div>
                    <xsl:call-template name="links">
                        <xsl:with-param name="from" select="'union'" />
                    </xsl:call-template>
                </div>
            </div>
            <script src="{$ROOT}js/material.min.js">;</script>
        </body>
    </html>
</xsl:template>

<xsl:template match="docs:Document">
    <div class="sf-flip">
        <input type="checkbox" />
        <img src="{$CDN}{docs:Page/docs:Obverse/docs:Large/docs:src}" />
        <div>
            <xsl:choose>
                <xsl:when test="docs:Page/docs:Reverse">
                    <xsl:attribute name="style">
                        <xsl:text>background:url(</xsl:text>
                        <xsl:value-of select="$ROOT" />
                        <xsl:text>images/</xsl:text>
                        <xsl:value-of select="docs:Page/docs:Reverse/docs:Large/docs:src" />
                        <xsl:text>) center no-repeat;background-size:contain;</xsl:text>
                    </xsl:attribute>
                </xsl:when>
                <xsl:otherwise>
                    <p>
                        <xsl:value-of select="docs:comments" disable-output-escaping="yes"/>
                    </p>
                </xsl:otherwise>
            </xsl:choose>
        </div>
        <div>
            <div>
                <i class="material-icons">autorenew</i>
                <a href="{$ROOT}api/documents/{docs:ID}"><i class="material-icons">forward</i></a>
                <span><xsl:value-of select="docs:year" /></span>
            </div>
        </div>
    </div>
</xsl:template>

</xsl:stylesheet>