<?php
namespace app\models;

use yii\base\Model;
use yii\base\InvalidParamException;
use common\models\Member;

/**
 * Password reset form
 */
class ResetPasswordForm extends Model
{
    public $password;

    /**
     * @var \common\models\Member
     */
    private $_member;


    /**
     * Creates a form model given a token.
     *
     * @param string $token
     * @param array $config name-value pairs that will be used to initialize the object properties
     * @throws \yii\base\InvalidParamException if token is empty or not valid
     */
    public function __construct($token, $config = [])
    {
        if (empty($token) || !is_string($token)) {
            throw new InvalidParamException('Password reset token tidak boleh kosong');
        }
        $this->_member= Member::findByPasswordResetToken($token);
        if (!$this->_member) {
            throw new InvalidParamException('Token reset password salah.');
        }
        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Resets password.
     *
     * @return bool if password was reset.
     */
    public function resetPassword()
    {
        $member = $this->_member;
        $member->setPassword($this->password);
        $member->removePasswordResetToken();

        return $member->save(false);
    }
}
