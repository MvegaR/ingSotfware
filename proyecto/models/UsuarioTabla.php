<?php
namespace app\models;
use yii;


class UsuarioTabla extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface{

	public static function tableName(){
		return "USUARIO";
	}


	/**
     * Finds an identity by the given ID.
     *
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
	public static function findIdentity($id)
	{
		return static::findOne($id);
	}

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
    	return static::findOne(['ACCESSTOKEN' => $token]);
    }




    /**
     * @return int|string current user ID
     */
    public function getId()
    {
    	return $this->ID_USUARIO;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
    	return $this->AUTHKEY;
    }

    	public function generateAuthKey()
	{
	    $this->AUTHKEY = Yii::$app->security->generateRandomString();
	}

		public function generateAccessToken()
	{
	    $this->ACCESSTOKEN = Yii::$app->security->generateRandomString();
	}

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
    	return $this->getAuthKey() === $authKey;
    }

        /**
 * Validates password
 *
 * @param  string  $password password to validate
 * @return boolean if password provided is valid for current user
 */
        public function validatePassword($password)
        {
        	return $this->PASSWORD === sha1($password);
        }

        /**
 * Finds user by username
 *
 * @param  string      $username
 * @return static|null
 */
        public static function findByUsername($username)
        {
        	foreach (UsuarioTabla::find()->all() as $user) {
        		if (strcasecmp($user['NOMBRE_USUARIO'], $username) === 0) {
        			return new static($user);
        		}
        	}

        	return null;
        }

        public function beforeSave($insert)
        {
        	if (parent::beforeSave($insert)) {
        		if ($this->isNewRecord) {
        			$this->AUTHKEY = \Yii::$app->security->generateRandomString();
        		}
        		return true;
        	}
        	return false;
        }
    }

?>