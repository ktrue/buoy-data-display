README-Samples.txt  -- Updated: 28-Jun-2006

The .jpg files were downloaded from area maps on www.ndbc.noaa.gov 
with the same names as used on the NDBC website.

The mybuoy-(JPG NAME).txt configuration files were created by some Perl scripts from
the hotspot data on the NDBC page that refered to the .jpg graphic.

With the exception of mybuoy-Monterey_Bay.txt configuration file, ALL the other
configuration files will require some customization before you use them for-real on
your website.  Only the LOCATION and MAPIMAGE entries have been set up in the files.
The detail lines for each buoy do contain the correct BUOYID, COORDS and in some cases,
the Buoy Name based on lookups from the NDBC website.

You will probably have to insert OFFSET data for multiple buoy lines in order to have
the rotating displays positioned to not overlap other displays.  

You will need to insert the BUOYNAME (where missing), and an OFFSET to make the display
more pleasing to the eye.

If you change a config file, please send me a copy of the file so I can include it in
the distribution for others to enjoy.  Thanks!

Ken True
webmaster@saratoga-weather.org
