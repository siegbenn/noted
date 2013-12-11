<? include('top.php') ?>
<? include('config.php'); ?>
<? 
$pkNoteId = (int) $_GET['pkNoteId'];
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `tblNotes` WHERE `pkNoteId` = '$pkNoteId' ")) or trigger_error(mysql_error()); ?>
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<a href='note_list.php'>Back To Notes</a>
<hr />
<div class="well">
<h2><? print($row['fldNoteName']) ?></h2>
<h4>Created on: <? print($row['fldNoteCreate']) ?></h4>
<h4>Controls: <? echo "<a href='note_edit.php?pkNoteId={$row['pkNoteId']}'>Edit</a> <a href='note_delete.php?pkNoteId={$row['pkNoteId']}'>Delete</a>"; ?></h4>
<h5><? print($row['fldNoteBody']) ?></h5>
</div>
</div>
</div>
<div class="col-md-3"></div>

<? include('bottom.php') ?>