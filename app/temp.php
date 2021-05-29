<?php

require_once "../config.php";

$sql = "DELETE FROM Etape;\n";
echo "$sql";
$GLOBALS['mysqli']->query($sql);

$sql = "DELETE FROM Participation;\n";
echo "$sql";
$GLOBALS['mysqli']->query($sql);

$sql = "DELETE FROM Covoiturage;\n";
echo "$sql";
$GLOBALS['mysqli']->query($sql);

?>