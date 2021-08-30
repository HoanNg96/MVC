<?php

namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Models\SinhvienModel;
use MVC\Models\SinhvienRepository;

class SinhvienController extends Controller
{
    function index()
    {

        $sinhvien = new SinhvienRepository();

        $d['sinhvien'] = $sinhvien->getAll([]);
        $this->set($d);
        $this->render("index");
    }

    function create()
        {
        if (isset($_POST["ten"])) {
            $id = 0;
            //get form data
            $ten = $_POST["ten"];
            $tuoi = $_POST["tuoi"];
            $diachi = $_POST["diachi"];
            $form = ['ten' => $ten, 'tuoi' => $tuoi, 'diachi' => $diachi];
            //secure form
            $form = $this->secure_form($form);
            $sinhvienModel_obj = new SinhvienModel;
            $sinhvienModel_obj->set($id, $form['ten'], $form['tuoi'], $form['diachi']);
            $sinhvien = new SinhvienRepository();

            if ($sinhvien->add($sinhvienModel_obj)) {
                header("Location: " . URL_WEBROOT . "Sinhvien/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        $sinhvien = new SinhvienRepository();
        $d["sinhvien"] = $sinhvien->get($id);

        if (isset($_POST["ten"])) {
            //get form data
            $id = $id;
            $ten = $_POST["ten"];
            $tuoi = $_POST["tuoi"];
            $diachi = $_POST["diachi"];
            $form = ['ten' => $ten, 'tuoi' => $tuoi, 'diachi' => $diachi];
            //secure form
            $form = $this->secure_form($form);
            $sinhvienModel_obj = new SinhvienModel;
            $sinhvienModel_obj->set($id, $form['ten'], $form['tuoi'], $form['diachi']);

            if ($sinhvien->add($sinhvienModel_obj)) {
                header("Location: " . URL_WEBROOT . "Sinhvien/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        $task = new SinhvienRepository();

        if ($task->delete($id)) {
            header("Location: " . URL_WEBROOT . "Sinhvien/index");
        }
    }
}
