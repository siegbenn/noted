<? include('top.php') ?>
<h2 class="text-center">Activity Log</h2>
<br />
<div class="panel panel-default">
<!-- Default panel contents -->
<div class="panel-heading">Note History</div>
<? 
include('config.php'); 
echo "<table class='table table-hover table-striped'>";
echo "<thead>"; 
echo "<tr>";
echo "<td>Subject</td>";  
echo "<td>Name</td>"; 
echo "<td>Created</td>";  
echo "</tr>"; 
echo "</thead>" ;
$result = mysql_query("SELECT `fkNoteName` , `fldSubjectName` , `fldLogTime` FROM tblSubjects INNER JOIN tblSubjectsNotes ON tblSubjects.pkSubjectId = tblSubjectsNotes.fkSubjectId ORDER BY fldLogTime DESC LIMIT 0 , 30") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";   
echo "<td>" . nl2br( $row['fldSubjectName']) . "</td>"; 
echo "<td>" . nl2br( $row['fkNoteName']) . "</td>";  
echo "<td>" . nl2br( $row['fldLogTime']) . "</td>";  
echo "</tr>"; 
} 
echo "</table>"; 
echo "</div>";
?>
<? include('bottom.php') ?>