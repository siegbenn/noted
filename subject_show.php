<? include('top.php') ?>
<? include('config.php'); ?>
<? 
$pkSubjectId = (int) $_GET['pkSubjectId'];
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `tblSubjects` WHERE `pkSubjectId` = '$pkSubjectId' ")) or trigger_error(mysql_error()); ?>
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<a href='subject_list.php'>Back To Subjects</a>
<hr />
<div class="well">
<h2><? print($row['fldSubjectName']) ?></h2>
<h4>Controls: <? echo "<a href='subject_edit.php?pkSubjectId={$row['pkSubjectId']}'>Edit</a> <a href='subject_delete.php?pkSubjectId={$row['pkSubjectId']}'>Delete</a> "; ?></h4>
<hr />
<table>
	<?
$result = mysql_query("SELECT `pkNoteId`,`fldNoteName`,`fkSubjectId` FROM `tblNotes` WHERE fkSubjectId = '$pkSubjectId'") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";
echo "<th>Note</th>";  
echo "<th>Controls</th>";  
echo "</tr>"; 
echo "<tr>";   
echo "<td>" . nl2br( $row['fldNoteName']) . "</td>";   
echo "<td><a href='note_show.php?pkNoteId={$row['pkNoteId']}'>Show</a> <a href='note_edit.php?pkNoteId={$row['pkNoteId']}'>Edit</a> <a href='note_delete.php?pkNoteId={$row['pkNoteId']}'>Delete</a></td> "; 
echo "</tr>"; 
} 
?>
</table>
</div>
</div>
</div>
<div class="col-md-3"></div>

<? include('bottom.php') ?>