<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jm_financiamiento".
 *
 * @property int $fin_id
 * @property string $fin_financiamiento Tipo de financiamiento
 * @property string $fin_plazos Plazos de pago
 * @property int $fin_fkcotizacion Cotizacion
 *
 * @property JmCotizacion $finFkcotizacion
 */
class JmFinanciamiento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jm_financiamiento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fin_financiamiento', 'fin_plazos', 'fin_fkcotizacion'], 'required'],
            [['fin_financiamiento', 'fin_plazos'], 'string'],
            [['fin_fkcotizacion'], 'integer'],
            [['fin_fkcotizacion'], 'exist', 'skipOnError' => true, 'targetClass' => JmCotizacion::className(), 'targetAttribute' => ['fin_fkcotizacion' => 'cot_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fin_id'                => 'Fin ID',
            'fin_financiamiento'    => 'Tipo de financiamiento',
            'fin_plazos'            => 'Plazos de pago',
            'fin_fkcotizacion'      => 'Cotizacion',
        ];
    }

    /**
     * Gets query for [[FinFkcotizacion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFinFkcotizacion()
    {
        return $this->hasOne(JmCotizacion::className(), ['cot_id' => 'fin_fkcotizacion']);
    }
}
