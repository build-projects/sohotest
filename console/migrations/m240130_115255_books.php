<?php

use yii\db\Migration;
use frontend\models\Books;

class m240130_115255_books extends Migration
{

    public function up()
    {
        $this->createTable(Books::tableName(), [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer()->notNull(),
            'title' => $this->string(255)->notNull(),
            'text' => $this->text()->null(),
            'price' => $this->decimal(10,2)->null(),
            'image' => $this->string(50)->null(),
            'created_at' => $this->dateTime()->null(),
            'updated_at' => $this->dateTime()->null(),
        ]);
    }


    public function down()
    {
        $this->dropTable(Books::tableName());
    }

}
