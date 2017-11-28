<?php

namespace app\models;

class Komentar extends \yii\base\Model{
	public $nama;
	public $komentar;

	public function rules(){
		return [
			[['nama','komentar'],'required'],
		];
	}
}