<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use Codeigniter\Database\RawSql;

class DocenteInfo extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id'                => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => false],
            'calle'             => ['type' => 'varchar', 'constraint' => 50],
            'numInterior'       => ['type' => 'varchar', 'constraint' => 10, 'default' => 's/n'],
            'municipio'         => ['type' => 'varchar', 'constraint' => 50],
            'estado'            => ['type' => 'varchar', 'constraint' => 50], 
            'created_at'        => ['type' => 'timestamp', 'default' => new RawSql('CURRENT_TIMESTAMP')],
            'updated_at'        => ['type' => 'timestamp', 'null' => true],
            'deleted_at'        => ['type' => 'timestamp', 'null' => true]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id', 'usuarios', 'id', 'SET_NULL', 'SET_NULL');
        $this->forge->createTable('docenteinfo', true);

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('docenteinfo', true);
    }
}
