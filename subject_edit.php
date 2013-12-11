<? include('top.php') ?>
<? 
include('config.php'); 
if (isset($_GET['pkSubjectId']) ) { 
$pkSubjectId = (int) $_GET['pkSubjectId']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "UPDATE `tblSubjects` SET  `fldSubjectName` =  '{$_POST['fldSubjectName']}'   WHERE `pkSubjectId` = '$pkSubjectId' "; 
mysql_query($sql) or die(mysql_error()); 
echo (mysql_affected_rows()) ? "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Edit complete.</div>" : "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Edit error.</div>";
} 
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `tblSubjects` WHERE `pkSubjectId` = '$pkSubjectId' ")); 
?>
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<a href='subject_list.php'>Back To Subjects</a>
<hr />
<div class="well">
<h2 class="text-center">Edit Subject</h2>
<br />
<form method='POST'> 
<p><b>Name:</b><br /><input type='text' name='fldSubjectName' value='<?= stripslashes($row['fldSubjectName']) ?>' class="form-control" required/> 
<br />
<p><input type='submit' value='Submit' class='btn btn-success'/><input type='hidden' value='1' name='submitted' /> 
</form> 
<? } ?> 
</div>
</div>
<div class="col-md-3"></div>
</div>
<? include('bottom.php') ?>