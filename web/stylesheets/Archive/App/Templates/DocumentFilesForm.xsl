<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet
	xmlns="http://www.w3.org/1999/xhtml"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:xsd="http://www.w3.org/2001/XMLSchema"
	xmlns:html="http://www.w3.org/1999/xhtml"
	xmlns:res="urn:com:summerfields:Archive:Resources"
	xmlns:pers="urn:com:summerfields:Archive:Persons"
	xmlns:docs="urn:com:summerfields:Archive:Documents"
	xmlns:uns="urn:com:summerfields:Archive:Unions"
	xmlns:link="urn:com:summerfields:Archive:Links"
	xmlns:refs="urn:com:summerfields:Archive:Refs"
	xmlns:exsl="http://exslt.org/common"
	xmlns:wadlext="urn:wadlext"
	xmlns:ns="urn:namespace"
	extension-element-prefixes="exsl"
	exclude-result-prefixes="xsl html res pers docs uns link refs exsl wadlext ns"
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

<xsl:template match="docs:Document">
    <div>
        <xsl:apply-templates select="docs:Page" />
    </div>
</xsl:template>

<xsl:template match="docs:Page">
    <div class="card">
		<div id="{docs:Obverse/docs:name}_card" class="card-image">
			<img id="{docs:Obverse/docs:name}_img" src="images/{docs:Obverse/docs:Large/docs:src}" alt="{position()}" />
			<!--span class="card-title"><xsl:value-of select="docs:Obverse/docs:Large/docs:src" /></span-->
		</div>
		<div class="card-content">
			<span class="card-title activator grey-text text-darken-4">
			    File path: <xsl:value-of select="parent::*/docs:path" />
			    <xsl:if test="docs:Reverse">
			        <i class="material-icons">more_vert</i>
			    </xsl:if>
			</span>
		</div>
		<div class="card-action">
		    <a href="javascript:void(0);" class="show-detected-faces">Show faces</a>
			<a href="javascript:void(0);" class="hide-detected-faces">Hide faces</a>
		</div>
		<xsl:if test="docs:Reverse">
			<div class="card-reveal" style="padding:0;">
				<span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i></span>
				<div class="card-image" style="width:100%;height:auto;margin:2em 0 0 0;">
					<img src="images/{docs:Reverse/docs:large/docs:src}" />
				</div>
			</div>
		</xsl:if>
	</div>
</xsl:template>

</xsl:stylesheet>