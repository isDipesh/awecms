yii-menu
=====================================

Menu Management for Yii Framework

This module allows you to create and edit themeable menus with nested items.
This work is inspired from menu management in Wordpress and tries to provide a similar interface to drag and drop items for setting its order and depth.

The module utilizes [nestedSortable](http://mjsarfatti.com/sandbox/nestedSortable/) jQuery plugin for drag-drop sorting of menu items in backend.  
Free CSS dropdown menu from <http://www.lwis.net/free-css-drop-down-menu/> is used for menu styles and themes.

The code for menu rendering is borrowed from [emenu](http://www.yiiframework.com/extension/emenu) extension.  
The code for implementing nestedSortable is borrowed from the dead project at <http://code.google.com/p/at-menu>

## Installation

Download from <https://github.com/awecms/menu/downloads>

Extract the contents of the archive to menu folder inside modules.

Acknowledge Yii about this module by including it into list of modules in `config/main.php`

~~~
        'modules' => array(
                ...
                'menu',
            ),
~~~

Add the components and models required to your imports section

~~~
        'import' => array(
            ...
            'application.modules.menu.models.*',
            'application.modules.menu.components.*',
            ),
~~~

## Usage

Browse to /menu to create menu and menu items.  
Click on 'Get Code' link to get code for any menu.  
Insert the code into any layout or view file.