<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace yii\shell;

use yii\base\BootstrapInterface;
use yii\helpers\ArrayHelper;

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
            $app->controllerMap['shell'] = ArrayHelper::merge([
                'class' => 'yii\shell\ShellController',
                'shellConfig' => [
                    'updateCheck' => 'never',
                ],
            ], isset($app->controllerMap['shell']) ? $app->controllerMap['shell'] : []);
        }
    }
}
