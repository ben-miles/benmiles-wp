# benmiles-wp
A custom WordPress theme plus data and plugins, for my portfolio website: [benmiles.com](https://benmiles.com/)

![This is an image](/wp-content/themes/benmiles-wp/screenshot.png)

## Installation & Updating
1. In the destination environment, complete the steps to install [WordPress](https://wordpress.org/)
2. Copy the contents of `/wp-content/` into the destination environment
3. Export a .SQL file from the develpment environment, containing structure + data for all tables
4. Open the .SQL file in a text editor, and find-and-replace the develpment URL with the destination URL
5. Save the .SQL file and import it into the destination database
6. In the WordPress backend, check that the custom theme and all plugins are activated and configured properly
