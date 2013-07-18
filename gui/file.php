<?php
/** @file file.php
 * The document selection page.
 */

$filelist = $sh->getFiles(); 
$tagsets = $sh->getTagsetList();
$tagsets_all = $sh->getTagsetList(false, "class");
// $projects = $sh->getProjectList();   defined in gui.php

?>

<div id="fileDiv" class="content" style="display: none;">

<?php
  if(empty($projects)):
?>
<div class="panel" id="noProjectGroups">
   <h3>Keine Projektgruppen verfügbar</h3>
   <p>Sie gehören zur Zeit keiner Projektgruppe an.</p>
   <p>Wenden Sie sich an einen Administrator, um zu einer Projektgruppe hinzuzufügt zu werden.</p>
</div>
<?php
    else:
?>

<div class="panel" id="fileImport">
	<h3>Datei importieren</h3>
  <p><button class="mform" id="importNewTransLink">Neues Dokument aus Transkriptionsdatei importieren...</button>
   <?php if($_SESSION["admin"]): ?>
     <button class="mform" id="importNewXMLLink">Neues Dokument aus XML-Datei importieren...</button>
   <?php endif; ?>
</p>
</div>

<div class="panel">
	<div class="fileViewRefresh">	
	<h3>Datei öffnen</h3>
		<img src="gui/images/View-refresh.svg" width="20px" height="20px"/>
	</div>

	<div id="files">
	</div>

</div>

<div class="templateHolder">
  <div id="transImportSpinner">
   <div id="transImportStatusContainer">
   <table>
   <tr id="tIS_upload"><td class="proc proc-running"></td><td>Datei übermitteln</td></tr>
   <tr id="tIS_check"><td class="proc" /></td><td>Transkription prüfen</td></tr>
   <tr id="tIS_convert"><td class="proc" /></td><td>Transkription analysieren</td></tr>
   <tr id="tIS_tag"><td class="proc" /></td><td>Automatisch vorannotieren</td></tr>
   <tr id="tIS_import"><td class="proc" /></td><td>Importieren abschließen</td></tr>
   </table>
   <div id="tIS_progress"></div>
   </div>
  </div>
   
  <div class="panel" id="fileGroup">
    <h4 class="projectname">Projektname</h4>
        <div>
		<table class="fileList">
			<tr class="fileTableHeadLine">
				<th></th>
				<th>Dateiname</th>
<!--				<th class="tagStatusPOS">POS</th>
				<th class="tagStatusMorph">Morph</th>
				<th class="tagStatusNorm">Norm.</th>
-->
				<th colspan="2">zuletzt bearbeitet am/von</th>
				<th colspan="2">erstellt am/von</th>
				<th></th>
				<th></th>
				<th></th>
		    </tr>

		<!-- this table is filled by file.listFiles() @ file.js -->
		</table>
        </div>
  </div>

  <div id="fileExportPopup">
    <p>In welchem Format möchten Sie die Datei exportieren?</p>
		<p>
		<label for="format">Exportformat: </label>
		<select id="fileExportFormat" name="format" size="1">
			<option value="<?php echo ExportType::Tagging ?>" selected="selected">Textformat mit POS-Tags</option>
                        <option value="<?php echo ExportType::CoraXML ?>">CorA-XML</option>
                        <option value="<?php echo ExportType::Transcription ?>">Transkriptionsformat (ohne Annotationen)</option>
		</select>
		</p>
  <p></p>
  </div>

  <div id="fileImportPopup">
    <p></p>
    <p><textarea cols="80" rows="10" readonly="readonly"></textarea></p>
  </div>

  <div id="fileImportForm" class="limitedWidth">
	<form action="request.php" id="newFileImportForm" method="post" accept-charset="utf-8" enctype="multipart/form-data">
  <p class="error_text">Bitte wählen Sie eine Datei zum Importieren aus!</p>

		<p>
		<label for="xmlFile">Datei: </label>
		<input type="file" name="xmlFile" data-required="" />
		</p>

		<p>
		<label for="project">Projekt: </label>
		<select name="project" size="1">
			<?php foreach($projects as $set):?>
			<option value="<?php echo $set['id'];?>"><?php echo "{$set['name']}";?></option>
			<?php endforeach;?>
		</select>
		</p>

  <p>Die folgenden Felder müssen nicht ausgefüllt werden, falls die entsprechenden Informationen bereits in der XML-Datei enthalten sind.</p>

		<p>
		<label for="xmlName">Name: </label>
		<input type="text" name="xmlName" placeholder="(Dokumentname)" size="30" />
		</p>

		<p>
		<label for="sigle">Sigle: </label>
		<input type="text" name="sigle" placeholder="(Sigle &ndash; optional)" size="30" />
		</p>

  <div <?php if(!$_SESSION['admin']) {echo 'style="display:none;"';} ?>>
<!--		<p>
		<label for="tagset">POS-Tagset: </label>
		<select name="tagset" size="1">
			<?php foreach($tagsets as $set):?>
			<option value="<?php echo $set['shortname'];?>"><?php echo $set['longname'];?></option>
			<?php endforeach;?>
		</select>
		</p>
-->
		<p style="padding-top: 15px;">Tagset-Verknüpfungen:
                <table class="tagset-list">
		   <tr><th></th><th class="numeric">ID</th><th>Name</th><th>Class</th><th>Set</th></tr>
                   <?php foreach($tagsets_all as $set): ?>
		   <tr>
                      <td class="check"><input type="checkbox" name="linktagsets[]" value="<?php echo $set['shortname']; ?>" /></td>
                      <td class="numeric"><?php echo $set['shortname']; ?></td>
                      <td><?php echo $set['longname']; ?></td>
                      <td><?php echo $set['class']; ?></td>
                      <td><?php echo $set['set_type']; ?></td>
                   </tr>
                   <?php endforeach; ?>
		</table>
		</p>
  </div>		     

		<p><input type="hidden" name="action" value="importXMLFile" /></p>
		<p style="text-align:right;">
                  <input type="submit" value="Importieren &rarr;" />
                </p>
	</form>
  </div>

  <div id="fileImportTransForm" class="limitedWidth">
	<form action="request.php" id="newFileImportTransForm" method="post" accept-charset="utf-8" enctype="multipart/form-data">
  <p class="error_text">Bitte wählen Sie eine Datei zum Importieren aus!</p>

		<p>
		<label for="transFile">Datei: </label>
		<input type="file" name="transFile" data-required="" />
		</p>

		<p>
		<label for="fileEnc">Encoding: </label>
		<select name="fileEnc" size="1">
                   <option value="utf-8">UTF-8 (Unicode)</option>
                   <option value="iso-8859-1">ISO-8859-1 (Latin 1)</option>
                   <option value="IBM850">MS-DOS (IBM-850)</option>
		</select>
		</p>

		<p>
		<label for="project">Projekt: </label>
		<select name="project" size="1">
			<?php foreach($projects as $set):?>
			<option value="<?php echo $set['id'];?>"><?php echo "{$set['name']}";?></option>
			<?php endforeach;?>
		</select>
		</p>

		<p>
		<label for="transName">Name: </label>
		<input type="text" name="transName" placeholder="(Dokumentname)" size="30" data-required="" />
		</p>

		<p>
		<label for="sigle">Sigle: </label>
		<input type="text" name="sigle" placeholder="(Sigle &ndash; optional)" size="30" />
		</p>

  <div <?php if(!$_SESSION['admin']) {echo 'style="display:none;"';} ?>>
<!--		<p>
		<label for="tagset">POS-Tagset: </label>
		<select name="tagset" size="1">
			<?php foreach($tagsets as $set):?>
			<option value="<?php echo $set['shortname'];?>"><?php echo $set['longname'];?></option>
			<?php endforeach;?>
		</select>
		</p>
-->
		<p style="padding-top: 15px;">Tagset-Verknüpfungen:
                <table class="tagset-list">
		   <tr><th></th><th class="numeric">ID</th><th>Name</th><th>Class</th><th>Set</th></tr>
                   <?php foreach($tagsets_all as $set): ?>
		   <tr>
                      <td class="check"><input type="checkbox" name="linktagsets[]" value="<?php echo $set['shortname']; ?>" /></td>
                      <td class="numeric"><?php echo $set['shortname']; ?></td>
                      <td><?php echo $set['longname']; ?></td>
                      <td><?php echo $set['class']; ?></td>
                      <td><?php echo $set['set_type']; ?></td>
                   </tr>
                   <?php endforeach; ?>
		</table>
		</p>
  </div>		     
		<p><input type="hidden" name="action" value="importTransFile" /></p>
		<p style="text-align:right;">
                  <input type="submit" value="Importieren &rarr;" />
                </p>
	</form>
  </div>

  <div id="tagsetAssociationTable" class="limitedWidth">
                <table class="tagset-list">
		   <tr><th></th><th class="numeric">ID</th><th>Name</th><th>Class</th><th>Set</th></tr>
                   <?php foreach($tagsets_all as $set): ?>
		   <tr>
                      <td class="check"><input type="checkbox" name="linktagsets[]" value="<?php echo $set['shortname']; ?>" /></td>
                      <td class="numeric"><?php echo $set['shortname']; ?></td>
                      <td><?php echo $set['longname']; ?></td>
                      <td><?php echo $set['class']; ?></td>
                      <td><?php echo $set['set_type']; ?></td>
                   </tr>
                   <?php endforeach; ?>
		</table>
  </div>

</div>

<?php
  endif;
?>
</div>