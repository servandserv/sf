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

<xsl:variable name="UNIONS-TYPES" select="document('../../../../schemas/Archive/Unions.xsd')/xsd:schema" />

<xsl:template match="uns:Union">
    <xsl:variable name="union" select="." />
    <div>
    <form id="union-form" action="#" method="post" class="row">
        <input type="hidden" id="union-id" name="union-id" value="{uns:ID}" />
        <div class="input-field col s6">
            <input type="text" id="union-name" name="union-name" value="{uns:name}"/>
            <label for="union-name">Name</label>
        </div>
        <div class="input-field col s12">
            <select id="union-type" name="union-type" class="browser-default">
			    <option value="">Select type</option>
		        <xsl:for-each select="$UNIONS-TYPES/xsd:simpleType[@name='unionTypeType']/xsd:restriction/xsd:enumeration">
				    <option value="{@value}">
			            <xsl:if test="@value = $union/uns:type">
							<xsl:attribute name="selected">selected</xsl:attribute>
						</xsl:if>
					    <xsl:value-of select="xsd:annotation/xsd:appinfo/html:option" />
				    </option>
		        </xsl:for-each>
			</select>
		</div>
		<div class="input-field col s6">
            <input type="text" id="union-founded" name="union-founded" value="{uns:founded}"/>
            <label for="union-founded">Founded</label>
        </div>
        <div class="input-field col s12">
            <textarea id="union-comments" class="materialize-textarea" name="union-comments">
                <xsl:text>&#173;</xsl:text><xsl:value-of select="uns:comments" />
            </textarea>
            <label for="union-comments">Comments</label>
        </div>
        <div class="input-field col s12">
            <a id="union-update-btn" class="waves-effect waves-light btn red darken-2" title="Update">Update</a>&#160;
            <a id="union-create-btn" class="waves-effect waves-light btn red darken-2" title="Create new">Create</a>
        </div>
    </form>
    </div>
</xsl:template>

</xsl:stylesheet>