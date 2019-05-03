<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Refresh" content="300" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
  $doPrintBUOY = false;
  include("buoy-data.php");
  print $BUOY_CSS; 
?>
<title>test page for buoy-data.php include</title>
</head>
<h1>Buoy-data.php test page</h1>
<p>This paragraph is above the map</p>
<?php print $BUOY_MAP; ?>
<p>This paragraph is below the map and above the table</p>
<?php print $BUOY_TABLE ?>
<p>This paragraph is below the table</p>

<body>
</body>
</html>
