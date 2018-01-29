<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m171211_052430_lianlian
 */
class m171211_052430_lianlian extends Migration
{
   public function up() {
         $this->createTable("xiaolian", [
            "id" => Schema::TYPE_PK,
            "name" => Schema::TYPE_STRING . ' NOT NULL',
            "email" => Schema::TYPE_STRING,
            "password" => Schema::TYPE_STRING,
         ]);
         $this->batchInsert("xiaolian", ["name", "email","password"], [
            ["User1", "user11@gmail.com",'123456'],
            ["User2", "user22@gmail.com",'d1wqqwdwqdd4qw'],
            ["User3", "user33@gmail.com",'d1wqd4qw'],
            ["User4", "user44@gmail.com",'d1wqddwqdqwd4qw'],
            ["User5", "user55@gmail.com",'d1wqd4qw'],
            ["User6", "user66@gmail.com",'d1wqd4qw'],
            ["User7", "user77@gmail.com",'d1wqwqdwqddd4qw'],
            ["User8", "user88@gmail.com",'d1wqd4qw'],
            ["User9", "user99@gmail.com",'d1wqd4qw'],
            ["User10", "user1010@gmail.com",'d1wqd4qw'],
            ["User11", "user1111@gmail.com",'123wqdwqdwqd456'],
         ]);
      }
      public function down() {
         $this->dropTable('xiaolian');
      }
}
