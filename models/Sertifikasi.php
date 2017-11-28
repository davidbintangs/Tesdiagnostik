<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sertifikasi".
 *
 * @property integer $id
 * @property string $judul
 * @property string $pemberi
 * @property resource $gambar
 * @property string $tahun
 * @property string $keterangan
 * @property integer $identitas
 *
 * @property Identitas $identitas0
 */
class Sertifikasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file_sertifikat;
    public static function tableName()
    {
        return 'sertifikasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gambar'], 'string'],
            [['identitas'], 'integer'],
            [['sertifikat','judul', 'pemberi', 'tahun'], 'string', 'max' => 50],
            [['keterangan'], 'string', 'max' => 255],
            [['identitas'], 'exist', 'skipOnError' => true, 'targetClass' => Identitas::className(), 'targetAttribute' => ['identitas' => 'id']],
             [['file_sertifikat'], 'file', 'skipOnEmpty' => false],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'judul' => 'Judul',
            'pemberi' => 'Pemberi',
            'gambar' => 'Gambar',
            'tahun' => 'Tahun',
            'keterangan' => 'Keterangan',
            'identitas' => 'Identitas',
        ];
    }
    public function getPilSertifikasi($id)
     {
        
        $pilSertifikasi=Yii::$app->db->createCommand('SELECT * FROM sertifikasi WHERE identitas= '.$id)
            ->queryAll();

        return $pilSertifikasi;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdentitas0()
    {
        return $this->hasOne(Identitas::className(), ['id' => 'identitas']);
    }
}
