<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserMigration extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id' => [
        'type'           => 'INT',
        'constraint'     => 5,
        'unsigned'       => true,
        'auto_increment' => true,
      ],

      'email' => [
        'type'       => 'VARCHAR',
        'constraint' => '100',
      ],

      'name' => [
        'type' => 'VARCHAR',
        'constraint' => '100',
      ],

      'password' => [
        'type' => 'VARCHAR',
        'constraint' => '100',
      ],

      'avatar_url' => [
        'type' => 'TEXT',
        'null' => true,
      ],

      "created_at datetime default current_timestamp",
      "updated_at datetime on Update CURRENT_TIMESTAMP NULL default current_timestamp"
    ]);
    $this->forge->addKey('id', true);
    $this->forge->createTable('users');
  }

  public function down()
  {
    //
    $this->forge->dropTable('users');
  }
}
