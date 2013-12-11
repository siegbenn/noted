<? include('top.php') ?>
<? 
include('config.php'); 
$pkSubjectId = (int) $_GET['pkSubjectId']; 
mysql_query("DELETE FROM `tblSubjects` WHERE `pkSubjectId` = '$pkSubjectId' ") ; 
echo (mysql_affected_rows()) ? "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Delete complete.</div>" : "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Delete error.</div>";
?> 

<a href='subject_list.php'>Back To Subjects</a>
<? include('bottom.php') ?>