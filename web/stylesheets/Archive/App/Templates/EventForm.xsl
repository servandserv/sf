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
	xmlns:evs="urn:com:summerfields:Archive:Events"
	xmlns:exsl="http://exslt.org/common"
	xmlns:wadlext="urn:wadlext"
	xmlns:ns="urn:namespace"
	extension-element-prefixes="exsl"
	exclude-result-prefixes="xsl html res pers docs uns link refs evs exsl wadlext ns"
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

<!--xsl:variable name="EVENTS-TYPES" select="document('../../../../schemas/Archive/Events.xsd')/xsd:schema" /-->

<xsl:template match="evs:Event">
    <xsl:variable name="event" select="." />
    <div>
    <div class="card-panel" style="position:fixed;max-width:300px;">
    <h5>Event form</h5>
    <form id="event-form" action="#" method="post" class="row">
        <input type="hidden" id="event-id" name="event-id" value="{evs:ID}" />
        <div class="input-field col s6">
            <input type="text" id="event-name" name="event-name" value="{evs:name}"/>
            <label for="event-name">Name</label>
        </div>
        <div class="input-field col s12">
            <select id="event-type" name="event-type" class="browser-default">
			    <option value="">Select type</option>
		        <!--xsl:for-each select="$EVENTS-TYPES/xsd:simpleType[@name='eventTypeType']/xsd:restriction/xsd:enumeration">
				    <option value="{@value}">
			            <xsl:if test="@value = $event/evs:type">
							<xsl:attribute name="selected">selected</xsl:attribute>
						</xsl:if>
					    <xsl:value-of select="xsd:annotation/xsd:appinfo/html:option" />
				    </option>
		        </xsl:for-each-->
			</select>
		</div>
		<div class="input-field col s6">
            <input type="text" id="event-dt" name="event-dt" value="{evs:dt}"/>
            <label for="event-dt">Date</label>
        </div>
        <div class="input-field col s12">
            <textarea id="event-comments" class="materialize-textarea" name="event-comments">
                <xsl:text>&#173;</xsl:text>
                <xsl:value-of select="evs:comments" disable-output-escaping="yes"  />
            </textarea>
            <label for="event-comments">Comments</label>
        </div>
        <div class="input-field col s12">
            <a id="event-update-btn" class="waves-effect waves-light btn teal darken-1" title="Update">Update</a>&#160;
            <a id="event-create-btn" class="waves-effect waves-light btn teal darken-1" title="Create new">Create</a>
        </div>
    </form>
    </div>
    </div>
</xsl:template>



</xsl:stylesheet>