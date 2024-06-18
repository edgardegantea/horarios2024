<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class DocentesCarreras extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id'                => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'docente'           => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => false],
            'carrera'           => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => false],
            'created_at'        => ['type' => 'timestamp', 'default' => new RawSql('CURRENT_TIMESTAMP')],
            'updated_at'        => ['type' => 'timestamp', 'null' => true],
            'deleted_at'        => ['type' => 'timestamp', 'null' => true]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('docente', 'usuarios', 'id', 'SET_NULL', 'SET_NULL');
        $this->forge->addForeignKey('carrera', 'carreras', 'id', 'SET_NULL', 'SET_NULL');
        $this->forge->createTable('docentes_carreras', true);

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('docentes_carreras', true);
    }
}
