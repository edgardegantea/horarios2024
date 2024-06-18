<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Grupo extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id'                => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'periodo_escolar'   => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => false],
            'carrera'           => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => false],
            'clave'             => ['type' => 'varchar', 'constraint' => 10, 'unique' => true],
            'nombre'            => ['type' => 'varchar', 'constraint' => 30, 'unique' => true],
            'modalidad'         => ['type' => 'varchar', 'constraint' => 20],
            'created_at'        => ['type' => 'timestamp', 'default' => new RawSql('CURRENT_TIMESTAMP')],
            'updated_at'        => ['type' => 'timestamp', 'null' => true],
            'deleted_at'        => ['type' => 'timestamp', 'null' => true]
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('carrera', 'carreras', 'id');
        $this->forge->addForeignKey('periodo_escolar', 'periodo_escolar', 'id');
        $this->forge->createTable('grupos', true);

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('grupos', true);
    }
}