# Ultimate WordPress Boilerplate for shared hostings

## Initial Setup

### Install
Just clone this repo and run it using your desired LAMP/LEMP stack.

**IMPORTANT!** 

Remember to use `--recursive` to make sure you pull all submodules
```
git clone --recursive git://github.com/foo/bar.git
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

## Work
### Folder structure
```
.
├── README.md
├── content                     <--- ALL your work should be in this folder
├── uploads                     <--- Uploads folder, contains media files
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

#### Install on MacOSX
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

### [wp-sync-db](https://github.com/wp-sync-db/wp-sync-db)
For easy DB syncs between environments we are using the [wp-sync-db](https://github.com/wp-sync-db/wp-sync-db) plugin.
<p align="center"><a><img src="https://raw.github.com/slang800/psychic-ninja/master/wp-migrate-db.png"/></a></p>

#### Updating WordPress version
Update to latest WordPress version:

1. `cd wordpress/`
2. `git submodule update`

