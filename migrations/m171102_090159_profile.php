<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news`.
 */
class m171102_090159_profile extends Migration
{
    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('profile2');
    }
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('profile', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'first_name' => $this->string()->defaultValue('---'),
            'last_name' => $this->string()->defaultValue('---'),
            'place_of_birth' => $this->string()->defaultValue('---'),
            'birthdate' => $this->string()->defaultValue('---'),
            'gender' => $this->string(1)->defaultValue('-'),
            'pic' => $this->string()->defaultValue('/img/avatar.png'),
            'bio' => $this->string()->defaultValue('---'),
            'job_desc' => $this->string()->defaultValue('---'),
            'fb' => $this->string()->defaultValue('#'),
            'ig' => $this->string()->defaultValue('#'),
            'ln' => $this->string()->defaultValue('#'),
            'url' => $this->string()->defaultValue('#'),
            'public_email' => $this->string()->defaultValue('---'),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);

        // creates index for column `author_id`
        $this->createIndex(
            'idx-user-user_id',
            'profile',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-user-user_id',
            'profile',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

    }
   
}
