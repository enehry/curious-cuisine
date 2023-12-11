<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CommentMigration extends Migration
{
  public function up()
  {
    //
    $this->forge->addField([
      'id' => [
        'type'           => 'INT',
        'constraint'     => 5,
        'unsigned'       => true,
        'auto_increment' => true,
      ],
      'recipe_id' => [
        'type' => 'INT',
        'unsigned' => true,
      ],
      'user_id' => [
        'type' => 'INT',
        'unsigned' => true,
      ],
      'comment' => [
        'type' => 'TEXT',
      ],

      "created_at datetime default current_timestamp",
      "updated_at datetime on Update CURRENT_TIMESTAMP NULL default current_timestamp"
    ]);
    $this->forge->addKey('id', true);
    // foreign key constraints for user
    $this->forge->addForeignKey('user_id', 'users', 'id');
    $this->forge->addForeignKey('recipe_id', 'recipes', 'id');

    $this->forge->createTable('comments');
  }

  public function down()
  {
    //
    $this->forge->dropTable('comments');
  }
}
