<?php
header("Content-disposition: attachment; filename=SCEII.apk");
header("Content-type: application/apk");
readfile("SCEII.apk");
?>