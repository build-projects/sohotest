<?php

use yii\db\Migration;
use frontend\models\Authors;

class m240130_115228_authors extends Migration
{

    public function up()
    {
        $this->createTable(Authors::tableName(), [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'biography' => $this->text()->null(),
            'created_at' => $this->dateTime()->null(),
            'updated_at' => $this->dateTime()->null(),
        ]);
    }

    public function down()
    {
        $this->dropTable(Authors::tableName());
    }

}
