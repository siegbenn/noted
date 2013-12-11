<? include('top.php') ?>
<? 
include('config.php'); 
if (isset($_GET['pkNoteId']) ) { 
$pkNoteId = (int) $_GET['pkNoteId']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "UPDATE `tblNotes` SET  `fldNoteName` =  '{$_POST['fldNoteName']}' ,  `fldNoteBody` =  '{$_POST['fldNoteBody']}',  `fkSubjectId` = '{$_POST['fkSubjectId']}' WHERE `pkNoteId` = '$pkNoteId' "; 
mysql_query($sql) or die(mysql_error()); 
$sql = "INSERT INTO `tblSubjectsNotes` ( `fkSubjectId` ,  `fkNoteName`  ) VALUES(   '{$_POST['fkSubjectId']}', '{$_POST['fldNoteName']}'  ) ";
mysql_query($sql) or die(mysql_error());
echo (mysql_affected_rows()) ? "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Edit complete.</div>" : "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Edit error.</div>";
} 
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `tblNotes` WHERE `pkNoteId` = '$pkNoteId' ")); 
?>
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<a href='note_list.php'>Back To Notes</a>
<hr />
<div class="well">
<h2 class="text-center">Edit Note</h2>
<br />
<form method='POST'> 
<p><b>Name:</b><br /><input type='text' name='fldNoteName' value='<?= stripslashes($row['fldNoteName']) ?>' class="form-control" required/> 
<p><b>Body:</b><br /><textarea name='fldNoteBody' class="form-control" required><?= stripslashes($row['fldNoteBody']) ?></textarea>
<p><b>Subject:</b><br /><select name="fkSubjectId">
<?
$subjects = mysql_query("SELECT * from tblSubjects");
while($record = mysql_fetch_array($subjects)){
	echo '<option value="' . $record['pkSubjectId'] . '">' . $record['fldSubjectName'] . '</option>';
}
?>
</select>  
<br />
<p><input type='submit' value='Submit' class='btn btn-success' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<? } ?> 
</div>
</div>
<div class="col-md-3"></div>
</div>
<? include('bottom.php') ?>

