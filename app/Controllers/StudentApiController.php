<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Student;
use CodeIgniter\API\ResponseTrait;

class StudentApiController extends BaseController
{
	use ResponseTrait;
	public function index()
	{
		$students = new Student();
		$data = $students->orderBy('id','DESC')->findAll();
		return $this->respond([
			'status' => 1,
			'message'=> $data
		]);
	}

	// create students
	public function create()
	{
		$students = new Student();

		$data = [
			'name' => $this->request->getVar('name'),
			'age'=> $this->request->getVar('age'),
			'country'=> $this->request->getVar('country')
		];

		$result = $students->save($data);
		if ($result) {
			return $this->respond([
				'status' => 1,
				'message'=> 'Student Add successfully'
			]);
		} else {
			return $this->respond([
				'status' => 0,
				'message'=> 'Student Not Add successfully'
			]);
		}
	}

	public function show($id)
	{
		$students = new Student();

		$data = $students->find($id);
		if ($data) {
			return $this->respond([
				'status' => 1,
				'message'=> $data
			]);
		} else {
			return $this->respond([
				'status' => 0,
				'message'=> $id . ' Not Found'
			]);
		}
	}

	public function update($id)
	{
		$students = new Student();
		$data = [
			'name' => $this->request->getVar('name'),
			'age'=> $this->request->getVar('age'),
			'country'=> $this->request->getVar('country')
		];

		$result = $students->update($id, $data);
		if ($result) {
			return $this->respond([
				'status' => 1,
				'message'=> 'student update successfully'
			]);
		} else {
			return $this->respond([
				'status' => 0,
				'message'=> 'student Not update successfull'
			]);
		}
	}

	public function delete($id)
	{
		$students = new Student();
		$result = $students->delete($id);
		if ($result) {
			return $this->respond([
				'status' => 1,
				'message'=> 'student Delete successfully'
			]);
		} else {
			return $this->respond([
				'status' => 0,
				'message'=> $id . "Not Found, ' Delete successfull"
			]);
		}
	}
}
