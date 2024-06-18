<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSQL;

class EstatusDelPersonal extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'auto_increment' => true, 'unsigned' => true],
            'nombre'        => ['type' => 'varchar', 'constraint' => 150, 'unique' => true],
            'descripcion'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_at'    => ['type' => 'timestamp', 'default' => new RawSql('CURRENT_TIMESTAMP')],
            'updated_at'    => ['type' => 'timestamp', 'null' => true],
            'deleted_at'    => ['type' => 'timestamp', 'null' => true]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('estatus_del_personal', true);
    }

    public function down()
    {
        $this->forge->dropTable('estatus_del_personal', true);
    }
}
