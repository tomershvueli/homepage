# Homepage

[![Mentioned in Awesome Selfhosted](https://awesome.re/mentioned-badge.svg)](https://github.com/Kickball/awesome-selfhosted#personal-dashboards)

This project is a simple, standalone, self-hosted PHP page that is meant to be your window to your server and the web. 

It is your minimalist corner of the internet. The background will update with a gorgeous (and royalty free) image from [Unsplash](https://unsplash.com/), or a custom source every 20 seconds. With it, a simple menu is available to you with your most frequented links. 

All the assets needed are part of the repo so it can run offline (though it won't fetch pretty background images for you). 

This project uses:
- Apache
- PHP and PHP cURL
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
Copy the config.sample.json file and rename to config.json. Be sure to update the fields as you see appropriate. You have the option to use the Unsplash API to fetch background images, or use a custom URL and JSON selector. If you choose to use Unsplash, will need to create a developer profile at [Unsplash](https://unsplash.com/) to use the background image functionality properly. 

## Configure Homepage
- `unlock_pattern` => Choose unlock pattern from [Mousetrap](https://craig.is/killing/mice)
- `clock_format` => Choose pattern format from [PHP's date function](http://php.net/manual/en/function.date.php)
- `hover_color` => The CSS color for menu items when hovered over
- `time_to_refresh_bg` => Time, in milliseconds, until it will fetch the next background image
- `idle_timer` => Set a number of milliseconds here if you'd like to automatically hide the menu after a certain time of inactivity. Leave this attribute out entirely if you don't want an idle timer. 
- `items` => Array of objects for links to be displayed. The menu will be in a grid of 3 icons per row on desktop. Object shape: 
  - `link` => Insert any link you'd like, or {{cur}} for the current URL of the page, i.e. `{{cur}}:32400/web/`. 
  - `icon` => Icon to be displayed, choose icons from [Font Awesome](http://fontawesome.io/icons/). 
  - `img` => Image to be displayed in place of an icon. Place image in `hp_assets/img` directory. Image will be displayed in size 80px x 80px. 
  - `alt` => Value for `title` of anchor tag. 
  - `new_tab` => Optional boolean value for whether link should open in new tab or current tab. 

__NOTE__: PHP cURL is required for fetching external images.

### Unsplash Background Images
- `unsplash_client_id` => Get Unsplash client ID from [Unsplash](https://unsplash.com/developers)

### Custom Background Images
- `custom_url` => Input a custom URL that will return proper JSON
- `custom_url_headers` => Add any headers that may be needed to complete a cURL request to the aforementioned URL properly
- `custom_url_selector` => Input a proper PHP array selector to be used on the JSON received above. For example, if I were to fetch from Github's user API with a 'custom_url' of 'https://api.github.com/users/octocat', the 'custom_url_selector' would simply be `['avatar_url']`. `[{random}]` can be replaced for a random index in an array. 