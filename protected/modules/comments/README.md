# yii-comments

yii-comments is a module for Yii Framework which allows you to make any instance of CActiveRecord commentable.  
This is a modification of the comments module available from <http://www.yiiframework.com/extension/comments-module/>  
It is supposed that you have user module installed.

# Changes

Added Gravatar Support  
Better Comment Management  
Admin interface for editing comments  
Admin interface for comments settings  
Anchor for each comments (e.g. http://example.com/page/1#comment-12)  
Better User Interaction  
and others.

# Installation

### Via Git:

From inside the modules directory in your application:

    git clone https://github.com/xtranophilist/yii-comments.git
    mv yii-comments comments
    

OR  
Download : <https://github.com/xtranophilist/yii-comments/zipball/master>  
Extract the contents and move to `comments` folder inside modules.

Execute the following SQL queries to create table and insert default comment settings.

        CREATE TABLE IF NOT EXISTS `comment` (
        `id` int(12) NOT NULL AUTO_INCREMENT,
        `owner_id` int(11) NOT NULL,
        `owner_name` varchar(50) NOT NULL,
        `count` int(11) NOT NULL,
        `parent_id` int(12) DEFAULT NULL,
        `creator_id` int(12) DEFAULT NULL,
        `user_name` varchar(128) DEFAULT NULL,
        `user_email` varchar(128) DEFAULT NULL,
        `comment_text` text,
        `create_time` int(11) DEFAULT NULL,
        `update_time` int(11) DEFAULT NULL,
        `status` int(1) NOT NULL DEFAULT '0',
        `link` text,
        PRIMARY KEY (`id`)
        );
    
        CREATE TABLE IF NOT EXISTS `comment_setting` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `model` varchar(50) NOT NULL,
        `registeredOnly` tinyint(1) NOT NULL DEFAULT '0',
        `useCaptcha` tinyint(1) NOT NULL DEFAULT '0',
        `allowSubcommenting` tinyint(1) NOT NULL DEFAULT '1',
        `premoderate` tinyint(1) NOT NULL DEFAULT '0',
        `isSuperuser` text,
        `orderComments` enum('ASC','DESC') NOT NULL DEFAULT 'ASC',
        `useGravatar` tinyint(1) NOT NULL DEFAULT '1',
        PRIMARY KEY (`id`)
        );
    
        INSERT INTO `comment_setting` (`id`, `model`, `registeredOnly`, `useCaptcha`, `allowSubcommenting`, `premoderate`, `isSuperuser`, `orderComments`, `useGravatar`) VALUES
        (1, 'default', 0, 0, 1, 1, 'Yii::app()->getModule("user")->isAdmin()', 'ASC', 1);
    

Edit config/main.php:

        'import' => array(
                'application.modules.comments.widgets.*',
                'application.modules.comments.components.*',
                'application.modules.comments.models.*',
                ...
            ),
        'modules' => array(
                ...
                'comments' => array(
                    'userConfig' => array(
                        'class' => 'User',
                        'nameProperty' => 'username',
                        'emailProperty' => 'email',
                    ),
                ),
        ),
    

# Usage:

Add `$this->widget('Comments', array('model' => $model));` to the view of any model to make it commentable.

Go to /comments to manage comments and to play with the settings.