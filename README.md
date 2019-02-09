# My Anime List Updater Script
A simple PHP script to update your now playing anime from [MALUpdater](http://www.malupdater.com/) or [Taiga](http://taiga.moe/).  It can be used to public display your now playing on your website (e.g. [my profile](https://injabie3.moe)).

# Script Set Up
- Create the table to store data using the SQL script on MySQL.
- Modify the PHP file to specify the correct variables, and upload this file to your local or publicly accessible web server. As this is a simple script, it is recommended to change the filename to something different to prevent spam.
- Send HTTP POST requests to the URL in which this PHP file is located.

# Taiga Set Up
- In Settings > Sharing > HTTP, enable "**Send HTTP request**, and specify the full URL to the PHP file.  It can be local, or publicly accessible.  Include the ``code`` query string.
- Change the format string as follows:
``user=%user%&name=%title%&ep=%episode%&eptotal=$if(%total%,%total%,?)&score=%score%&picurl=%image%&animeID=%id%``
![Taiga Screenshot](screenshot.jpg)
