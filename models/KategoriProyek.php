<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kategori_proyek".
 *
 * @property integer $id
 * @property string $nama_jenis
 * @property string $keterangan
 *
 * @property JenisPekerjaan[] $jenisPekerjaans
 */
class KategoriProyek extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kategori_proyek';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['nama_jenis'], 'string', 'max' => 50],
            [['keterangan'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_jenis' => 'Nama Jenis',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisPekerjaans()
    {
        return $this->hasMany(JenisPekerjaan::className(), ['kategori_proyek' => 'id']);
    }
}
