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

<xsl:variable name="EVENTS-TYPES" select="document('../../../../schemas/Archive/Events.xsd')/xsd:schema" />

<xsl:template match="evs:Events">
    <xsl:variable name="events" select="." />
    <div>
        <ul class="sf-accordion">
            <xsl:for-each select="$EVENTS-TYPES/xsd:simpleType[@name='eventTypeType']/xsd:restriction/xsd:enumeration">
                <xsl:variable name="type" select="@value" />
                <li>
                    <input type="checkbox" />
                    <i class="material-icons">keyboard_arrow_up</i>
                    <i class="material-icons">keyboard_arrow_down</i>
                    <div><xsl:value-of select="xsd:annotation/xsd:appinfo" /></div>
                    <div>&#173;
                    <xsl:if test="$events/evs:Event[evs:type=$type]">
                    <ul class="collection">
                        <xsl:for-each select="$events/evs:Event[evs:type=$type]">
                        <li class="collection-item">
                            <div>
                                <xsl:value-of select="evs:name" />
                                <a href="javascript:void(0);" title="Edit event" 
                                    class="secondary-content events-select-event-btn blue-text text-darken-2" data-id="{evs:ID}">
                                    <i class="material-icons">info</i>
                                </a>
                                <a href="javascript:void(0);" title="Delete event" 
                                    class="secondary-content events-delete-event-btn red-text text-darken-2" data-id="{evs:ID}">
                                    <i class="material-icons">remove_circle</i>
                                </a>
                            </div>
                        </li>
                        </xsl:for-each>
                    </ul>
                    </xsl:if>
                    </div>
                </li>
            </xsl:for-each>
        </ul>
        <!-- Modal Structure -->
        <div id="event-delete-modal" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4 class="red-text text-darken-2"><i class="material-icons">warning</i> Attention!</h4>
                <h5>You are going to delete event and it all links with other resources, be careful!</h5>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0);" class="modal-action modal-close waves-effect waves-red btn-flat event-delete-modal-agree-btn">Agree</a>
                <a href="javascript:void(0);" class="modal-action modal-close waves-effect waves-green btn-flat event-delete-modal-disagree-btn">Go away</a>
            </div>
        </div>
    </div>
</xsl:template>

</xsl:stylesheet>