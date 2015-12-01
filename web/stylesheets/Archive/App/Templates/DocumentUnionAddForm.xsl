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

<xsl:template match="uns:Unions">
    <xsl:variable name="unions" select="." />
    <div>
    <form action="#" method="post" class="row">
        <div class="input-field col s9">
            <select id="document-union" name="document-union-type" class="browser-default">
			    <option value="">Select type</option>
		        <xsl:for-each select="uns:Union">
				    <option value="{uns:ID}"><xsl:value-of select="uns:name" /></option>
		        </xsl:for-each>
			</select>
		</div>
        <div class="input-field col s3">
             <a class="btn-floating waves-effect waves-light red darken-2"><i class="material-icons">add</i></a>
        </div>
    </form>
    </div>
</xsl:template>

</xsl:stylesheet>