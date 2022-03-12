<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_formapago".
 *
 * @property int $forpag_id Id
 * @property string $forpag_nombre Nombre
 *
 * @property JmPagoservicio[] $jmPagoservicios
 */
class CatFormaPago extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_formapago';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['forpag_nombre'], 'required'],
            [['forpag_nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'forpag_id'     => 'Id',
            'forpag_nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[JmPagoservicios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJmPagoservicios()
    {
        return $this->hasMany(JmPagoservicio::className(), ['pagserv_fkformapago' => 'forpag_id']);
    }
}
