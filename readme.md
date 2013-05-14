#The Planet3.0 theme version 3
Forked from the _s theme with the added goodness of Foundation

##List of things
* Author page
    * Enable Google Authorship
* Beyond Page
* More button
* Add if statements to the_post_thumbnail()
* Develop full font stack
* Media section on front page needs title and description.
* Finalize thumbnail size

###List of less important things
* Contributors page
* Allow admins to overwrite author meta and avatar
* pullquote
* https://www.subtome.com/
* Make topbar not sticky for landscape on small screens
* Best of Category page
* Code clean up code
    * removing legacy support for `planet3_0_register_custom_background()`
    * Byline code `<?php planet3_0_posted_on(); ?> by <?php planet3_0_posted_by(); ?>` needs to be fixed

## Things to do on the live server before applying theme
* Split featured media category into images and video
* regenerate thumbnails
* WordPress Access Control overides the custom menu walker needed for the responsive nav menu. If we want to keep this functionality we need to find a replacement
* Disable About the Author Advanced