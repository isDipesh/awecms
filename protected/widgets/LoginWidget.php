<?php

/**
 * Login widget for Yii-user
 * 
 * Usage:
 * 
 * <code>
 *   # Basic:
 * 	$this->widget('LoginWidget');
 * </code>
 * 
 * @author Vitaliy Stepanenko <mail@vitaliy.in>
 * @license BSD
 * @package yii-user.widgets
 * @version $Id:$
 * @since File available since revision 91
 */

/**
 * Login widget for Yii-user
 */
class LoginWidget extends CWidget {

    /**
     * List of Urls, on which this widget will be not rendered.
     * 
     * @var array
     */
    public $ignoredUrls = array(
        'user/registration',
        'user/login',
        'user/profile'
    );

    /**
     * Checks that current Url is not in ignore list
     * @see ignoredUrls
     * @return bool
     * 
     */
    protected function isCurrentUrlAllowed() {
        if (!empty($this->ignoredUrls)) {
            $route = Yii::app()->urlManager->parseUrl(Yii::app()->request);
            foreach ($this->ignoredUrls as $url) {
                if (strpos($route, $url) === 0) {
                    return false;
                }
            }
        }
        return true;
    }

    /**
     * Publish widget assets
     */
    protected function publishAssets() {
        if (($theme = Yii::app()->getTheme()) !== null) {

            $className = str_replace('\\', '_', ltrim(get_class($this), '\\')); # Possibly namespaced class
            $path = $theme->getViewPath() . DIRECTORY_SEPARATOR . $className;
            if (!is_dir($path))
                $path = $this->getViewPath();
        }else {
            $path = $this->getViewPath();
        }

        return Yii::app()->assetManager->publish(
                        $path . DIRECTORY_SEPARATOR . 'assets', false, -1, YII_DEBUG
        );
    }

    /**
     * Executes the widget.
     * This method is called by {@link CBaseController::endWidget}.
     */
    public function run() {
        if (!$this->isCurrentUrlAllowed()) {
            return;
        }

        $assetUrl = $this->publishAssets();
        $module = Yii::app()->getModule('user'); # Call this before using any other classes from Yii-user
        $model = new UserLogin;     # to provide import of all needed classes in UserModule::init()
        $viewName = 'loginWidgetForm';

        if (Yii::app()->user->isGuest) {
            if (isset($_POST['UserLogin'])) {
                $model->attributes = $_POST['UserLogin'];
                if ($model->validate()) {
                    $user = $module->user();
                    $user->lastvisit = time();
                    $user->save();
                    #Not shure, that we need this code, coz redirecting can be controlled in RBAC system
                    //if ($actionId == 'registration') Yii::app()->controller->redirect('/');                    
                    $viewName = 'loginWidgetDone';
                }
            }
        } else {
            $viewName = 'loginWidgetDone';
        }

        $this->render($viewName, array(
            'model' => $model,
            'user' => $module->user(),
            'assetUrl' => $assetUrl,
            'module' => $module,
        ));
    }

}

