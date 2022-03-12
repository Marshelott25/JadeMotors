<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jm_personal".
 *
 * @property int $per_id Id
 * @property string $per_nombre Nombre
 * @property string $per_apellidopaterno Apellido Paterno
 * @property string $per_apellidomaterno Apellido Materno
 * @property string $per_domicilio Domicilio
 * @property string $per_fechanacimiento Fecha de nacimiento
 * @property string $per_rfc RFC
 * @property int $per_telefono Teléfono
 * @property string $per_correo Correo
 * @property int $per_fkuser Usuario
 *
 * @property JmCotizacion[] $jmCotizacions
 * @property JmMantenimiento[] $jmMantenimientos
 * @property JmPagoservicio[] $jmPagoservicios
 * @property JmPagoservicio[] $jmPagoservicios0
 * @property JmVenta[] $jmVentas
 * @property JmVenta[] $jmVentas0
 * @property User $perFkuser
 */
class JmPersonal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jm_personal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['per_nombre', 'per_apellidopaterno', 'per_apellidomaterno', 'per_domicilio', 'per_fechanacimiento', 'per_rfc', 'per_telefono', 'per_correo', 'per_fkuser'], 'required'],
            [['per_fechanacimiento'], 'safe'],
            [['per_telefono', 'per_fkuser'], 'integer'],
            [['per_nombre', 'per_apellidopaterno', 'per_apellidomaterno'], 'string', 'max' => 25],
            [['per_domicilio', 'per_correo'], 'string', 'max' => 50],
            [['per_rfc'], 'string', 'max' => 13],
            [['per_fkuser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['per_fkuser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'per_id' => 'Id',
            'per_nombre' => 'Nombre',
            'per_apellidopaterno' => 'Apellido Paterno',
            'per_apellidomaterno' => 'Apellido Materno',
            'per_domicilio' => 'Domicilio',
            'per_fechanacimiento' => 'Fecha de nacimiento',
            'per_rfc' => 'RFC',
            'per_telefono' => 'Teléfono',
            'per_correo' => 'Correo',
            'per_fkuser' => 'Usuario',
        ];
    }

    /**
     * Gets query for [[JmCotizacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJmCotizacions()
    {
        return $this->hasMany(JmCotizacion::className(), ['cot_fkcliente' => 'per_id']);
    }

    /**
     * Gets query for [[JmMantenimientos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJmMantenimientos()
    {
        return $this->hasMany(JmMantenimiento::className(), ['mant_fkpersonal' => 'per_id']);
    }

    /**
     * Gets query for [[JmPagoservicios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJmPagoservicios()
    {
        return $this->hasMany(JmPagoservicio::className(), ['pagserv_fkpersonlalE' => 'per_id']);
    }

    /**
     * Gets query for [[JmPagoservicios0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJmPagoservicios0()
    {
        return $this->hasMany(JmPagoservicio::className(), ['pagserv_fkpersonalR' => 'per_id']);
    }

    /**
     * Gets query for [[JmVentas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJmVentas()
    {
        return $this->hasMany(JmVenta::className(), ['ven_fkcliente' => 'per_id']);
    }

    /**
     * Gets query for [[JmVentas0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJmVentas0()
    {
        return $this->hasMany(JmVenta::className(), ['ven_fkvendedor' => 'per_id']);
    }

    /**
     * Gets query for [[PerFkuser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerFkuser()
    {
        return $this->hasOne(User::className(), ['id' => 'per_fkuser']);
    }
}
