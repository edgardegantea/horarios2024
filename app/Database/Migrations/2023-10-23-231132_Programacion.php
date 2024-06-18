<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Programacion extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'materia_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'docente_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'carrera_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'hora_inicio' => [
                'type' => 'TIME',
            ],
            'hora_fin' => [
                'type' => 'TIME',
            ],
            'dia_semana' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('materia_id', 'asignaturas', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('docente_id', 'usuarios', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('carrera_id', 'carreras', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('programacion');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('programacion');
    }
}
