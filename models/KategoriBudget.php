<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kategori_budget".
 *
 * @property integer $id
 * @property string $nama_kategori
 * @property string $jumlah_budget
 * @property integer $poin
 *
 * @property Proyek[] $proyeks
 */
class KategoriBudget extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kategori_budget';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['poin'], 'integer'],
            [['nama_kategori', 'jumlah_budget'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_kategori' => 'Nama Kategori',
            'jumlah_budget' => 'Dana Proyek (Rp)',
            'poin' => 'Poin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProyeks()
    {
        return $this->hasMany(Proyek::className(), ['kategori_budget' => 'id']);
    }
}
