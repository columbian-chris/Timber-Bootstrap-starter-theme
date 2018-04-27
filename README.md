Starter Theme Timber Bootstrap, forked from [@rollingcode's](https://github.com/rollincode/Timber-Bootstrap-starter-theme) and updated for Bootstrap 4
===

Timber and Bootstrap combined into one WordPress theme.

Uses:
---
- Timber library
- Bootstrap 4
- NPM for package management
- Sass
- Gulp for building and auto reloading

Theme Prerequisites
---
Timber-library WordpPress plugin. Get it from [here](https://wordpress.org/plugins/timber-library/) or [here](https://github.com/jarednova/timber) or see below to install using composer.

Installation
------------

- Clone the repo in to the themes directory of your development WordPress installation.

	`git clone https://github.com/columbian-chris/Timber-Bootstrap-starter-theme.git`
    
- Change to the `your-theme-name` directory
- Remove the `.git` directory and run `git init` to initialize your own git repo
- If you haven't installed the required Timber library, type

	`composer install`

- Open up `src/sass/style.scss` and modify theme name and other details to your liking
- Make sure you have `nodejs` installed and run

	`npm install`

- and then

	`gulp`

That's all !

Links
=====
Timber: [http://upstatement.com/timber/]
Bootstrap: [http://getbootstrap.com/]
Gulp: [http://gulpjs.com/]
