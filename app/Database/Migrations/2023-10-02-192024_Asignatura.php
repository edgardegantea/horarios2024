<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Asignatura extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id'                => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'tipo_asignatura'   => ['type' => 'varchar', 'constraint' => 20],
            'campo'             => ['type' => 'varchar', 'constraint' => 20],
            'clave'             => ['type' => 'varchar', 'constraint' => 10, 'unique' => true],
            'nombre'            => ['type' => 'varchar', 'constraint' => 255, 'unique' => true],
            'descripcion'       => ['type' => 'text', 'null' => true],
            'creditos'          => ['type' => 'tinyint', 'default' => 5],
            // 'carrera'           => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => false, 'null' => true],
            'created_at'        => ['type' => 'timestamp', 'default' => new RawSql('CURRENT_TIMESTAMP')],
            'updated_at'        => ['type' => 'timestamp', 'null' => true],
            'deleted_at'        => ['type' => 'timestamp', 'null' => true]
        ]);

        $this->forge->addKey('id', true);
        // $this->forge->addForeignKey('carrera', 'carreras', 'id', 'SET_NULL', 'SET_NULL');
        $this->forge->createTable('asignaturas', true);

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('asignaturas', true);
    }
}
