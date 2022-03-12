<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_vehiculo".
 *
 * @property int $veh_id Id
 * @property string $veh_nombre Nombre
 *
 * @property CatServicios[] $catServicios
 * @property JmModelo[] $jmModelos
 */
class CatVehiculo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_vehiculo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['veh_nombre'], 'required'],
            [['veh_nombre'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'veh_id' => 'Id',
            'veh_nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[CatServicios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatServicios()
    {
        return $this->hasMany(CatServicios::className(), ['serv_fkvehiculo' => 'veh_id']);
    }

    /**
     * Gets query for [[JmModelos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJmModelos()
    {
        return $this->hasMany(JmModelo::className(), ['mod_fkvehiculo' => 'veh_id']);
    }
}
