buoy-data-README.txt   Updated: 30-Jun-2006

Thanks for your interest in the buoy-data mesomap system.  As it says in the 
buoy-data.php file, this code is freeware.  You may copy/modify/use this script 
as you see fit, and no warranty is expressed or implied.

The system consists of three main parts:
  buoy-data.php - PHP script to produce the mesomap of buoy data from NDBC
  mybuoy-<name>.txt - configuration file for buoy-data.php
  <name>.jpg  -  JPEG image of mesomap

all of these files should be in the same directory for proper use.  If you wish to
use the wind direction arrows in the display, then a subdirectory:

  ./arrows/*.gif  

contains the optional wind direction arrows 14x14 transparent GIF files.

There are README.txt files in each subdirectory for more information.

------------------------------------------------------------------------------------
Installation:

1) un-ZIP the distribution file into a new directory, and ensure that folders are
   preserved.  The distribution ZIP contains files in directories:
   
   arrows
   samples
   contributed

   and these files in the main directory

   buoy-data.php
   buoy-data-readme.txt (this file)
   mybuoy-Monterey_Bay.txt
   Monterey_Bay.jpg 
   buoy-test.php
   buoy-test-split.php

2) upload these files to the selected directory on your website:
   
   buoy-data.php
   mybuoy-Monterey_Bay.txt
   Monterey_Bay.jpg
   arrows/*.gif     (entire arrows subdirectory)
   
   and optionally the two testing files
   
   buoy-test.php
   buoy-test-split.php

3) test http://your.website.com/yourdirectory/buoy-data.php

   you should see a mesomap of the Monterey Bay area near San Francisco, CA
   displayed in your browser.  If so, then you can begin customization (next section)
   
   If you don't see the mesomap displayed, then ensure that
    a) the files in (2) are uploaded on your website in the same directory
    b) your webhost supports PHP Version 4.1.2 or above with GD 2.0 enabled.

Tip: If you receive a PHP error at the top of the page indicating a
'safe mode error', then simply open your favorite text editor and type the 
following line:

safe_mode = off

Save the file as "php.ini" and upload it to the same directory you place the script. 
Refresh the page and the error should go away.
Thanks to Joe, W4TSI www.topsailweather.com for this tip.

 You can message me directly via PM on
    weatherforum.net (kenmtrue)
    ambient   (saratoga-weather)
    weathermatrix   (kenmtrue) or

    mail to webmaster@saratoga-weather.org
I'll try my best to support your request, but keep in mind that this is freeware ;-)

-------------------------------------------------------------------------------------
Setting the REQUIRED configuration inside buoy-data.php

There are three variables in the top of the main program that should be 
configured to your installation. Find the section that reads:

// ------- REQUIRED SETTINGS ------
  $Config = 'mybuoy-Monterey_Bay.txt';        // configuration file name
//  
//  use the config file listed above to control the mapimage name, location,
//  and buoys to be processed.  See the sample files for more examples.
//
//
  $DefaultUnits = 'E';        // 'E' = English, 'M' = Metric, may be 
//                           overridden by units=M or units=E parameter
//
  $ourTZ = 'PST8PDT';  //NOTE: this *MUST* be set correctly to
// translate UTC times to your LOCAL time for the displays.
//  http://saratoga-weather.org/timezone.txt  has the list of timezone names
//  pick the one that is closest to your location and put in $ourTZ like:
//    $ourTZ = 'America/Los_Angeles';  // or
//    $ourTZ = 'Europe/Brussels';
// also available is the list of country codes (helpful to pick your zone
//  from the timezone.txt table
//  http://saratoga-weather.org/country-codes.txt : list of country codes
// ------- END OF REQUIRED SETTINGS ------

and change the $Config to your configuration file name,
change $DefaultUnits to 'E' for English, or 'M' for metric, and
change $ourTZ to reflect your timezone using the examples above.

Save your changes, and upload the changed buoy-data.php file.


-------------------------------------------------------------------------------------
Configuration file:

The bulk of the configuration work for you will be in the mybuoy-<name>.txt file
itself.  Start by selecting a mybuoy-<name>.txt file from the ./samples directory,
and copying it up one directory level (same level as buoy-data.php), then open
the config file for editing.

Tip: the /samples directory contains the maps and config files, but you can maybe
save yourself some customization work by checking in the /contributed directory for
graphics and config files that have been contributed by users of the script.


The config file uses '#' in the first character for comments, also blank lines are
ignored. The vertical bar '|' is used to separate fields in the records.

There are three types of entries in the config file:
  MAPIMAGE
  LOCATION
  buoyid

The MAPIMAGE record specifies the JPEG image the script will use as a mesomap background,
the width,height of that image, and the X,Y offset of where to place the rotating
values display legend.  MAPIMAGE record must start with MAPIMAGE in column 1.

MAPIMAGE|Monterey_Bay.jpg|550,485|50,225|

means:
  Monterey_Bay.jpg  is the image file
  width=550 px, height=485 px
  Legend should be located starting at X=50, Y=255

Note on coordinates: X=0 is left side of image, Y=0 is top of image

  0,0  ----------------------- 100,0

             X,Y 


  0,100---------------------- 100,100

The LOCATION record specifies the Latitude, Longitude, and radial distance to
fetch buoy data from www.ndbc.noaa.gov.  Use as small a distance you can to
fetch the records. Less than 1500 is good for wide views, some samples use 200.

The latitude and longitude are of approximately midpoint of the area shown in
your mesomap.  You must specify N or S with Latitude, and W or E with Longitude.

LOCATION|37N|122W|750|

means:
  Latitude:  37 North
  Longitude: 122 West
  Radius:  750 nautical miles (if English units used) or 750 kilometers (if Metric)


The buoyid record specifies the buouid (in capital letters) of the buoy within
the radius specified by the LOCATION record.  It also specifies an optional name for
the buoy as the second field.  The third field is the hotspot coordinates 
X1,Y1,X2,Y2 for a rectangle with left-upper corner at X1,Y1 and right-lower corner
at X2,Y2.  The fourth field is optional, and is the amount in pixels to offset
the display of the rotating condition values.  

PCOC1|Port Chicago, CA|364,155,401,170|39,-15|

means:
  BuoyID: PCOC1
  Name:  Port Chicago, CA
  Coords: 364,155,401,170  (left,top = 364,155) (right,bottom = 401,170)
  Offset: 39,-15 (move right 39 pixels, move up 15 pixels)

By changing the offset value, you can position the values display to avoid interference
with other displays or graphics in the mesomap image.

You can try the following values for offset:
  0,-28  will usually place the values display on top of a hotspot

  40,-15 will usually place the values display to the right of the hotspot

See the sample files for more examples of tweaking the offset to make a better
arrangement of the values display.

The order of the buoyid records in the config file is the order used in the table
display of the values.  The LOCATION and MAPIMAGE records may appear anywhere
in the config file.  Comment out records by putting a # in the first character.

Tip:  If you want to sort the buoyid record north->south, the use the SECOND
number in the coords as the sort order-- arrange them lowest at top, highest at
bottom of the file, then you can fine tune as need be.

Tip:  You can fill in missing buoy names by clicking on the hotlink, copying the
buoy name from the NBDC page, and paste it into the second field.  I only did that
on two of the files (mybuoy-Monterey_Bay.txt, mybuoy-Southwest_inset.txt).  If you
modify one of the sample files to fit your needs, please send me a copy (email
webmaster@saratoga-weather.org) and I'll include it in the distribution.


----------------------------------------------------------------------------------
Roll your own mesomap

This is not for the faint-of-heart, and you should be skilled at making image
hotspots with your favorite HTML tool.

For this, you'll need a map graphic (JPEG), and a hotspot making tool (FrontPage, 
Dreamweaver, etc).  Use the tool to draw hotspots (left-top,bottom-right rectangles)
and create a <map> with <area shape="rect" coords="x1,x2,y1,y2" ... >.

Copy the numbers in the coords= field to your new config file, and repeat for each
buoy you want to list.

You can test the correctness of your hotspot placement by running 

   http://your.website/buoy-data.php?show=hotspots

which will display your mesomap with the hotspots outlined in green.  You can
then make adjustments to the config file coords for a buoy that isn't quite
positioned correctly.  Remember +X means right, -X means left, +Y means down,
-Y means up relative to the image.

If you make your own image and control file, please send them to me
webmaster@saratoga-weather.org and I'll put them in the distribution samples
file for others to enjoy.  It's all about sharing ;-)

----------------------------------------------------------------------------------
Optional program settings in buoy-data.php

In the settings area are several things you can change as you desire.  Please
read the code comments for instructions.


Ken True
webmaster@saratoga-weather.org