<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jm_cotizacion".
 *
 * @property int $cot_id Id
 * @property string $cot_fecha Fecha
 * @property int $cot_descuento Descuento
 * @property float $cot_precio precio
 * @property int $cot_fkmodelo Modelo
 * @property int|null $cot_fkcliente
 *
 * @property JmModelo $cotFkmodelo
 * @property JmFinanciamiento[] $jmFinanciamientos
 */
class JmCotizacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jm_cotizacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cot_fecha', 'cot_descuento', 'cot_precio', 'cot_fkmodelo'], 'required'],
            [['cot_fecha'], 'safe'],
            [['cot_descuento', 'cot_fkmodelo', 'cot_fkcliente'], 'integer'],
            [['cot_precio'], 'number'],
            [['cot_fkmodelo'], 'exist', 'skipOnError' => true, 'targetClass' => JmModelo::className(), 'targetAttribute' => ['cot_fkmodelo' => 'mod_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cot_id'         => 'Id',
            'cot_fecha'     => 'Fecha',
            'cot_descuento' => 'Descuento',
            'cot_precio'    => 'precio',
            'cot_fkmodelo'  => 'Modelo',
            'cot_fkcliente' => 'Cot Fkcliente',
        ];
    }

    /**
     * Gets query for [[CotFkmodelo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCotFkmodelo()
    {
        return $this->hasOne(JmModelo::className(), ['mod_id' => 'cot_fkmodelo']);
    }

    /**
     * Gets query for [[JmFinanciamientos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJmFinanciamientos()
    {
        return $this->hasMany(JmFinanciamiento::className(), ['fin_fkcotizacion' => 'cot_id']);
    }
}
