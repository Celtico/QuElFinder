QuElFinder 0.0.3-dev
========================

Zf2 module for ElFinder

Release Notes
========================

0.0.1-dev

- Initiation ElFinder in zf2

0.0.2-dev

- Initiation auto load class map

0.0.3-dev

- Update

Demo example
==================================

http://qumodules.com/

Requirements
========================
- ZendSkeletonApplication https://github.com/zendframework/ZendSkeletonApplication

Installation
========================
- Drag the folder into modules folder
- Move folder plugin in to public/js folder (look current version https://github.com/Studio-42/elFinder)
- Enable the module with the application.config.php and configure the routes with module.config.php

Installation by Composer
========================

```
cd YourFolderProject/
php composer.phar require "qu-modules/qu-elfinder":"dev-master"
```

Integration
========================
- Instance $ this-> QuCKEditor () in your project

#Sample

```html
<div id="elfinder"></div>
```

```php
   $this->QuElFinder(
           'elfinder',
           array(
               'width' => "100%",
               'height' => "600",
           )
    );
```

Support
========================
- CKEditor integration
