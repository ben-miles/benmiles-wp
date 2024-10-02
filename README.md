# benmiles-wp
A custom WordPress theme plus data and plugins, for my portfolio website: [benmiles.com](https://benmiles.com/)

![BenMiles-WP Screenshot](/wp-content/themes/benmiles-wp/screenshot.png)

[![WordPress](https://img.shields.io/badge/WordPress-3858E9?style=for-the-badge&logo=wordpress&logoColor=white)](https://wordpress.org/)
[![Vultr](https://img.shields.io/badge/Vultr-007BFC?style=for-the-badge&logo=vultr&logoColor=white)](https://vultr.com/)

## Development
Instructions in this README are based on the following setup:

- **IDE:** [Visual Studio Code](https://code.visualstudio.com/)
- **Local Server:** [Laragon](https://laragon.org)
- **Database:** [HeidiSQL](https://www.heidisql.com/)
- **FTP:** [Filezilla](https://filezilla-project.org/)

## Installation
1. In the destination environment, complete the steps to install [WordPress](https://wordpress.org/)
2. In the WordPress backend, check that the custom theme and all plugins are activated and configured properly
3. Copy the contents of `/wp-content/` into the destination environment
4. Export a .SQL file from the develpment environment, containing structure + data for all tables
5. Open the .SQL file in a text editor, and find-and-replace the develpment URL with the destination URL
6. Save the .SQL file and import it into the destination database

## Updating
1. The idea is to move only what has changed, so keep code changes in Git, and migrate file changes via FTP or File Manager.
2. Upload **file changes** to the remote server. Generally speaking, the files that will need to be migrated will mostly be in two locations:
  - Updates to theme files: `~\benmiles-wp\wp-content\themes\benmiles-wp`
  - Updates to media library: `~\benmiles-wp\wp-content\uploads` (You can further reduce the amount of files to be transferred by drilling down into the subdirectories named for the appropirate year(s) and month(s))
  - If Plugins are updated on the local dev environment, be sure to also grab files from `~\benmiles-wp\wp-content\plugins`
3. Export the **database changes** from the local server. Make sure that _Replace existing data_ is selected. Generally speaking, the tables that will need to be migrated will mostly be in five locations:
  - New Posts (including Custom Post Types): `posts`
  - New Post Metadata: `post_meta`
  - Changes to Categories: `terms`
  - Changes to Tags: `term_taxonomy`
  - Associations between Posts and Categories/Tags: `term_relationships`
4. Replace any strings referencing the domain, to reflect the remote host instead of the local dev host. To do this:
  - Open the SQL file in a text editor, and find-and-replace the following strings:
  - `benmiles-wp.test` to `benmiles.com`, then
  - `http://benmiles.com` to `https://benmiles.com`
5. Import the SQL file into the remote host's database. Make sure the database (even if there's only one) is selected, then use the following settings (these are usually the default):
  - All the interruption of an import...: `true`
  - Skip the number of queries...: `0`
  - Enable foreign key checks: `true`
  - Format: `SQL`
  - SQL compatibility mode: `NONE`
  - Do not use AUTO_INCREMENT for zero values: `true`
6. If it looks like something isn't showing up after migrating these changes, a good practice is to **regenerate permalinks**. To do this:
  - Log into the remote WordPress installation
  - Navigate to _Settings > Permalinks_
  - Scroll to the bottom of this page and click _Save Changes_ (even though no changes have been made)

## Notes Regarding Media
### Featured Images
- **Dimensions:** 1200x750 pixels (or similar, but at a 16:10 aspect ratio)
- **File Names:** `ben-miles_[project-name]_16x10.png`
- **File Types:** PNG is preferable in most cases for visual quality, but JPG is also sufficient. 
### Additional Images
- **Dimensions:** Any aspect ratio, no wider than 720 pixels
- **File Names:** `ben-miles_[project-name]_[unique-description-of-image].png`
- **File Types:** PNG is preferable in most cases for visual quality, but JPG is also sufficient. For web site screenshots, I prefer to use [FastStone Image Resizer](https://www.faststone.org/FSResizerDownload.htm) with the following settings:
  - Format: JPG, Quality: 70, Photometric: RGB, Color Subsampling: Disabled, Smoothing: 0, Optimize Huffman Table: Enabled, Progressive: Disabled, Keep EXIF: Enabled
  - Advanced Options: Resize ( Based on one side, Width, Exactly 720px, Filter: Lancos3 )
### Videos
- **Audio:** Muted or removed
- **Dimensions:** 960x600 for original capture, and 384x240 for optimized assets
- **Duration:** Optimized assets should be no longer than 15 seconds
- **File Names:** `ben-miles_[project-name].webm` for the original capture, and `ben-miles_[project-name]_min.webm` for optimized assets
- **File Types:** WEBM for optimized assets
- **Process:**
  - **Load the site** to be recorded in a new browser tab or window, maximized on the primary monitor.
  - **Prepare the browser** by opening Chrome's DevTools, snapped to one half of the second monitor, with the device toolbar enabled, and set the following options:
    - Dimensions: Responsive
    - Width: 1920
    - Height: 1200
    - Zoom: 50%
    - Device pixel ratio: 1.0
    - Device type: Mobile (no touch)
    - Throttling: No throttling
  - **Copy this JavaScript snippet**, *after* updating the value of `timeToScroll` to the desired duration in milliseconds:
    - `
    var timeToScroll = 10000;
    scrollTo(document.documentElement.scrollHeight-document.documentElement.clientHeight, timeToScroll);
    function scrollTo(element, duration) {
      var e = document.documentElement;
        if(e.scrollTop===0){
            var t = e.scrollTop;
            ++e.scrollTop;
            e = t+1===e.scrollTop--?e:document.body;
        }
        scrollToC(e, e.scrollTop, element, duration);
    }
    function scrollToC(element, from, to, duration) {
        if (duration <= 0) return;
        if(typeof from === "object")from=from.offsetTop;
        if(typeof to === "object")to=to.offsetTop;
        scrollToX(element, from, to, 0, 1/duration, 20, easeInOutSine);
    }
    function scrollToX(element, xFrom, xTo, t01, speed, step, motion) {
        if (t01 < 0 || t01 > 1 || speed<= 0) {
           element.scrollTop = xTo;
            return;
        }
      element.scrollTop = xFrom - (xFrom - xTo) * motion(t01);
      t01 += speed * step;
      setTimeout(function() {
        scrollToX(element, xFrom, xTo, t01, speed, step, motion);
      }, step);
    }
    function easeInOutSine(t){
      return -(Math.cos(Math.PI*t)-1)/2;
    }
    `
  - **Prepare the recording** by opening the [Screen Recorder](https://chrome.google.com/webstore/detail/screen-recorder/hniebljpgcogalllopnjokppmgbhaden) extension for Chrome, snapped to the other half of the second monitor, and complete the following steps:
    - What do you want to capture: Only Screen
    - Record audio: None
    - Click "Start Recording"
    - Click "Chrome Tab"
    - Highlight the appropriate tab in the list
  - **Record** by following these steps, starting each step *immediately* after the preceding step:
    - Hit Enter in Screen Recorder to begin the recording
    - Select the Console panel in DevTools
    - Hit F5 to refresh (this will reset any entrance animations that were already triggered)
    - Hit CTRL+V to paste the script
    - Hit Enter to trigger the scroll animation
    - Click "Stop" in Screen Recorder as soon as the scroll animation completes
  - **Save the recording** by doing the following:
    - Click "Optimize"
    - Click "Save"
    - Rename file as per **File Names** above
  - **Optimize the video** by doing the following:
    - Upload file to [EZGIF's Online Video Resizer](https://ezgif.com/resize-video)
    - Set "New width" to 384 and "New height" to 240
    - Leave "Output format and encoding" set to the default value, "Copy original"
    - Click "Resize video!"
    - Click "Save"
    - Rename file as per **File Names** above
s