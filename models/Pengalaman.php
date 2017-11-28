<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pengalaman".
 *
 * @property integer $id
 * @property string $judul
 * @property string $perusahaan
 * @property string $bulan_mulai
 * @property string $tahun_mulai
 * @property string $status_keaktifan
 * @property string $bulan_selesai
 * @property string $tahun_selesai
 * @property string $ringkasan
 * @property integer $identitas
 *
 * @property Identitas $identitas0
 */
class Pengalaman extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pengalaman';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_keaktifan'], 'required'],
            [['status_keaktifan'], 'string'],
            [['identitas'], 'integer'],
            [['judul', 'perusahaan', 'bulan_mulai', 'tahun_mulai', 'bulan_selesai', 'tahun_selesai'], 'string', 'max' => 50],
            [['ringkasan'], 'string', 'max' => 255],
            [['identitas'], 'exist', 'skipOnError' => true, 'targetClass' => Identitas::className(), 'targetAttribute' => ['identitas' => 'id']],
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
            'perusahaan' => 'Perusahaan',
            'bulan_mulai' => 'Bulan Mulai',
            'tahun_mulai' => 'Tahun Mulai',
            'status_keaktifan' => 'Status',
            'bulan_selesai' => 'Bulan Selesai',
            'tahun_selesai' => 'Tahun Selesai',
            'ringkasan' => 'Ringkasan',
            'identitas' => 'Identitas',
        ];
    }
     public function getPilPengalaman($id)
     {
        
        $pilPengalaman=Yii::$app->db->createCommand('SELECT * FROM pengalaman WHERE identitas= 2')
            ->queryAll();

        return $pilPengalaman;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdentitas0()
    {
        return $this->hasOne(Identitas::className(), ['id' => 'identitas']);
    }
}
