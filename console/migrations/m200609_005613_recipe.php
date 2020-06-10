<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m200609_005613_recipe
 */
class m200609_005613_recipe extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%recipe}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_TEXT,
            'text' => Schema::TYPE_TEXT,
            'category_id' => Schema::TYPE_INTEGER,
            'price' => Schema::TYPE_INTEGER,
            'is_active' => Schema::TYPE_BOOLEAN,
            'time' => Schema::TYPE_TIMESTAMP. ' NOT NULL DEFAULT NOW()',
        ], $tableOptions);

        $this->createTable('{{%recipe_ingredient}}', [
            'id' => Schema::TYPE_PK,
            'recipe_id' => Schema::TYPE_INTEGER,
            'title' => Schema::TYPE_STRING,
            'count' => Schema::TYPE_STRING,
        ], $tableOptions);

        $this->addForeignKey('fk-recipe_ingredient-recipe_id-recipe-id', '{{%recipe_ingredient}}', 'recipe_id', '{{%recipe}}', 'id', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200609_005613_recipe cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200609_005613_recipe cannot be reverted.\n";

        return false;
    }
    */
}
