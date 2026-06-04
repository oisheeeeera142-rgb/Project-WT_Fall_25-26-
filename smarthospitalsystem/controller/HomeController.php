<?php

require_once 'model/DoctorModel.php';

class HomeController
{
    public function doctors()
    {
        $doctorModel = new DoctorModel();

        $doctors =
            $doctorModel->getAllDoctors();

        include 'view/home/doctors.php';
    }
}