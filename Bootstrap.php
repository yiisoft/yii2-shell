<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yii\shell;

use yii\base\BootstrapInterface;

/**
 * Class Bootstrap
 *
 * @author Sascha Vincent Kurowski <svkurowski@gmail.com>
 * @since 2.0
 */
class Bootstrap implements BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        if ($app instanceof \yii\console\Application) {
            $app->controllerMap['shell'] = 'yii\shell\ShellController';
        }
    }
}
