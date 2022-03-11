<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jm_venta".
 *
 * @property int $ven_id Id
 * @property string $ven_fecha Fecha
 * @property int $ven_pedidonumero Pedido numero
 * @property string $ven_estatus Estatus
 * @property int $ven_fkcliente Cliente
 * @property int $ven_fkvendedor Vendedor
 *
 * @property JmCarrito[] $jmCarritos
 * @property JmPersonal $venFkcliente
 * @property JmPersonal $venFkvendedor
 */
class JmVenta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jm_venta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ven_fecha', 'ven_pedidonumero', 'ven_estatus', 'ven_fkcliente', 'ven_fkvendedor'], 'required'],
            [['ven_fecha'], 'safe'],
            [['ven_pedidonumero', 'ven_fkcliente', 'ven_fkvendedor'], 'integer'],
            [['ven_estatus'], 'string'],
            [['ven_fkcliente'], 'exist', 'skipOnError' => true, 'targetClass' => JmPersonal::className(), 'targetAttribute' => ['ven_fkcliente' => 'per_id']],
            [['ven_fkvendedor'], 'exist', 'skipOnError' => true, 'targetClass' => JmPersonal::className(), 'targetAttribute' => ['ven_fkvendedor' => 'per_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ven_id'           => 'Id',
            'ven_fecha'        => 'Fecha',
            'ven_pedidonumero' => 'Pedido numero',
            'ven_estatus'      => 'Estatus',
            'ven_fkcliente'    => 'Cliente',
            'ven_fkvendedor'   => 'Vendedor',
            'otro'             => 'Prueba',
        ];
    }

    /**
     * Gets query for [[JmCarritos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJmCarritos()
    {
        return $this->hasMany(JmCarrito::className(), ['car_fkventa' => 'ven_id']);
    }

    /**
     * Gets query for [[VenFkcliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVenFkcliente()
    {
        return $this->hasOne(JmPersonal::className(), ['per_id' => 'ven_fkcliente']);
    }

    /**
     * Gets query for [[VenFkvendedor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVenFkvendedor()
    {
        return $this->hasOne(JmPersonal::className(), ['per_id' => 'ven_fkvendedor']);
    }
    public function getOtro()
    {
        return 'hola';
    }
}
