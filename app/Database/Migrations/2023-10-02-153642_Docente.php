<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Docente extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id'                => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'rol'               => ['type' => 'varchar', 'constraint' => 10, 'default' => 'docente'],
            'username'          => ['type' => 'varchar', 'constraint' => 50, 'unique' => true],
            'password'          => ['type' => 'varchar', 'constraint' => 50],
            // 'expediente'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => false, 'null' => true],
            'horas_asignadas'   => ['type' => 'int'],
            'estatus'           => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => false, 'null' => true],
            'created_at'        => ['type' => 'timestamp', 'default' => new RawSql('CURRENT_TIMESTAMP')],
            'updated_at'        => ['type' => 'timestamp', 'null' => true],
            'deleted_at'        => ['type' => 'timestamp', 'null' => true]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('estatus', 'estatus_del_personal', 'id', 'SET_NULL', 'SET_NULL');

        $this->forge->createTable('docentes', true);

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('docentes', true);
    }
}
