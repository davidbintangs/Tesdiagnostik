<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kodepos".
 *
 * @property integer $kodepos
 * @property string $kelurahan
 * @property string $kecamatan
 * @property string $jenis
 * @property string $kabupaten
 * @property string $propinsi
 */
class Kodepos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kodepos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kodepos'], 'integer'],
            [['kelurahan', 'kecamatan', 'jenis', 'kabupaten', 'propinsi'], 'string', 'max' => 50],
        ];
    }
     public function getAll()
    {

        $keahlian=Yii::$app->db->createCommand('SELECT * FROM kodepos')
            ->queryAll();

        return $keahlian;
    }
     public function getKodepos()
    {

        $kodepos=Yii::$app->db->createCommand('SELECT kodepos FROM kodepos')
            ->queryAll();

        return $kodepos;
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kodepos' => 'Kodepos',
            'kelurahan' => 'Kelurahan',
            'kecamatan' => 'Kecamatan',
            'jenis' => 'Jenis',
            'kabupaten' => 'Kabupaten',
            'propinsi' => 'Propinsi',
        ];
    }
}
