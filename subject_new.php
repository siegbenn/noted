<? include('top.php') ?>
<? 
include('config.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `tblSubjects` ( `fldSubjectName`  ) VALUES(  '{$_POST['fldSubjectName']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "<div class='alert alert-success alert-dismissable'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<strong>Success!</strong> Subject created.</div>"; 
} 
?>
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<a href='subject_list.php'>Back To Subjects</a>
<hr />
<div class="well">
<h2 class="text-center">New Subject</h2>
<br />
<form  method='POST' > 
<p><b>Name:</b><br /><input type='text' name='fldSubjectName' class="form-control" required/> 
<br />
<p><input type='submit' value='Submit' class='btn btn-success' /><input type='hidden' value='1' name='submitted' /> 
</form> 
</div>
</div>
<div class="col-md-3"></div>
</div>
<? include('bottom.php') ?>