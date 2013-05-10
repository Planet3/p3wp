#The Planet3.0 theme version 3
Forked from the _s theme with the added goodness of Foundation

##List of things
* make alingleft/alignright not float on narrow screens
* vertical align centre is not working for the page-header. Flexbox might be a solution, though the spec might not be finalized yet. Need to investigate
* Byline code `<?php planet3_0_posted_on(); ?> by <?php planet3_0_posted_by(); ?>` needs to be fixed
*pullquote
* Author page
* More button
* https://www.subtome.com/
* Add if statements to the_post_thumbnail()

## Things to do on the live server before applying theme
* Split featured media category into images and video
* regenerate thumbnails
* WordPress Access Control overides the custom menu walker needed for the responsive nav menu. If we want to keep this functionality we need to find a replacement
* finalize thumbnail size