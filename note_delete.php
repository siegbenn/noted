<? include('top.php') ?>
<? 
include('config.php'); 
$pkNoteId = (int) $_GET['pkNoteId']; 
mysql_query("DELETE FROM `tblNotes` WHERE `pkNoteId` = '$pkNoteId' ") ; 
echo (mysql_affected_rows()) ? "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Delete complete.</div>" : "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Delete error.</div>";
?> 
<a href='note_list.php'>Back To Notes</a>
<? include('bottom.php') ?>