# PHP MVC Framework Template

### Environment setup steps : 

- Update config.php:  
  Open the config.php file in your project and update any configuration parameters as needed, such as database credentials or other environment-specific settings.

  
- Remove web.config Files (Apache Server):  
If your project is hosted on an Apache server, you don't need web.config files.
Check your project directory for any web.config files and remove them.
Remove .htaccess Files and keep web.config if on an IIS server.


- Remove info.php on Production:  
Locate and remove the info.php file from your project directory.
The info.php file might contain sensitive information about your server configuration, and it's good practice to remove it from a production environment.
