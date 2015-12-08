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
        <ul class="collection">
            <xsl:for-each select="uns:Union">
                <li class="collection-item">
                    <div>
                        <xsl:value-of select="uns:name" />
                        <a href="javascript:void(0);" class="secondary-content person-union-link-info-btn blue-text text-darken-2" data-id="{link:Link/link:ID}">
                            <i class="material-icons">info</i>
                        </a>
                    </div>
                </li>
            </xsl:for-each>
        </ul>
        <!-- Modal Structure -->
        <div id="person-union-link-modal" class="modal modal-fixed-footer">
            <div id="person-union-link-form-cont" class="modal-content">
            </div>
            <div class="modal-footer">
                <a class="modal-action modal-close waves-effect waves-red btn-flat">Go away</a>
            </div>
        </div>
    </div>
</xsl:template>

</xsl:stylesheet>