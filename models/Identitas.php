<?php

namespace app\models;

use Yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "identitas".
 *
 * @property integer $id
 * @property string $nama_depan
 * @property string $nama_belakang
 * @property string $alamat
 * @property string $kode_pos
 * @property string $Kecamatan
 * @property string $kota
 * @property string $profinsi
 * @property string $jk
 * @property string $perusahaan
 * @property string $ringkasan
 * @property string $info_utama
 * @property string $telepon
 * @property string $no_hp
 * @property string $website
 * @property resource $foto
 * @property string $status_verifikasi
 * @property integer $member
 * @property integer $member_sosial_media
 *
 * @property Bahasa[] $bahasas
 * @property Member $member0
 * @property MemberSosialMedia $memberSosialMedia
 * @property IdentitasMenawarProyek[] $identitasMenawarProyeks
 * @property IdentitasMengerjakanProyek[] $identitasMengerjakanProyeks
 * @property KeahlianIdentitas[] $keahlianIdentitas
 * @property Pendidikan[] $pendidikans
 * @property Pengalaman[] $pengalamen
 * @property Portofolio[] $portofolios
 * @property Publikasi[] $publikasis
 * @property Rekening[] $rekenings
 * @property Sertifikasi[] $sertifikasis
 */
class Identitas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $file;
    public $file_foto;
    //public $image;
    
    public static function tableName()
    {
        return 'identitas';
    }

    /**
     * @inheritdoc
     */
   public function rules()
    {
        return [
            [['nama_depan'], 'required'],
            [['jk', 'ringkasan', 'status_verifikasi', 'info_utama'], 'string'],
            [['member', 'member_sosial_media'], 'integer'],
            [['nama_depan', 'nama_belakang', 'alamat','foto', 'perusahaan'], 'string', 'max' => 50],
            [['kode_pos', 'Kecamatan', 'kota', 'profinsi', 'telepon', 'no_hp', 'website'], 'string', 'max' => 20],
            [['member'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['member' => 'id']],
            [['member_sosial_media'], 'exist', 'skipOnError' => true, 'targetClass' => MemberSosialMedia::className(), 'targetAttribute' => ['member_sosial_media' => 'member_id']],
            [['file_foto'], 'file'],
            [['file'], 'file'],       
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [ 
            'id' => Yii::t('app', 'ID'),
            'nama_depan' => Yii::t('app', 'Nama Depan'),
            'nama_belakang' => Yii::t('app', 'Nama Belakang'),
            'alamat' => Yii::t('app', 'Alamat'),
            'kode_pos' => Yii::t('app', 'Kode Pos'),
            'Kecamatan' => Yii::t('app', 'Kecamatan'),
            'kota' => Yii::t('app', 'Kota'),
            'profinsi' => Yii::t('app', 'Profinsi'),
            'jk' => Yii::t('app', 'Jk'),
            'perusahaan' => Yii::t('app', 'Perusahaan'),
            'ringkasan' => Yii::t('app', 'Ringkasan'),
            'info_utama' => Yii::t('app', 'Info Utama'),
            'telepon' => Yii::t('app', 'Telepon'),
            'no_hp' => Yii::t('app', 'No Hp'),
            'website' => Yii::t('app', 'Website'),
            'foto' => Yii::t('app', 'Foto'),
            'status_verifikasi' => Yii::t('app', 'Status Verifikasi'),
            'member' => Yii::t('app', 'Member'),
            'member_sosial_media' => Yii::t('app', 'Member Sosial Media'),
            'rating_pekerja' => Yii::t('app', 'Ratiang Pekerja'),
            'rating_proyek' => Yii::t('app', 'Ratiang Proyek'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId()
    {
        $profil=Yii::$app->user->identity->id ;
        $id=Yii::$app->db->createCommand('SELECT identitas.id FROM identitas INNER JOIN member ON identitas.member = member.id WHERE identitas.member= ' .$profil)
            ->queryOne();


        return $id['id'];
    }

    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBahasas()
    {
        return $this->hasMany(Bahasa::className(), ['identitas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMember0()
    {
        return $this->hasOne(Member::className(), ['id' => 'member']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMemberSosialMedia()
    {
        return $this->hasOne(MemberSosialMedia::className(), ['member_id' => 'member_sosial_media']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdentitasMenawarProyeks()
    {
        return $this->hasMany(IdentitasMenawarProyek::className(), ['identitias' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdentitasMengerjakanProyeks()
    {
        return $this->hasMany(IdentitasMengerjakanProyek::className(), ['identitas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeahlianIdentitas()
    {
        return $this->hasMany(KeahlianIdentitas::className(), ['identitas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendidikans()
    {
        return $this->hasMany(Pendidikan::className(), ['identitas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengalamen()
    {
        return $this->hasMany(Pengalaman::className(), ['identitas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortofolios()
    {
        return $this->hasMany(Portofolio::className(), ['identitas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPublikasis()
    {
        return $this->hasMany(Publikasi::className(), ['identitas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRekenings()
    {
        return $this->hasMany(Rekening::className(), ['identitas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSertifikasis()
    {
        return $this->hasMany(Sertifikasi::className(), ['identitas' => 'id']);
    }
}
