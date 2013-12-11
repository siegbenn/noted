<?php // connect to db
$link = mysql_connect('webdb.uvm.edu', 'bsiegel_admin', 'hZjJ1T0U6iO09PM4');
if (!$link) {
    die('Not connected : ' . mysql_error());
}

if (! mysql_select_db('BSIEGEL_NOTED') ) {
    die ('Can\'t use BSIEGEL_NOTED : ' . mysql_error());
}
?>