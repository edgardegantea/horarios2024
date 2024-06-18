<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSQL;

class PeriodoEscolar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nombre'        => ['type' => 'varchar', 'constraint' => 30, 'unique' => true],
            'fecha_inicio'  => ['type' => 'date'],
            'fecha_fin'     => ['type' => 'date'],
            'created_at'    => ['type' => 'timestamp', 'default' => new RawSql('CURRENT_TIMESTAMP')],
            'updated_at'    => ['type' => 'timestamp', 'null' => true],
            'deleted_at'    => ['type' => 'timestamp', 'null' => true]
        ]);
        
        $this->forge->addKey('id');
        $this->forge->createTable('periodo_escolar', true);
        
    }

    public function down()
    {
        $this->forge->dropTable('periodo_escolar', true);
    }
}
