<? include('top.php') ?>
<h2 class="text-center">Notes</h2>
<br />
<div class="panel panel-default">
<!-- Default panel contents -->
<div class="panel-heading">Note</div>
<? 
include('config.php'); 
echo "<table class='table table-hover table-striped'>";
echo "<thead>"; 
echo "<tr>";
echo "<td><b>Subject</b></td>";  
echo "<td><b>Name</b></td>"; 
echo "<td><b>Created</b></td>"; 
echo "<td><b>Controls</b></td>"; 
echo "</tr>"; 
echo "</thead>" ;
$result = mysql_query("SELECT `pkNoteId` ,`fldNoteName` , `fldNoteBody` , `fldNoteCreate` , `fldSubjectName` FROM tblSubjects INNER JOIN tblNotes ON tblSubjects.pkSubjectId = tblNotes.fkSubjectId ORDER BY fldNoteCreate DESC LIMIT 0 , 30") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";   
echo "<td>" . nl2br( $row['fldSubjectName']) . "</td>"; 
echo "<td>" . nl2br( $row['fldNoteName']) . "</td>";  
echo "<td>" . nl2br( $row['fldNoteCreate']) . "</td>";  
echo "<td><a href='note_show.php?pkNoteId={$row['pkNoteId']}'>Show</a> <a href='note_edit.php?pkNoteId={$row['pkNoteId']}'>Edit</a> <a href='note_delete.php?pkNoteId={$row['pkNoteId']}'>Delete</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
echo "</div>";
echo "<p><a class='btn btn-success' href='note_new.php'>New Note</a></p>"; 
?>
<? include('bottom.php') ?>

