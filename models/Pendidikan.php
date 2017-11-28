<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pendidikan".
 *
 * @property integer $id
 * @property string $bidang
 * @property string $instansi
 * @property string $tahun_masuk
 * @property string $status_keaktifan
 * @property string $tahun_keluar
 * @property integer $identitas
 *
 * @property Identitas $identitas0
 */
class Pendidikan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file_ijazah;
    public static function tableName()
    {
        return 'pendidikan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_keaktifan','file_ijazah'], 'required'],
            [['status_keaktifan'], 'string'],
            [['identitas'], 'integer'],
            [['ijazah','bidang', 'instansi', 'tahun_masuk', 'tahun_keluar'], 'string', 'max' => 50],
            [['identitas'], 'exist', 'skipOnError' => true, 'targetClass' => Identitas::className(), 'targetAttribute' => ['identitas' => 'id']],
             [['file_ijazah'], 'file', 'skipOnEmpty' => false],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bidang' => 'Bidang',
            'instansi' => 'Tingkat',
            'tahun_masuk' => 'Tahun Masuk',
            'status_keaktifan' => 'Status',
            'tahun_keluar' => 'Tahun Keluar',
            'identitas' => 'Identitas',
            'ijazah'=>'Ijazah'
        ];
    }
    public function getPilPendidikan($id)
     {
        
        $pilPendidikan=Yii::$app->db->createCommand('SELECT * FROM pendidikan WHERE identitas= '.$id)
            ->queryAll();

        return $pilPendidikan;
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdentitas0()
    {
        return $this->hasOne(Identitas::className(), ['id' => 'identitas']);
    }
}
