<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_tipo".
 *
 * @property int $tip_id Id
 * @property string $tip_nombre Nombre
 *
 * @property CatModelotipo[] $catModelotipos
 */
class CatTipo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_tipo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tip_nombre'], 'required'],
            [['tip_nombre'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tip_id'      => 'Id',
            'tip_nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[CatModelotipos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatModelotipos()
    {
        return $this->hasMany(CatModelotipo::className(), ['modtip_fktipo' => 'tip_id']);
    }
}
