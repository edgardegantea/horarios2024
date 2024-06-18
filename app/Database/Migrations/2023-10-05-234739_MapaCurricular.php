<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class MapaCurricular extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'grupo'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => false],
            'docente'       => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => false],
            'asignatura'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => false],
            'periodo_escolar'   => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => false],
            'observacion'   => ['type' => 'text', 'null' => true],
            'created_at'    => ['type' => 'timestamp', 'default' => new RawSql('CURRENT_TIMESTAMP')],
            'updated_at'    => ['type' => 'timestamp', 'null' => true],
            'deleted_at'    => ['type' => 'timestamp', 'null' => true]
        ]);
        
        $this->forge->addKey('id');

        $this->forge->addForeignKey('grupo', 'grupos', 'id', 'SET_NULL', 'SET_NULL');
        $this->forge->addForeignKey('docente', 'docentes', 'id', 'SET_NULL', 'SET_NULL');
        $this->forge->addForeignKey('asignatura', 'asignaturas', 'id', 'SET_NULL', 'SET_NULL');
        $this->forge->addForeignKey('periodo_escolar', 'periodo_escolar', 'id', 'SET_NULL', 'SET_NULL');

        $this->forge->createTable('mapa_curricular', true);
        
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('mapa_curricular', true);
    }
}
