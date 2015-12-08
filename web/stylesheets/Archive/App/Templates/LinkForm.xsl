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

<xsl:template match="link:Link">
    <xsl:variable name="link" select="." />
    <div>
        <h4>Link</h4>
    <form id="link-form" action="#" method="post" class="row">
        <input type="hidden" id="link-id" name="link-id" value="{link:ID}" />
        <input type="hidden" id="link-source" name="link-source" value="{link:source}" />
        <input type="hidden" id="link-destination" name="link-destination" value="{link:destination}" />
        <div class="input-field col s6">
            <input type="text" id="link-dtstart" name="link-dtstart" value="{link:dtStart}"/>
            <label for="link-dtstart">Year from</label>
        </div>
        <div class="input-field col s6">
            <input type="text" id="link-dtend" name="link-dtend" value="{link:dtEnd}"/>
            <label for="link-dtend">Year to</label>
        </div>
        <div class="input-field col s12">
            <textarea id="link-comments" class="materialize-textarea" name="link-comments">
                <xsl:text>&#173;</xsl:text><xsl:value-of select="link:comments" />
            </textarea>
            <label for="link-comments">Comments</label>
        </div>
        <div class="input-field col s12">
            <a id="link-save-btn" class="waves-effect waves-light btn teal darken-1" title="Save">Save</a>&#160;
            <a id="link-del-btn" class="waves-effect waves-light btn red darken-2" title="Delete">Delete</a>
        </div>
    </form>
    </div>
</xsl:template>

</xsl:stylesheet>