fbgallery is an yii extension which help you to include a nice photo gallery into your website.
Also, it can be used as a showroom or as a base for a little shop.

Description and facilities:

Structure
The fbgallery is structured in albums and collections (of albums).

Album
Is a page which includes thumbnails of gallery or when it is used in shop mode, will display pictures and information for a specific product.

Collection
In administration mode, a collection will display a cover for every album which exists, and will permit you to select which albums will be displayed to visitors in that collection.
The covers of albums may be sorted to be display in any order you like.
Clicking on a cover of an album, will redirect the visitor to album's page.

Title and description
Every album and every collection may have a title and a description. Those can be used as page heading.

Multilingual
The fbgallery is multilingual. You can use how many languages you like.
Album's and collection's title, description and information about every picture, support translation.

Administration
Administration is separate for two levels: editors and admins. Editors are logged users and have limited rights, while administrators
are a powerful category of logged users.
Available languages: English, Romanian.

Editor Panel
Editor panel is a draggable panel, which you can place it anywhere you like.
It is contextual for album and collection and according with settings made by administrators.

Control Panel
Control Panel is accessible only for administrators.
It is structured in 5 categories:

    Gallery - structured in 6 subcategories:
        Appearance,
        Shop,
        Image resize,
        Structure,
        Options,
        Languages
    Album
    Collection
    FancyBox
    Uploader


Default values can be loaded for:

    every category,
    all categories in block
    individual for every setting.


Every setting from Control Panel has its own help as a tooltip.

Pagination
The albums support the pagination. The number of pictures displayed in every page is selected in Control Panel. Pagination is not applicable when it is used shop mode.
If isn't used pagination, you can set how many pictures will be displayed in a row.

Uploader
Multiple files uploader, based on plupload plug-in.
The uploader is multilingual.
Unique file name can be generated to avoid overwriting existing photos in the album.
Uploader can set maximum file size dimension to be uploaded and can be set the maximum number of pictures to be uploaded in every album.
Uploader limitation: In safari for windows pictures will be loaded only file by file. Not working with IE previous to version 9.
Not tested in apple safari.

Picture information
Picture's title permit to use a wide range of characters, including arabic characters.
Alternatively, picture's title can be displayed as an informational box under the picture.
Use title when you need to display a very short information or use informational box when you need to display a long information, as Description, Price, Link and so on.
Informational box may be as big as you wish, and have support for plain text or html.

Wysiwyg support - cleditor
For every field which accept html, a wysiwyg editor is available with a single click.

Predefined information
Now it is possible to set predefined information for title or informational box for uploaded pictures.
Available options to be used as predefined: filename, page metatitle or predefined content.

Image removal
Multiple images can be selected to be deleted in block.
You can clear the gallery with just a click (plus confirmation).

Resizable thumbnails
The size of thumbnail can be set from Control Panel.

Thumbnail aspect
Can be set as square, landscape or portrait, from Control Panel.

Tooltips
The nice tooltip replace the ugly bubble displayed when mouse is over thumbnail. Can be used or not, selecting from Control Panel.

Themes
Supports interchangeable css themes.

Shop
Option to use album page as page for item of shop, with a bigger image as cover and a set of mini-thumbnails under the cover. Near thess pictures, you have a place to describe product from your shop page.
The shop mode will permit you to predefine some values to avoid repetition.

Files structure
Extension files structure has been changed, for a better future development.

Plugins
Included the plupload as uploader.
Included the newest version of fancybox (unfortunately last the free).
Included cleditor as wysiwyg editor.

Extension is XHTML valid;
Tested in Linux and windows.
Tested browsers: Firefox, Chrome, Opera, Safari, IE
The administration mode work with: Firefox, Chrome, Opera, Safari, IE9
Use Yii version: 1.1.8


