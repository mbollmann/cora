<?php

/** @file content.php
 * Define the site content.
 *
 * This file defines the actual content of the site. It fills the
 * #$menu variable, thereby setting up references to all web pages
 * that can be displayed to the user.
 *
 * Furthermore, this file now contains some global functions for page
 * rendering to separate them from the HTML rendering in the gui/*.php
 * files.  This is a step towards a cleaner separation of content and
 * layout, but obviously not an ideal solution yet.
 *
 * @author Marcel Bollmann
 * @date January 2012 - September 2014
 */

require_once( "lib/contentModel.php" );

/** @copybrief index.php::$menu */
$menu = new Menu();
if( $_SESSION["loggedIn"] === true ) {
  $menu->addMenuItem( "file", "gui/file.php", "gui/js/file.js", "Datei", "Dokumente öffnen oder hinzufügen" );
  $menu->addMenuItem( "edit", "gui/edit.php", "gui/js/edit.js", "Editor", "Geöffnetes Dokument bearbeiten" );
  $menu->addMenuItem( "settings", "gui/settings.php", "gui/js/settings.js", "Einstellungen", "Einstellungen von CorA ändern" );
  if ( $_SESSION["admin"] ) {
    $menu->addMenuItem( "admin", "gui/admin.php", "", "Administration", "Benutzer und Projekte verwalten" );
  }
} else {
  $menu->addMenuItem( "login", "gui/login.php", "", "Anmeldung", "In CorA anmelden" );
}

///////////////////////////////////////////////////////////////////
// Global functions for page generation
// Basically all dirty hacks, but collected in one place now
///////////////////////////////////////////////////////////////////

function embedCSS($filename, $media="all", $withtimestamp=false) {
    if($withtimestamp) {
        $filename .= '?' . filemtime(dirname(__FILE__) . "/" . $filename);
    }
    echo "<link rel='stylesheet' type='text/css' href='$filename' media='$media' />";
}

function embedJS($filename, $withtimestamp=false) {
    if($withtimestamp) {
        $filename .= '?' . filemtime(dirname(__FILE__) . "/" . $filename);
    }
    echo "<script type='text/javascript' src='$filename'></script>";
}

function embedSessionVars($svars) {
    echo "var userdata = { ";
    echo 'name: "'.$_SESSION['user'].'", ';
    foreach($svars as $key => $quoted) {
        if($quoted)
            echo $key.': "'.$_SESSION[$key].'", ';
        else
            echo $key.': '.$_SESSION[$key].', ';
    }
    echo " };\n";
}

function embedTagsets($tagsets_all) {
    echo "var PHP_tagsets = [ ";
    foreach($tagsets_all as $set) {
        $set['id'] = $set['shortname'];
        echo json_encode($set);
        echo ", ";        
    }
    echo " ];\n";
}

$tagsets = $sh->getTagsetList();
$tagsets_all = $sh->getTagsetList(false, "class");
?>