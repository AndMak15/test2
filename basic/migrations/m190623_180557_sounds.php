<?php

use yii\db\Migration;

/**
 * Class m190623_180557_sounds
 */
class m190623_180557_sounds extends Migration {
    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('sounds', [
            'id'            => $this->bigPrimaryKey(),
            'title'         => $this->string(200)->notNull()->comment('Назва пісні'),
            'author'        => $this->string(200)->comment('Автор пісні'),
            'length'        => $this->float()->notNull()->defaultValue(0)->comment('Довжина пісні'),
            'created_at'    => $this->integer()->notNull()->defaultValue(0)->comment('Дата створення'),
            'updated_at'    => $this->integer()->notNull()->defaultValue(0)->comment('Дата редагування'),
            'deleted_at'    => $this->integer()->notNull()->defaultValue(0)->comment('Дата видалення'),
        ], $tableOptions." COMMENT = 'Пісні'");
        $this->createIndex('IDX-sounds-01', 'sounds', ['title']);
        $this->createIndex('IDX-sounds-02', 'sounds', ['author']);
        $this->createIndex('IDX-sounds-03', 'sounds', ['title', 'author']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->execute("SET foreign_key_checks = 0;");
        $this->dropTable('sounds');
        $this->execute("SET foreign_key_checks = 1;");
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190623_180557_sounds cannot be reverted.\n";

        return false;
    }
    */
}
