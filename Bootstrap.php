<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yii\shell;

/**
 * Class Bootstrap
 *
 * @author Daniel Gomez Pan <pana_1990@hotmail.com>
 * @since 2.0
 */
class Bootstrap implements \yii\base\BootstrapInterface
{
    public function bootstrap($app)
    {
        if ($app instanceof \yii\console\Application) {
            $app->controllerMap['shell'] = 'yii\shell\ShellController';
        }
    }
}
