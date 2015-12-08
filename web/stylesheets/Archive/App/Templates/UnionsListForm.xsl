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

<xsl:template match="uns:Unions">
    <xsl:variable name="unions" select="." />
    <div>
        <ul class="collection with-header">
            <!--li class="collection-header">
                <h4>
                    Unions list
                </h4>
            </li-->
            <xsl:for-each select="$UNIONS-TYPES/xsd:simpleType[@name='unionTypeType']/xsd:restriction/xsd:enumeration">
                <xsl:sort select="@value" />
                <xsl:variable name="type" select="@value" />
                <li class="collection-header">
                    <h4>
                        <xsl:value-of select="xsd:annotation/xsd:appinfo/html:option" />
                    </h4>
                </li>
                <xsl:for-each select="$unions/uns:Union[uns:type = $type]">
                    <li class="collection-item">
                      <div>
                        <xsl:value-of select="uns:name" />
                        <a href="#unions" title="Edit union" class="secondary-content unions-select-union-btn blue-text text-darken-2" data-id="{uns:ID}"><i class="material-icons">info</i></a>
                        <a href="#unions" title="Delete union" class="secondary-content unions-delete-union-btn red-text text-darken-2" data-id="{uns:ID}"><i class="material-icons">remove_circle</i></a>
                        </div>
                    </li>
                </xsl:for-each>
            </xsl:for-each>
        </ul>
        <!-- Modal Structure -->
        <div id="union-delete-modal" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4 class="red-text text-darken-2">Are you shure?</h4>
                <h5>You are going to delete union!</h5>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat union-delete-modal-agree-btn">Agree</a>
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat union-delete-modal-disagree-btn">Go away</a>
            </div>
        </div>
    </div>
</xsl:template>

</xsl:stylesheet>