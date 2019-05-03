<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Refresh" content="300" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>buoy-data.php test page - split map and table</title>
<?php 
// Note: this code just allows the test script to run from
// any directory that contains the buoy-data.php program

// the real includes in your pages should use 
//  include("http://your.website/subdir/buoy-data.php?inc=CSS"); 
//
//  include("http://your.website/subdir/buoy-data.php?inc=Y"); 
// or
//  include("http://your.website/subdir/buoy-data.php?inc=MAP"); 
//  include("http://your.website/subdir/buoy-data.php?inc=TABLE"); 
//
//
  $doPrintBUOY = false;
  include("buoy-data.php");
  print $BUOY_CSS; 
?>
</head>
<body>
<h1>Buoy-data.php test page - split map and table </h1>
<p>This paragraph is <strong>above</strong> the map</p>
<?php print $BUOY_MAP; ?>
<p>This paragraph is <strong>below</strong> the map and <strong>above</strong> the table</p>
<?php print $BUOY_TABLE ?>
<p>This paragraph is <strong>below</strong> the table</p>
</body>
</html>
