# Ultimate WordPress Boilerplate for shared hostings

Just put together a WordPress starting Boilerplate to make WP development in shared hostings (FTP only)
less painful.

Using some great WP tools:

* [wordpress-multi-env-config](https://github.com/studio24/wordpress-multi-env-config)
* [wordpress-boilerplate](https://github.com/Darep/wordpress-boilerplate)
* [git-ftp](https://github.com/git-ftp/git-ftp)
* [wp-sync-db](https://github.com/wp-sync-db/wp-sync-db)
* [wp-sync-db-media-files](https://github.com/wp-sync-db/wp-sync-db-media-files)

The advantages this setup provides are:

* Separate config files for each environment
* Easy git sync through FTP (no need for SSH access)
* Easy DB and Media sync between environments

## Initial Setup

### Install
Just clone this repo and run it using your desired LAMP/LEMP stack.

**IMPORTANT!** 

Remember to use `--recursive` to make sure you pull all submodules
```
git clone --recursive https://github.com/eduwass/wp-shared-hostings.git
```

### Configure: [WordPress Multi-Environment Config](https://github.com/studio24/wordpress-multi-env-config)

#### Define env

You can define which environment you will be using in .htaccess
```
# Set Environment:
SetEnv WP_ENV development
```

#### Environment specific variables

Each environment has its own wp-config file:
```
- wp-config.development.php
- wp-config.staging.php 
- wp-config.production.php
```

You also have a **global settings** (shared by all environments) file:
``` 
- wp-config.default.php
```

#### Activate plugins
Acces your WordPress dashboard, e.g: `yourdomain.dev/admin`

Go to: **Dashboard > Plugins**

And activate the plugins:

* [wp-sync-db](https://github.com/wp-sync-db/wp-sync-db)
* [wp-sync-db-media-files](https://github.com/wp-sync-db/wp-sync-db-media-files)

#### Update/Change WordPress version
Update to latest WordPress version should be as easy as updating the corresponding submodule:

1. `cd wordpress/`
2. `git checkout tags/4.4.2`

## Work
### Folder structure
```
.
├── README.md
├── content                     <--- ALL your work should be in this folder
├── uploads                     <--- Uploads folder, contains media files (not tracked by git)
├── wordpress                   <--- WordPress submodule, don't touch this
├── wp-config.default.php       <--- Configuration files
├── wp-config.development.php
├── wp-config.env.php
├── wp-config.original.php
├── wp-config.php
├── wp-config.production.php
└── wp-config.staging.php
```

## Deploy
### [git-ftp](https://github.com/git-ftp/git-ftp)
[Official git-ftp Documentation](https://github.com/git-ftp/git-ftp/blob/develop/man/git-ftp.1.md)

Since a lot of shared hostings only provide FTP access, we use git-ftp to push git changes through 
the FTP protocol.

#### Install on MacOSX (see git-ftp docs for other OSs)
```
brew install git
brew install curl --with-ssl --with-libssh2
brew install git-ftp
```

#### Configure for deploy
Replace the variables with the correct FTP credentials and Run:
```
git config git-ftp.url [ftp host url]
git config git-ftp.user [ftp username]
git config git-ftp.password [ftp password]
git config git-ftp.syncroot [local dir to sync from]
git config git-ftp.remote-root [remote dir to sync to]
```

#### Push to FTP
After you've commited and pushed your changes to the repo, use this command to go ahead and deploy to FTP server:
```
git ftp push
```

### DB and Uploads Sync: [wp-sync-db](https://github.com/wp-sync-db/wp-sync-db)
For easy DB syncs between environments I recommend using the great [wp-sync-db](https://github.com/wp-sync-db/wp-sync-db) plugin.
![wp-sync-db](https://raw.github.com/slang800/psychic-ninja/master/wp-migrate-db.png)

To sync the `/uploads` folder, make sure you've enabled the [wp-sync-db-media-files](https://github.com/wp-sync-db/wp-sync-db-media-files)
plugin and use the checkbox **Media files**

![wp-sync-db](https://raw.github.com/slang800/psychic-ninja/master/wp-sync-db-media-files.png)
