<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jm_carrito".
 *
 * @property int $car_id Id
 * @property int $car_cantidad Cantidad
 * @property string $car_descripcion Descripcion
 * @property int $car_fkmodelo Modelo
 * @property int $car_fkventa Venta
 *
 * @property JmModelo $carFkmodelo
 * @property JmVenta $carFkventa
 * @property JmPagoservicio[] $jmPagoservicios
 */
class JmCarrito extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jm_carrito';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_cantidad', 'car_descripcion', 'car_fkmodelo', 'car_fkventa'], 'required'],
            [['car_cantidad', 'car_fkmodelo', 'car_fkventa'], 'integer'],
            [['car_descripcion'], 'string', 'max' => 50],
            [['car_fkventa'], 'exist', 'skipOnError' => true, 'targetClass' => JmVenta::className(), 'targetAttribute' => ['car_fkventa' => 'ven_id']],
            [['car_fkmodelo'], 'exist', 'skipOnError' => true, 'targetClass' => JmModelo::className(), 'targetAttribute' => ['car_fkmodelo' => 'mod_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'car_id'                => 'I4444d',
            'car_cantidad'     => 'Cantidad',
            'car_descripcion'  => 'Descripcion',
            'car_fkmodelo'     => 'Modelo',
            'car_fkventa'      => 'Vecxxcccerevrnta',
        ];
    }

    /**
     * Gets query for [[CarFkmodelo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarFkmodelo()
    {
        return $this->hasOne(JmModelo::className(), ['mod_id' => 'car_fkmodelo']);
    }

    /**
     * Gets query for [[CarFkventa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarFkventa()
    {
        return $this->hasOne(JmVenta::className(), ['ven_id' => 'car_fkventa']);
    }

    /**
     * Gets query for [[JmPagoservicios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJmPagoservicios()
    {
        return $this->hasMany(JmPagoservicio::className(), ['pagserv_fkcarrito' => 'car_id']);
    }
}
