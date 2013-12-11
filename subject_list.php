<? include('top.php') ?>
<h2 class="text-center">Subjects</h2>
<br />
<div class="panel panel-default">
<!-- Default panel contents -->
<div class="panel-heading">Note Subject</div>
<? 
include('config.php'); 
echo "<table class='table table-hover table-striped'>";
echo "<thead>"; 
echo "<tr>"; 
echo "<td><b>Subject Name</b></td>"; 
echo "<td><b>Controls</b></td>"; 
echo "</tr>"; 
echo "</thead>" ;
$result = mysql_query("SELECT * FROM `tblSubjects`") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>"; 
echo "<td>" . nl2br( $row['fldSubjectName']) . "</td>";  
echo "<td><a href='subject_show.php?pkSubjectId={$row['pkSubjectId']}'>Show</a> <a href='subject_edit.php?pkSubjectId={$row['pkSubjectId']}'>Edit</a> <a href='subject_delete.php?pkSubjectId={$row['pkSubjectId']}'>Delete</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
echo "</div>";
echo "<p><a class='btn btn-success' href='subject_new.php'>New Subject</a></p>"; 
?>
<? include('bottom.php') ?>




