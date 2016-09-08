# Homepage

This project is a simple, standalone, self-hosted PHP page that is meant to be your window to your server and the web. 

It is your minimalist corner of the internet. The background will update with a gorgeous (and royalty free) image from [Unsplash](https://unsplash.com/) every 15 seconds. With it, a simple menu is available to you with your most frequented links. 

All the assets needed are part of the repo so it can run offline (though it won't fetch pretty background images for you). 

This project uses:
- jQuery
- Bootstrap CSS
- Mousetrap.js
- Font Awesome
- Unsplash

## Screenshots
Homepage w/o Menu:
![Homepage w/o Menu](example_img/homepage-wo-menu.png?raw=true)

Homepage with Menu Toggled:
![Homepage with Menu](example_img/homepage-w-menu.png?raw=true)


## To Use
Copy the config.sample.json file and rename to config.json. Be sure to update the fields as you see appropriate. Note that you will need to create a developer profile at [Unsplash](https://unsplash.com/) to use the background image functionality properly. 

## Configure Homepage
- 'unlock_pattern' => Choose unlock pattern from [Mousetrap](https://craig.is/killing/mice)
- 'clock_format' => Choose pattern format from [PHP's date function](http://php.net/manual/en/function.date.php)
- 'unsplash_client_id' => Get Unsplash client ID from [Unsplash](https://unsplash.com/developers)
- 'items' => The menu will be in a grid of 3 icons per row on desktop. Insert any link you'd like, or {{cur}} for the current URL of the page. Choose icons from [Font Awesome](http://fontawesome.io/icons/)

## License
MIT License

Copyright (c) 2016 Tomer Shvueli

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
