<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RecipeMigration extends Migration
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
      'user_id' => [
        'type' => 'INT',
        'unsigned' => true,
      ],
      'title' => [
        'type'       => 'VARCHAR',
        'constraint' => 255,
      ],
      'description' => [
        'type' => 'TEXT',
        'null' => true,
      ],
      'ingredients' => [
        'type' => 'TEXT',
      ],
      'instructions' => [
        'type' => 'TEXT',
      ],
      'image_url' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true,
      ],
      'preparation' => [
        'type' => 'INT',
        'unsigned' => true,
      ],
      'cook' => [
        'type' => 'INT',
        'unsigned' => true,
      ],
      'type' => [
        'type' => 'VARCHAR',
        'constraint' => 100,
      ],
      "created_at datetime default current_timestamp",
      "updated_at datetime on Update CURRENT_TIMESTAMP NULL default current_timestamp"
    ]);
    $this->forge->addKey('id', true);
    // foreign key constraints for user
    $this->forge->addForeignKey('user_id', 'users', 'id');

    $this->forge->createTable('recipes');
  }

  public function down()
  {
    //
    $this->forge->dropTable('recipes');
  }
}
