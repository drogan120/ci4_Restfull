<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Mahasiswa extends ResourceController
{
	protected $format = 'json';
	protected $modelName = 'App\Models\Mahasiswa_model';

	public function index()
	{

		$data['mahasiswa'] = $this->model->get_mahasiswa();
		return $this->respond($data, 200);
		echo json_decode($data);
	}

	public function create()
	{

		$mahasiswa_nim = $this->request->getPost('mahasiswa_nim');
		$mahasiswa_name = $this->request->getPost('mahasiswa_name');

		$data = [
			'mahasiswa_nim' 	=> $mahasiswa_nim,
			'mahasiswa_name' 	=> $mahasiswa_name
		];

		$simpan =  $this->model->insert_mahasiswa($data);

		if ($simpan) {
			$output = [
				'status' 	=> 200,
				'message'	=> 'berhasil menyimpan data',
				'data'		=> ''
			];

			return $this->respond($output, 200);
		} else {
			$output = [
				'status' 	=> 400,
				'message'	=> 'gagal menyimpan data',
				'data'		=> ''
			];

			return $this->respond($output, 400);
		}
	}

	public function show($id = null)
	{
		$mahasiswa =  $this->model->get_mahasiswa($id);
		if (!empty($mahasiswa)) {
			$output = [
				'mahasiswa_id'		=> $mahasiswa->mahasiswa_id,
				'mahasiswa_nim'		=> $mahasiswa->mahasiswa_nim,
				'mahasiswa_name'		=> $mahasiswa->mahasiswa_name,
			];

			return $this->respond($output, 200);
		} else {
			$output = [
				'status' 	=> 400,
				'message'	=> 'gagal mengambil data',
				'data'		=> ''
			];

			return $this->respond($output, 400);
		}
	}
	public function edit($id = null)
	{
		$mahasiswa =  $this->model->get_mahasiswa($id);
		if (!empty($mahasiswa)) {
			$output = [
				'mahasiswa_id'		=> $mahasiswa->mahasiswa_id,
				'mahasiswa_nim'		=> $mahasiswa->mahasiswa_nim,
				'mahasiswa_name'		=> $mahasiswa->mahasiswa_name,
			];

			return $this->respond($output, 200);
		} else {
			$output = [
				'status' 	=> 400,
				'message'	=> 'gagal mengambil data',
				'data'		=> ''
			];

			return $this->respond($output, 400);
		}
	}

	public function update($id = null)
	{
		// mengakap data dari method put delete dan patch
		$data =  $this->request->getRawInput();

		// ambil data berdasar id
		$mahasiswa = $this->model->get_mahasiswa($id);

		if (!empty($mahasiswa)) {
			$updateMahasiswa = $this->model->update_mahasiswa($data, $id);



			$output = [
				'status' 	=> true,
				'message'	=> 'data berhasil di ubah',
				'data'		=> ''
			];

			return $this->respond($output, 200);
		} else {
			$output = [
				'status' 	=> false,
				'message'	=> 'data gagal berhasil di ubah',
				'data'		=> ''
			];

			return $this->respond($output, 400);
		}
	}

	public function delete($id = null)
	{

		// ambil data berdasar id
		$mahasiswa = $this->model->get_mahasiswa($id);

		if (!empty($mahasiswa)) {
			$hapusMahasiswa = $this->model->hapus_data($id);

			$output = [
				'status' 	=> true,
				'message'	=> 'data berhasil di hapus',
				'data'		=> ''
			];

			return $this->respond($output, 200);
		} else {
			$output = [
				'status' 	=> false,
				'message'	=> 'data gagal berhasil di hapus',
				'data'		=> ''
			];

			return $this->respond($output, 400);
		}
	}

	//--------------------------------------------------------------------

}
