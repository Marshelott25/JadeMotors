<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jm_modelo".
 *
 * @property int $mod_id Id
 * @property string $mod_nombre Nombre
 * @property float $mod_precio Precio
 * @property int $mod_fkmarca Marca
 * @property int $mod_fkvehiculo Vehículo
 *
 * @property CatModelotipo[] $catModelotipos
 * @property JmCarrito[] $jmCarritos
 * @property JmCotizacion[] $jmCotizacions
 * @property JmDescuento[] $jmDescuentos
 * @property CatMarca $modFkmarca
 * @property CatVehiculo $modFkvehiculo
 */
class JmModelo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jm_modelo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mod_nombre', 'mod_precio', 'mod_fkmarca', 'mod_fkvehiculo'], 'required'],
            [['mod_precio'], 'number'],
            [['mod_fkmarca', 'mod_fkvehiculo'], 'integer'],
            [['mod_nombre'], 'string', 'max' => 20],
            [['mod_fkmarca'], 'exist', 'skipOnError' => true, 'targetClass' => CatMarca::className(), 'targetAttribute' => ['mod_fkmarca' => 'mar_id']],
            [['mod_fkvehiculo'], 'exist', 'skipOnError' => true, 'targetClass' => CatVehiculo::className(), 'targetAttribute' => ['mod_fkvehiculo' => 'veh_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mod_id'              => 'Id',
            'mod_nombre'       => 'Nombre',
            'mod_precio'     => 'Precio',
            'mod_fkmarca'    => 'Marca',
            'mod_fkvehiculo' => 'Vehículo',
            'otro'           => 'Prueva',
        ];
    }

    /**
     * Gets query for [[CatModelotipos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatModelotipos()
    {
        return $this->hasMany(CatModelotipo::className(), ['modtip_fkmodelo' => 'mod_id']);
    }

    /**
     * Gets query for [[JmCarritos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJmCarritos()
    {
        return $this->hasMany(JmCarrito::className(), ['car_fkmodelo' => 'mod_id']);
    }

    /**
     * Gets query for [[JmCotizaciones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJmCotizaciones()
    {
        return $this->hasMany(JmCotizacion::className(), ['cot_fkmodelo' => 'mod_id']);
    }

    /**
     * Gets query for [[JmDescuentos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJmDescuentos()
    {
        return $this->hasMany(JmDescuento::className(), ['des_fkmodelo' => 'mod_id']);
    }

    /**
     * Gets query for [[ModFkmarca]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModFkmarca()
    {
        return $this->hasOne(CatMarca::className(), ['mar_id' => 'mod_fkmarca']);
    }

    /**
     * Gets query for [[ModFkvehiculo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModFkvehiculo()
    {
        return $this->hasOne(CatVehiculo::className(), ['veh_id' => 'mod_fkvehiculo']);
    }

    public function getOtro()
    {
        return 'hola'; 
    }

}
