<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kelurahan".
 *
 * @property integer $id_kelurahan
 * @property string $nama_kelurahan
 * @property integer $id_kecamatan
 */
class Kelurahan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kelurahan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kelurahan', 'id_kecamatan'], 'required'],
            [['id_kelurahan', 'id_kecamatan'], 'integer'],
            [['nama_kelurahan'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kelurahan' => 'Id Kelurahan',
            'nama_kelurahan' => 'Nama Kelurahan',
            'id_kecamatan' => 'Id Kecamatan',
        ];
    }
}
