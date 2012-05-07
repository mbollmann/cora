<?php
/** @file file.php
 * The document selection page.
 */

$filelist = $sh->getFiles(); 
$tagsets = $sh->getTagsetList();

?>

<div id="fileDiv" class="content" style="display: none;">

<!-- <div class="panel" id="test">
	<button id="testButton">TEST</button>
</div>	 -->

<div class="panel" id="fileImport">
	<h3>Füge neue Datei hinzu</h3>
	<form action="request.php" id="newFileImportForm" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<p>
		<label for="textFile">Datei: </label>
		<input type="file" name="textFile" />
		</p>

		<p>
		<label for="textFile">Name: </label>
		<input type="text" name="textName" />
		</p>

		<p>
		<label for="tagset">Tagset: </label>
		<select name="tagset" size="1">
			<?php foreach($tagsets as $set):?>
			<option value="<?php echo $set['shortname'];?>"><?php echo "{$set['shortname']} ({$set['longname']}) ";?></option>
			<?php endforeach;?>
		</select>
		</p>
		
		<p>
		<label for="tagPOSStatus">POS getaggt?</label>
		<input type="checkbox" name="tagPOSStatus" />

		<label for="tagMorphStatus">Morph getaggt?</label>
		<input type="checkbox" name="tagMorphStatus" />

		<label for="tagNormStatus">normalisiert?</label>
		<input type="checkbox" name="tagNormStatus" />
		</p>


		<p><input type="hidden" name="action" value="importFile" /></p>
		<p><input type="submit" value="Continue &rarr;" /></p>
	</form>
</div>

<div class="templateHolder" style="display: none;">
	<div id="ceraAddDataToFile">
		<form action="request.php" id="addDataImportForm" method="post" accept-charset="utf-8" enctype="multipart/form-data">			
			<p>Name: <input type="text" name="textName" readonly="readonly"/></p>
			<!-- <p>Tagset: <input type="text" name="tagset" readonly="readonly"/></p> -->
			<p>Annotationstyp: <input type="text" name="tagType" readonly="readonly" /></p>
		
			<p>
			<label for="textFile">Datei: </label>
			<input type="file" name="textFile" />
			</p>
		
			<p><input type="hidden" name="fileID" /></p>
			<p><input type="hidden" name="action" value="addFileData" /></p>
			<p><input type="submit" value="Continue &rarr;" disabled="disabled"/><input type="button" value="Abbrechen" /></p>
		
		</form>
	</div>	
</div>	

<div class="panel">
	<div class="fileViewRefresh">	
	<h3>Datei öffnen</h3>
		<img src="gui/images/View-refresh.svg" width="20px" height="20px"/>
	</div>
	<div id="files">
		<table id="fileList">
			<tr class="fileTableHeadLine">
				<th></th>
				<th>Dateiname</th>
				<th>POS getaggt</th>
				<th>Morph getaggt</th>
				<th>normalisiert</th>
				<th colspan="2">zuletzt bearbeitet am/von</th>
				<th colspan="2">erstellt am/von</th>
				<th></th>
				<th></th>
		    </tr>

		<!-- this table is filled by file.listFiles() @ file.js -->
		</table>
	</div>

</div>

</div>