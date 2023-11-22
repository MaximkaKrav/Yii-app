<?php

use yii\db\Migration;

/**
 * Class m231122_103748_devices_store_table
 */
class m231122_103748_devices_store_table extends Migration
{
    /**
     * @throws \yii\base\Exception
     */
    public function safeUp()
    {
        $this->createTable('store', [

            'id' => $this->primaryKey(),
            'name_store'=>$this->string()->notNull()->unique(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->notNull(),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->notNull(),
        ]);

        $this->createTable('device', [
            'id' => $this->primaryKey(),
            'serial_number' => $this->string()->unique()->notNull(),
            'name_store'=>$this->string()->notNull(),
            'about' => $this->string(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->notNull(),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->notNull(),
        ]);

        $this->createIndex('idx-device-store_id', 'device', 'name_store');
        $this->addForeignKey('fk_device_store', 'device', 'name_store', 'store', 'name_store', 'CASCADE', 'CASCADE');





        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'password_hash' => $this->string()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
        ]);

        $security = new \yii\base\Security();
        $this->insert('{{%user}}', [
            'username' => 'admin',
            'password_hash' => $security->generatePasswordHash('test'),
            'status' => 10,
        ]);

    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_device_store', 'device');
        $this->dropTable('device');
        $this->dropTable('store');
        $this->dropTable('{{%user}}');
    }
}
