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

<xsl:variable name="PERSONS-TYPES" select="document('../../../../schemas/Archive/Persons.xsd')/xsd:schema" />

<xsl:template match="pers:Person">
    <xsl:variable name="person" select="." />
    <div>
        <!--form id="persons-search-form" action="#" method="post" class="row">
            <div class="input-field col s9">
                <input type="text" id="persons-search" name="persons-search" value="" />
                <label for="persons-search">Search by Name</label>
		    </div>
            <div class="input-field col s3">
                <a href="javascript:void(0);" class="btn-floating waves-effect waves-light blue darken-2 persons-search-btn"><i class="material-icons">search</i></a>
            </div>
        </form-->
        <!-- Modal Structure -->
        <div id="persons-search-list-modal" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4>Found <span id="persons-search-list-count"></span> persons</h4>
                <div id="persons-search-list">&#173;</div>
            </div>
            <div class="modal-footer">
                <a class="modal-action modal-close waves-effect waves-red btn-flat">Go away</a>
            </div>
        </div>
    <form id="person-form" action="#" method="post" class="row">
        <input type="hidden" id="person-id" name="person-id" value="{pers:ID}" />
        <div class="input-field col s8">
            <input type="text" id="person-fullname" name="person-fullname" value="{pers:fullName}"/>
            <label for="person-fullname">Fullname</label>
        </div>
        <div class="input-field col s1">
            <a href="javascript:void(0);" id="persons-search-btn" class="btn-floating waves-effect waves-light blue darken-2"><i class="material-icons">search</i></a>
        </div>
        <div class="input-field col s3">
            <input type="text" id="person-initials" name="person-initials" value="{pers:initials}"/>
            <label for="person-initials">Initials</label>
        </div>
        <div class="input-field col s4">
            <input type="text" id="person-lastname" name="person-lastname" value="{pers:lastName}"/>
            <label for="person-lastname">Surename</label>
        </div>
        <div class="input-field col s4">
            <input type="text" id="person-firstname" name="person-firstname" value="{pers:firstName}"/>
            <label for="person-firstname">Firstname</label>
        </div>
        <div class="input-field col s4">
            <input type="text" id="person-middlenames" name="person-middlenames" value="{pers:middleNames}"/>
            <label for="person-lastname">Middle names</label>
        </div>
        <div class="input-field col s3">
            <input type="text" id="person-dob" name="person-dob" value="{pers:DOB}"/>
            <label for="person-dob">DOB</label>
        </div>
        <div class="input-field col s3">
            <input type="text" id="person-deceased" name="person-deceased" value="{pers:deceased}"/>
            <label for="person-deceased">Deceased</label>
        </div>
        <div class="input-field col s2">
            <input type="text" id="person-rollno" name="person-rollno" value="{pers:rollNo}"/>
            <label for="person-rollno">RollNo</label>
        </div>
        <div class="input-field col s4">
            <select id="person-league" name="person-league" class="browser-default">
			    <option value="">Select league</option>
		        <xsl:for-each select="$PERSONS-TYPES/xsd:simpleType[@name='leagueType']/xsd:restriction/xsd:enumeration">
				    <option value="{@value}">
			            <xsl:if test="@value = $person/pers:league">
							<xsl:attribute name="selected">selected</xsl:attribute>
						</xsl:if>
					    <xsl:value-of select="@value" />
				    </option>
		        </xsl:for-each>
			</select>
		</div>
        <div class="input-field col s12">
            <textarea id="person-comments" class="materialize-textarea" name="person-comments">
                <xsl:text>&#173;</xsl:text><xsl:value-of select="pers:comments" />
            </textarea>
            <label for="person-comments">Comments</label>
        </div>
        <div class="input-field col s12">
            <a id="person-update-btn" class="waves-effect waves-light btn teal darken-1" title="Update">Update</a>&#160;
            <a id="person-create-btn" class="waves-effect waves-light btn teal darken-1" title="Create new">Create</a>
        </div>
    </form>
    </div>
</xsl:template>

</xsl:stylesheet>