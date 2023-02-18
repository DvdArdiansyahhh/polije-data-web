<?php

namespace App\Controllers\Data;

use App\Controllers\BaseController;
use CodeIgniter\Database\MySQLi\Connection;

class Student extends BaseController
{
    private Connection $db;
    private int $perPage = 12;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function index()
    {
        sleep(1);
        $perPage = $this->request->getVar('perPage') ?? $this->perPage;
        $page = $this->request->getVar('page') ?? 0;
        $name = $this->request->getVar('name') ?? '';

        $students = $this->db->table('students')
            ->select('students.id, students.regist_id, regist_number, fullname, nim, admission, phone')
            ->join('registers', 'students.regist_id = registers.regist_id')
            ->like('registers.fullname', $name)
            ->orderBy('students.id', 'ASC');

        $total = $students->countAllResults(false);
        $students = $students->get($perPage, $page * $perPage);

        return $this->response->setStatusCode(200)->setJSON([
            'students' => $students->getResult(),
            'total' => $total,
            'next' => floor($total / $perPage - $page) > 0,
        ]);
    }
}
