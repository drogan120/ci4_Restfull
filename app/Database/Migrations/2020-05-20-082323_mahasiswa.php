<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
	public function up()
	{
		$this->forge->addField([

			'mahasiswa_id' => [
				'type' 				=> 'INT',
				'constraint'		=> 11,
				'auto_increment' 	=> true

			],
			'mahasiswa_nim' => [
				'type' 				=> 'INT',
				'constraint'		=> 11,

			],
			'mahasiswa_name' => [
				'type' 				=> 'VARCHAR',
				'constraint'		=> 100,

			]
		]);
		$this->forge->addKey('mahasiswa_id', true);
		$this->forge->createTable('mahasiswa');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
