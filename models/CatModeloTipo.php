<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_modelotipo".
 *
 * @property int $modtip_id Id
 * @property int $modtip_fktipo Tipo
 * @property int $modtip_fkmodelo Modelo
 *
 * @property JmModelo $modtipFkmodelo
 * @property CatTipo $modtipFktipo
 */
class CatModeloTipo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_modelotipo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['modtip_fktipo', 'modtip_fkmodelo'], 'required'],
            [['modtip_fktipo', 'modtip_fkmodelo'], 'integer'],
            [['modtip_fktipo'], 'exist', 'skipOnError' => true, 'targetClass' => CatTipo::className(), 'targetAttribute' => ['modtip_fktipo' => 'tip_id']],
            [['modtip_fkmodelo'], 'exist', 'skipOnError' => true, 'targetClass' => JmModelo::className(), 'targetAttribute' => ['modtip_fkmodelo' => 'mod_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'modtip_id'       => 'Id',
            'modtip_fktipo'   => 'Tipo',
            'modtip_fkmodelo' => 'Modelo',
        ];
    }

    /**
     * Gets query for [[ModtipFkmodelo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModtipFkmodelo()
    {
        return $this->hasOne(JmModelo::className(), ['mod_id' => 'modtip_fkmodelo']);
    }

    /**
     * Gets query for [[ModtipFktipo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModtipFktipo()
    {
        return $this->hasOne(CatTipo::className(), ['tip_id' => 'modtip_fktipo']);
    }
}
