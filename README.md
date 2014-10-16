## Photography Byline
#### Wordpress plugin by David Kissinger
#### First commit October 15, 2014
#### License: GPLv2
##### Follow me at www.DavidKDaily.com

*Note: This is my first commit on a simple plugin to alter the byline function in Wordpress. Please use discretion and thoroughly understand the functions and potential impacts on security and sanitizing your data before you put it into production!*

##### See below for upcoming mods that I'll do shortly. Comments and pull requests are welcome.

**Photography Byline** (photog-byline) is a Wordpress Plugin that should work for any theme, however I am using it on "So There's That: The writer meets the photographer: (http://sotheresthatblog.com), a lifestyle blog by David Kissinger and Charla Avery. So There's That features the Serene theme by Elegant Themes. Check out their great themes at www.elegantthemes.com.

Photog-byline was written so that each of our posts credit both the author ("Written by...") and also the photographer ("...and Photography by...") during the post Loop in the byline before the blog copy appears. To do this, I added a custom field called $stt_photog and saved it in post meta, so that the photographer is associated with individual posts. Post editors can choose from a dropdown menu on the editing page which photographer, if any, to credit. If no photographer is chosen, then it defaults to the original Serene copy.

**Important:** In order to work, photog-byline depends on additional changes made within functions.php inside the Serene theme. A snippet of that code is included here at functions-snippet.php. This chunk of code is intended to replace the function `et_postinfo_meta()` and is not a freestanding plugin file. In future versions of this plugin I will consolidate it into the plugin code itself.

If you want to apply this version of photog-byline to a different theme then you should update your theme's functions.php file accordingly. The actual plugin file of this version chooses a photographer from a list of registered users and attributes one of those users as the photographer for a given post by saving `$user->display_name` in post meta. 

Use caution while updating your theme's functions.php and remember that if your theme is updated by the publisher, you risk losing any changes!

Features to add or improve:
* Add permissions controls
* Add functionality for multiple photographers
* Add ability to credit photographers who are not registered users on the site
* Remove functionality from functions.php and consolidated all logic into the plugin itself
* Add uninstall functionality
