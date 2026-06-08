<?php

require_once 'model/AppointmentModel.php';
require_once 'model/DoctorModel.php';
require_once 'model/ScheduleModel.php';
require_once 'model/PatientModel.php';

class AppointmentController
{
    private $appointmentModel;
    private $doctorModel;
    private $scheduleModel;

    public function __construct()
    {
        $this->appointmentModel = new AppointmentModel();
        $this->doctorModel = new DoctorModel();
        $this->scheduleModel = new ScheduleModel();
    }

    /*
    |--------------------------------------------------------------------------
    | Book Appointment
    |--------------------------------------------------------------------------
    */

    public function bookAppointment()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $userId = $_SESSION['user_id'];

            $patientModel = new PatientModel();

            $patient =
                $patientModel->getPatientByUserId($userId);

            if (!$patient)
            {
                die("Patient record not found.");
            }

            /*
            |--------------------------------------------------------------------------
            | GET SCHEDULE
            |--------------------------------------------------------------------------
            */

            $schedule =
    $this->scheduleModel
         ->getScheduleById(
            $_POST['schedule_id']
         );

            if (!$schedule)
            {
                $_SESSION['error'] =
                    "Invalid Schedule";

                header(
                    "Location:index.php?page=book-appointment"
                );

                exit;
            }

            /*
            |--------------------------------------------------------------------------
            | DATE VALIDATION
            |--------------------------------------------------------------------------
            */

            if (
                $_POST['appointment_date']
                !=
                $schedule['available_date']
            )
            {
                $_SESSION['error'] =
                    "Appointment date does not match doctor schedule.";

                header(
                    "Location:index.php?page=book-appointment"
                );

                exit;
            }

            /*
            |--------------------------------------------------------------------------
            | TIME VALIDATION
            |--------------------------------------------------------------------------
            */

            if (
                $_POST['appointment_time']
                <
                $schedule['start_time']

                ||

                $_POST['appointment_time']
                >
                $schedule['end_time']
            )
            {
                $_SESSION['error'] =
                    "Appointment time is outside doctor schedule.";

                header(
                    "Location:index.php?page=book-appointment"
                );

                exit;
            }

            /*
            |--------------------------------------------------------------------------
            | SAVE APPOINTMENT
            |--------------------------------------------------------------------------
            */

            $data = [

                'patient_id' =>
                    $patient['id'],

                'doctor_id' =>
                    $_POST['doctor_id'],

                'schedule_id' =>
                    $_POST['schedule_id'],

                'appointment_date' =>
                    $_POST['appointment_date'],

                'appointment_time' =>
                    $_POST['appointment_time'],

                'notes' =>
                    $_POST['notes']
            ];

            $this->appointmentModel
                 ->createAppointment($data);

            $_SESSION['success'] =
                "Appointment Booked Successfully";

            header(
                "Location:index.php?page=appointment-history"
            );

            exit;
        }

        $doctors =
            $this->doctorModel->getAllDoctors();

        include 'view/patient/book_appointment.php';
    }

    /*
    |--------------------------------------------------------------------------
    | AJAX Schedule
    |--------------------------------------------------------------------------
    */

    public function getSchedulesAjax()
    {
        if(!isset($_GET['doctor_id']))
        {
            exit;
        }

        $doctorId = $_GET['doctor_id'];

        $schedules =
            $this->scheduleModel
                 ->getSchedulesByDoctor($doctorId);

        echo json_encode($schedules);
    }
    public function countPendingAppointments($doctorId)
{
    $query = "SELECT COUNT(*) as total
              FROM appointments
              WHERE doctor_id=:doctor_id
              AND status='pending'";

    $stmt = $this->conn->prepare($query);

    $stmt->execute([
        ':doctor_id'=>$doctorId
    ]);

    return $stmt->fetch()['total'];
}

public function countApprovedAppointments($doctorId)
{
    $query = "SELECT COUNT(*) as total
              FROM appointments
              WHERE doctor_id=:doctor_id
              AND status='approved'";

    $stmt = $this->conn->prepare($query);

    $stmt->execute([
        ':doctor_id'=>$doctorId
    ]);

    return $stmt->fetch()['total'];
}
    
}