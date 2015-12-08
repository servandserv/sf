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

<xsl:variable name="DOCUMENT-TYPES" select="document('../../../../schemas/Archive/Documents.xsd')/xsd:schema" />

<xsl:template match="docs:Document">
    <xsl:variable name="document" select="." />
    <div>
    <form id="document-form" action="#" method="post" class="row">
        <div class="input-field col s12">
            <select id="document-type" name="document-type" class="browser-default">
			    <option value="">Select type</option>
		        <xsl:for-each select="$DOCUMENT-TYPES/xsd:simpleType[@name='documentTypeType']/xsd:restriction/xsd:enumeration">
				    <option value="{@value}">
			            <xsl:if test="@value = $document/docs:type">
							<xsl:attribute name="selected">selected</xsl:attribute>
						</xsl:if>
					    <xsl:value-of select="xsd:annotation/xsd:appinfo/html:option" />
				    </option>
		        </xsl:for-each>
			</select>
		</div>
		<div class="input-field col s6">
            <input type="text" id="document-year" name="document-year" value="{docs:year}"/>
            <label for="document-year">Year</label>
        </div>
        <div class="input-field col s6">
            <input type="checkbox" id="document-published" name="document-published">
                <xsl:if test="docs:published = '1'">
                    <xsl:attribute name="checked">checked</xsl:attribute>
                </xsl:if>
            </input>
            <label for="document-published">Published</label>
        </div>
        <div class="input-field col s12">
            <textarea id="document-comments" class="materialize-textarea" name="document-comments">
                <xsl:text>&#173;</xsl:text><xsl:value-of select="docs:comments" />
            </textarea>
            <label for="document-comments">Comments</label>
        </div>
        <div class="input-field col s12">
            <a id="document-submit" class="waves-effect waves-light btn teal darken-1">Update</a>
        </div>
    </form>
    </div>
</xsl:template>

</xsl:stylesheet>