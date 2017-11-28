<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "identitas_menawar_proyek".
 *
 * @property integer $id
 * @property integer $identitas
 * @property integer $proyek
 * @property string $dana
 * @property string $pesan
 * @property string $file
 * @property string $created_at
 * @property integer $waktu
 *
 * @property Identitas $identitas0
 * @property Proyek $proyek0
 */
class IdentitasMenawarProyek extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'identitas_menawar_proyek';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['identitas','waktu'], 'required'],
            [['identitas', 'proyek'], 'integer'],
            [['pesan'], 'string'],
            //[['waktu'],'save'],
            [['dana','waktu'], 'string', 'max' => 50],
            [['file'], 'string', 'max' => 255],
            [['created_at'], 'string', 'max' => 11],
            [['identitas'], 'exist', 'skipOnError' => true, 'targetClass' => Identitas::className(), 'targetAttribute' => ['identitas' => 'id']],
            [['proyek'], 'exist', 'skipOnError' => true, 'targetClass' => Proyek::className(), 'targetAttribute' => ['proyek' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'identitas' => 'Nama Penawar',
            'proyek' => 'Proyek',
            'dana' => 'Dana',
            'pesan' => 'Pesan',
            'file' => 'File',
            'created_at' => 'Created At',
            'waktu' => 'Deadline pengerjaan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdentitas0()
    {
        return $this->hasOne(Identitas::className(), ['id' => 'identitas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProyek0()
    {
        return $this->hasOne(Proyek::className(), ['id' => 'proyek']);
    }
}
