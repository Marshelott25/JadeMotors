<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jm_descuento".
 *
 * @property int $des_id Id
 * @property int $des_porcentaje Porcentaje
 * @property string $des_inicio Fecha inicial
 * @property string $des_fin Fecha Final
 * @property int $des_fkmodelo Modelo
 *
 * @property JmModelo $desFkmodelo
 */
class JmDescuento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jm_descuento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['des_porcentaje', 'des_inicio', 'des_fin', 'des_fkmodelo'], 'required'],
            [['des_porcentaje', 'des_fkmodelo'], 'integer'],
            [['des_inicio', 'des_fin'], 'safe'],
            [['des_fkmodelo'], 'exist', 'skipOnError' => true, 'targetClass' => JmModelo::className(), 'targetAttribute' => ['des_fkmodelo' => 'mod_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'des_id'            => 'Id',
            'des_porcentaje'    => 'Porcentaje',
            'des_inicio'        => 'Fecha inicial',
            'des_fin'           => 'Fecha Final',
            'des_fkmodelo'      => 'Modelo',
        ];
    }

    /**
     * Gets query for [[DesFkmodelo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDesFkmodelo()
    {
        return $this->hasOne(JmModelo::className(), ['mod_id' => 'des_fkmodelo']);
    }
}
