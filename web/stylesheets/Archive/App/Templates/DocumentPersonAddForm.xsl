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
        <form id="document-persons-add-form" action="#" method="post" class="row">
            <input type="hidden" name="document-id" value="{docs:ID}" />
            <div class="input-field col s9">
                <input type="text" id="document-persons-search" name="document-persons-search" value="" />
                <label for="document-year">Search by Name</label>
		    </div>
            <div class="input-field col s3">
                <a href="javascript:void(0);" class="btn-floating waves-effect waves-light red darken-2 document-persons-search-btn"><i class="material-icons">search</i></a>
            </div>
        </form>
        <!-- Modal Structure -->
        <div id="persons-search-list-modal" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4>Found <span id="persons-search-list-count"></span> persons</h4>
                <div id="persons-search-list"></div>
            </div>
            <div class="modal-footer">
                <a class="modal-action modal-close waves-effect waves-red btn-flat">Go away</a>
            </div>
        </div>
    </div>
</xsl:template>

</xsl:stylesheet>