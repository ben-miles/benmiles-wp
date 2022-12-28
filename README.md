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

## Media for Portfolio Items
- **Dimensions:** Cover/featured images should be sized 1200x750 pixels (or similar, but at a 16:10 aspect ratio). Additional images can be any size, but should be no wider than 1080 pixels.
- **File Names:** Files should be named `ben-miles_[project-name]_[description-if-applicable]_size.jpg`, where size is "16x10" for cover/featured images, or left blank for other sizes.
- **File Types:** PNG is preferable in most cases for visual quality, but JPG is also sufficient. 
- **Video:** For Portfolio Items that have video thumbnails, video should be captured at 1200x750 pixels (or similar, but at a 16:10 aspect ratio), then scaled down to 360x225 pixels. Final output should be WEBM format, with no audio track, and no longer than 15 seconds in duration.
