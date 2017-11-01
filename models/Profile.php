<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $place_of_birth
 * @property string $birthdate
 * @property string $gender
 * @property string $pic
 * @property string $bio
 * @property string $job_desc
 * @property string $fb
 * @property string $ig
 * @property string $ln
 * @property string $url
 * @property string $created_at
 * @property string $updated_at
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['first_name', 'last_name', 'place_of_birth', 'birthdate','bio'], 'string', 'max' => 255],
            [['gender'], 'string', 'max' => 1],
            [['job_desc'], 'string', 'max' => 40],
            [['public_email'], 'string', 'max' => 100],
            [['fb', 'ig', 'ln', 'url'], 'string', 'max' => 60],
            [['pic'], 'file', 'skipOnEmpty' => false, 'extensions' => ['png', 'jpg','gif'], 'maxSize'=>1024*1024, 'on' => 'update-pic'],
            [['fb', 'ig', 'ln', 'url'], 'default', 'value' => '#'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'place_of_birth' => 'Place Of Birth',
            'birthdate' => 'Birthdate',
            'gender' => 'Gender',
            'pic' => 'Pic',
            'bio' => 'Bio',
            'job_desc' => 'Job Desc',
            'fb' => 'Facebook',
            'ig' => 'Instagram',
            'ln' => 'LinkedIn',
            'url' => 'Website',
            'Public Email' => 'public_email',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getProfileIdLink() 
    { 
        $url = Url::to(['profile/update', 'id'=>$this->id]); 
        $options = []; 
        return Html::a($this->id, $url, $options); 
    } 
     
    public function getUser() 
    { 
        return $this->hasOne(User::className(), ['id' => 'user_id']); 
    } 
}
