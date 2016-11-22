<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yii\shell;

use yii\console\Controller;
use Psy\Shell;
use Psy\Configuration;

/**
 * Runs interactive shell. That is especially useful when developing an application and you want to try
 * some method of your code.
 *
 * @author Daniel Gomez Pan <pana_1990@hotmail.com>
 * @since 2.0
 */
class ShellController extends Controller
{
    /**
     * @var array include file(s) before starting tinker shell
     */
    public $include = [];


    /**
     * @inheritdoc
     */
    public function options($actionID)
    {
        return array_merge(parent::options($actionID), [
            'include'
        ]);
    }

    /**
     * Runs interactive shell
     */
    public function actionIndex()
    {
        $config = new Configuration;
        $config->getPresenter()->addCasters(
            $this->getCasters()
        );
        $shell = new Shell($config);
        $shell->setIncludes($this->include);
        $shell->run();
    }

    /**
     * @return array casters for psysh
     */
    protected function getCasters()
    {
        return [
            'yii\db\ActiveRecord' => 'yii\shell\YiiCaster::castModel',
        ];
    }
}
