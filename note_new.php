<? include('top.php') ?>
<? 
include('config.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `tblNotes` ( `fldNoteName` ,  `fldNoteBody`,  `fkSubjectId`  ) VALUES(  '{$_POST['fldNoteName']}' ,  '{$_POST['fldNoteBody']}',  '{$_POST['fkSubjectId']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
$sql = "INSERT INTO `tblSubjectsNotes` ( `fkSubjectId` ,  `fkNoteName`  ) VALUES(   '{$_POST['fkSubjectId']}', '{$_POST['fldNoteName']}'  ) ";
mysql_query($sql) or die(mysql_error()); 
echo "<div class='alert alert-success alert-dismissable'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<strong>Success!</strong> Note created.</div>";
 if (mail($_POST["fldEmail"], "Noted | " . $_POST["fldNoteName"], $_POST["fldNoteName"] . " : " . $_POST["fldNoteBody"])){}
}
?>

<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<a href='note_list.php'>Back To Notes</a>
<hr />
<div class="well">
<h2 class="text-center">New Note</h2>
<br />
<form method='POST'> 
<p><b>Name:</b><br /><input type='text' name='fldNoteName' class="form-control" required/> 
<p><b>Body:</b><br /><textarea name='fldNoteBody' class="form-control" required></textarea>
<p><b>Subject:</b><br /><select name="fkSubjectId">
<?
$subjects = mysql_query("SELECT * from tblSubjects");
while($record = mysql_fetch_array($subjects)){
	echo '<option value="' . $record['pkSubjectId'] . '">' . $record['fldSubjectName'] . '</option>';
}
?>
</select> 
<br />
<p><b>Email: </b>(send this note to someone)<br /><input type='email' name='fldEmail' class="form-control" required/> 
<p><input type='submit' value='Submit' class='btn btn-success' /><input type='hidden' value='1' name='submitted' /> 
</form> 
</div>
</div>
<div class="col-md-3"></div>
</div>
<? include('bottom.php') ?>