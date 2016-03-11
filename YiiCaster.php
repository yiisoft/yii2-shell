<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yii\shell;

use Symfony\Component\VarDumper\Caster\Caster;
use yii\db\ActiveRecord;

/**
 * YiiCaster provides wrapper for casters of psysh
 *
 * @author Daniel Gomez Pan <pana_1990@hotmail.com>
 * @since 2.0
 */
class YiiCaster
{
    /**
     * Get an array representing the properties of a model.
     *
     * @param \yii\db\ActiveRecord $model
     * @return array
     */
    public static function castModel(ActiveRecord $model)
    {
        $attributes = array_merge(
            $model->getAttributes(), $model->getRelatedRecords()
        );
        $results = [];
        foreach ($attributes as $key => $value) {
            $results[Caster::PREFIX_VIRTUAL.$key] = $value;
        }
        return $results;
    }
}
