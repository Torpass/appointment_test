<?php
require_once __DIR__ . '/../../config/config.php';
require_once './Connection.php';
require_once 'Schedule.php';

class ScheduleDao {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create(Schedule $schedule) {
        $query = "INSERT INTO schedules (id_code, is_active, status, start_time, end_time, day_of_week) 
                  VALUES (:id_code, :is_active, :status, :start_time, :end_time, :day_of_week)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_code', $schedule->getIdCode());
        $stmt->bindParam(':is_active', $schedule->getIsActive());
        $stmt->bindParam(':status', $schedule->getStatus());
        $stmt->bindParam(':start_time', $schedule->getStartTime());
        $stmt->bindParam(':end_time', $schedule->getEndTime());
        $stmt->bindParam(':day_of_week', $schedule->getDayOfWeek());
        $stmt->execute();
        return $this->conn->lastInsertId();
    }

    public function read($id) {
        $query = "SELECT * FROM schedules WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Schedule(
                $row['id_code'],
                $row['start_time'],
                $row['end_time'],
                $row['day_of_week'],
                $row['is_active'],
                $row['status'],
                $row['id']
            );
        }
        return null;
    }

    public function update(Schedule $schedule) {
        $query = "UPDATE schedules SET id_code = :id_code, is_active = :is_active, status = :status, 
                  start_time = :start_time, end_time = :end_time, day_of_week = :day_of_week 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $schedule->getId(), PDO::PARAM_INT);
        $stmt->bindParam(':id_code', $schedule->getIdCode());
        $stmt->bindParam(':is_active', $schedule->getIsActive());
        $stmt->bindParam(':status', $schedule->getStatus());
        $stmt->bindParam(':start_time', $schedule->getStartTime());
        $stmt->bindParam(':end_time', $schedule->getEndTime());
        $stmt->bindParam(':day_of_week', $schedule->getDayOfWeek());
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM schedules WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getAll() {
        $query = "SELECT * FROM schedules";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $schedules = [];
        foreach ($rows as $row) {
            $schedules[] = new Schedule(
                $row['id_code'],
                $row['start_time'],
                $row['end_time'],
                $row['day_of_week'],
                $row['is_active'],
                $row['status'],
                $row['id']
            );
        }
        return $schedules;
    }
}
?>