<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class AdminForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_admin = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $admin = $this->getAdmin();
             if (!$admin) {
                $this->addError('password', 'Incorrect username or password.');
                return ;
            }

            if (!$admin || !$admin->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
                return;
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getAdmin(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Finds member by [[username]]
     *
     * @return User|null
     */
    public function getAdmin()
    {
        if ($this->_admin === false) { 
            $this->_admin = admin::findByUsername($this->username);
        }

        return $this->_admin;
    }
}
