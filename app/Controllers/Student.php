<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Database\MySQLi\Connection;
use CodeIgniter\Exceptions\PageNotFoundException;

class Student extends BaseController
{
    private Connection $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function index()
    {
        return view('students/index');
    }

    public function show($id)
    {


        return view('students/show', compact('student'));
    }
}
