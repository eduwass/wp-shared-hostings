WordPress Start:  Boilerplate + MultiEnvironment
=====================

https://github.com/Darep/wordpress-boilerplate
WordPress Boilerplate is a simple starting point which includes WordPress as a submodule, the required configurations and a dummy plugin theme structure.


https://github.com/studio24/wordpress-multi-env-config
MultiEnvironment supports multiple environments such as your local development copy, a test staging site, and the live production site.

## Installation

Clone the repository (make sure you have a Github ID set up):

    git clone --recursive git@bitbucket.org:eduwass1/wordpress-start.git

And remove this origin repository from your working copy:

    cd wordpress-start
    git remote rm origin

Add your new origin repository to your working copy:

    git remote add origin <url_here>

## Additional

Add the VirtualHost to your Vagrant box (edit Vagrantfile & vhosts.pp)

Add needed changes to the following files (set correct URL & Database):
	
	wp-config.development.php
	wp-config.xxx.php
