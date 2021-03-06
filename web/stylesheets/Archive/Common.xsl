<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet
	xmlns="http://www.w3.org/1999/xhtml"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:html="http://www.w3.org/1999/xhtml"
	xmlns:res="urn:com:summerfields:Archive:Resources"
	xmlns:pers="urn:com:summerfields:Archive:Persons"
	xmlns:link="urn:com:summerfields:Archive:Links"
	xmlns:refs="urn:com:summerfields:Archive:Refs"
	xmlns:exsl="http://exslt.org/common"
	xmlns:wadlext="urn:wadlext"
	xmlns:ns="urn:namespace"
	extension-element-prefixes="exsl"
	exclude-result-prefixes="xsl html res pers link refs wadlext ns"
	version="1.0">

<xsl:output
	media-type="application/xhtml+xml"
	method="xml"
	encoding="UTF-8"
	indent="yes"
	omit-xml-declaration="no"
	doctype-public="-//W3C//DTD XHTML 1.1//EN"
	doctype-system="http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd" />
	
	
	<xsl:template name="common-header">
	    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>SF Archive Admin panel</title>

        <!-- Add to homescreen for Chrome on Android -->
        <meta name="mobile-web-app-capable" content="yes" />
        <link rel="icon" sizes="192x192" href="images/android-desktop.png" />

        <!-- Add to homescreen for Safari on iOS -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <meta name="apple-mobile-web-app-title" content="Material Design Lite" />
        <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png" />

        <!-- Tile icon for Win8 (144x144 + tile color) -->
        <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png" />
        <meta name="msapplication-TileColor" content="#3372DF" />

        <link rel="shortcut icon" href="images/favicon.png" />

        <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.5/material.red-indigo.min.css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        <style type="text/css">
            a {
                text-decoration: none;
                border-bottom: dotted 1px #444;
                color: #444;
            }
        </style>
	</xsl:template>
	
	<xsl:template name="common-main-header">
	    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Add to homescreen for Chrome on Android -->
        <meta name="mobile-web-app-capable" content="yes" />
        <link rel="icon" sizes="192x192" href="images/android-desktop.png" />

        <!-- Add to homescreen for Safari on iOS -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <meta name="apple-mobile-web-app-title" content="Material Design Lite" />
        <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png" />

        <!-- Tile icon for Win8 (144x144 + tile color) -->
        <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png" />
        <meta name="msapplication-TileColor" content="#3372DF" />

        <link rel="shortcut icon" href="{$ROOT}images/favicon.png" />

        <link rel="stylesheet" href="{$ROOT}css/archive.min.css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        <script type="text/javascript" href="{$ROOT}js/archive.min.js">;</script>
	</xsl:template>
	
	<xsl:template name="links">
    <xsl:param name="from" select="'home'" />
    <ul class="sf-accordion">
        <xsl:if test="not($from='hom')">
            <li>
                <a href="{$ROOT}api/timeline">Home</a>
            </li>
        </xsl:if>
        <xsl:if test="not($from='person')">
            <li>
                <input id="persons-acco-last" tabindex="1" type="checkbox" />
                <label for="persons-acco-last">Persons<i class="material-icons">keyboard_arrow_down</i></label>
                <ul class="sf-collection">
                    <li><a href="{$ROOT}api/persons">Old Summerfieldians</a></li>
                    <li><a href="{$ROOT}api/persons">Administration</a></li>
                    <li><a href="{$ROOT}api/persons">Teachers</a></li>
                    <li><a href="{$ROOT}api/persons">Chaplains</a></li>
                    <li><a href="{$ROOT}api/persons">Headmasters</a></li>
                    <li><a href="{$ROOT}api/persons">Founders</a></li>
                    <li><a href="{$ROOT}api/persons">Governers</a></li>
                </ul>
            </li>
        </xsl:if>
        <xsl:if test="not($from='person')">
            <li>
                <input id="sports-teams-acco-last" type="checkbox" tabindex="1" />
                <label for="sports-teams-acco-last">Sports Teams<i class="material-icons">keyboard_arrow_down</i></label>
                <ul class="sf-collection">
                    <li><a href="{$ROOT}api/persons">Cricket</a></li>
                    <li><a href="{$ROOT}api/persons">Football</a></li>
                    <li><a href="{$ROOT}api/persons">Rugby</a></li>
                    <li><a href="{$ROOT}api/persons">Athletics</a></li>
                    <li><a href="{$ROOT}api/persons">Fives</a></li>
                    <li><a href="{$ROOT}api/persons">Golf</a></li>
                    <li><a href="{$ROOT}api/unions/BYH5fFmB">Hockey</a></li>
                    <li><a href="{$ROOT}api/persons">Squash</a></li>
                    <li><a href="{$ROOT}api/persons">Swimming</a></li>
                    <li><a href="{$ROOT}api/persons">Tennis</a></li>
                    <li><a href="{$ROOT}api/persons">Polo</a></li>
                    <li><a href="{$ROOT}api/persons">Fencing</a></li>
                </ul>
            </li>
        </xsl:if>
        <xsl:if test="not($from='person')">
            <li>
                <input id="art-acco-last" type="checkbox" tabindex="1" />
                <label for="art-acco-last">Art<i class="material-icons">keyboard_arrow_down</i></label>
                <ul class="sf-collection">
                    <li><a href="{$ROOT}api/persons">Red Choir</a></li>
                </ul>
            </li>
        </xsl:if>
        <xsl:if test="not($from='person')">
            <li>
                <input id="school-trips-acco-last" type="checkbox" tabindex="1" />
                <label for="school-trips-acco-last">School Trips<i class="material-icons">keyboard_arrow_down</i></label>
                <ul class="sf-collection">
                    <li><a href="{$ROOT}api/persons">Battlefields</a></li>
                    <li><a href="{$ROOT}api/persons">Cornwall</a></li>
                    <li><a href="{$ROOT}api/persons">Expedition Days</a></li>
                    <li><a href="{$ROOT}api/persons">French Trips</a></li>
                    <li><a href="{$ROOT}api/persons">Ski Trips</a></li>
                </ul>
            </li>
        </xsl:if>
    </ul>
</xsl:template>
	
	
</xsl:stylesheet>