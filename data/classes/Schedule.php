<?php

class Schedule {
    private $id;
    private $id_code;
    private $is_active;
    private $status;
    private $start_time;
    private $end_time;
    private $day_of_week;

    public function __construct($id_code, $start_time, $end_time, $day_of_week, $is_active = true, $status = 'active', $id = null) {
        $this->id = $id;
        $this->id_code = $id_code;
        $this->is_active = $is_active;
        $this->status = $status;
        $this->start_time = $start_time;
        $this->end_time = $end_time;
        $this->day_of_week = $day_of_week;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIdCode() {
        return $this->id_code;
    }

    public function setIdCode($id_code) {
        $this->id_code = $id_code;
    }

    public function getIsActive() {
        return $this->is_active;
    }

    public function setIsActive($is_active) {
        $this->is_active = $is_active;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getStartTime() {
        return $this->start_time;
    }

    public function setStartTime($start_time) {
        $this->start_time = $start_time;
    }

    public function getEndTime() {
        return $this->end_time;
    }

    public function setEndTime($end_time) {
        $this->end_time = $end_time;
    }

    public function getDayOfWeek() {
        return $this->day_of_week;
    }

    public function setDayOfWeek($day_of_week) {
        $this->day_of_week = $day_of_week;
    }
}

?>