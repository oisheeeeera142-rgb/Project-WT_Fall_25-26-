<?php

require_once 'config/database.php';

class ScheduleModel
{
    private $conn;
    private $table = "schedules";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function createSchedule($data)
    {
        $query = "INSERT INTO schedules
        (
            doctor_id,
            available_date,
            start_time,
            end_time
        )
        VALUES
        (
            :doctor_id,
            :available_date,
            :start_time,
            :end_time
        )";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute([

            ':doctor_id' =>
                $data['doctor_id'],

            ':available_date' =>
                $data['available_date'],

            ':start_time' =>
                $data['start_time'],

            ':end_time' =>
                $data['end_time']
        ]);
    }

public function getSchedulesByDoctor($doctorId)
{
    $query = "SELECT *
              FROM schedules
              WHERE doctor_id = :doctor_id
              AND status = 'available'
              ORDER BY available_date ASC";

    $stmt = $this->conn->prepare($query);

    $stmt->execute([
        ':doctor_id' => $doctorId
    ]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function getScheduleById($id)
{
    $query = "SELECT *
              FROM schedules
              WHERE id = :id";

    $stmt = $this->conn->prepare($query);

    $stmt->execute([
        ':id' => $id
    ]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}
}