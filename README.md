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
### Featured Image
- **Dimensions:** 1200x750 pixels (or similar, but at a 16:10 aspect ratio)
- **File Names:** `ben-miles_[project-name]_16x10.png`
- **File Types:** PNG is preferable in most cases for visual quality, but JPG is also sufficient. 
### Additional Images
- **Dimensions:** Any aspect ratio, no wider than 1080 pixels
- **File Names:** `ben-miles_[project-name]_[unique-description-of-image].png`
- **File Types:** PNG is preferable in most cases for visual quality, but JPG is also sufficient. 
### Video
- **Audio:** Muted or removed
- **Dimensions:** 960x600 for original capture, and 384x240 for optimized assets
- **Duration:** Optimized assets should be no longer than 15 seconds
- **File Names:** `ben-miles_[project-name].webm` for the original capture, and `ben-miles_[project-name]_min.webm` for optimized assets
- **File Types:** WEBM for optimized assets
- **Process:**
  - Using Chrome's DevTools with the device toolbar enabled, set "dimensions" to 1920x1200 pixels, and set "zoom" to 50%
  - Disable the vertical scrollbar by adding the CSS rule `overflow-y: hidden;` to the `<body>` element in DevTools
  - Enter the following JavaScript into the Console panel in DevTools (don't hit Enter yet):
  ```
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
  ```
  - Update the value of the `timeToScroll` var on the first line, to the desired duration of the scroll, in milliseconds
  - Using the [Screen Recorder](https://chrome.google.com/webstore/detail/screen-recorder/hniebljpgcogalllopnjokppmgbhaden) extension for Chrome, start a new recording with the following process:
    - Position the recording window away from the website to be captured and in close proximity to Chrome's DevTools (ideally on a separate monitor)  
    - "What do you want to capture?" Only Screen
    - "Record audio?" None
    - Click "Start Recording"
    - Click "Chrome Tab"
    - Highlight the appropriate tab in the list
    - Hit Enter to begin the recording, then select the Console panel in DevTools and hit Enter to trigger the script
    - Click "Stop" in Screen Recorder when the scroll completes
    - Click "Optimize"
    - Click "Save"
  - Rename file as per **File Names** above
  - Upload file to [EZGIF's Online Video Resizer](https://ezgif.com/resize-video)
  - Set "New width" to 384 and "New height" to 240
  - Leave "Output format and encoding" set to the default value, "Copy original"
  - Click "Resize video!"
  - Click "Save"
  - Rename file as per **File Names** above
