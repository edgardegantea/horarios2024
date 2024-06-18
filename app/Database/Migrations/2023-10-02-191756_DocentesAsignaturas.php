<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class DocentesAsignaturas extends Migration
{
    public function up()
    {
        /*
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id'                => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'docente'           => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => false],
            'asignatura'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => false],
            'comentario'        => ['type' => 'text', 'null' => true],
            'created_at'        => ['type' => 'timestamp', 'default' => new RawSql('CURRENT_TIMESTAMP')],
            'updated_at'        => ['type' => 'timestamp', 'null' => true],
            'deleted_at'        => ['type' => 'timestamp', 'null' => true]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('docente', 'docentes', 'id', 'SET_NULL', 'SET_NULL');
        $this->forge->addForeignKey('asignatura', 'asignaturas', 'id', 'SET_NULL', 'SET_NULL');
        $this->forge->createTable('docentes_asignaturas', true);

        $this->db->enableForeignKeyChecks();
        */
    }

    public function down()
    {
        // $this->forge->dropTable('docentes_asignaturas', true);
    }
}
