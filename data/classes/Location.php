<?php

class Location {
    private $id;
    private $id_code;
    private $is_active;
    private $created_at;
    private $updated_at;
    private $address;
    private $city;
    private $state;

    private $postal_code;
    private $country;

    public function __construct( $id_code, $is_active, $created_at, $updated_at, $postal_code, $address, $city, $state, $country, $id = null) {
        $this->id = $id;
        $this->id_code = $id_code;
        $this->is_active = $is_active;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->country = $country;
        $this->postal_code = $postal_code;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getPostalCode() {
        return $this->postal_code;
    }

    public function setPostalCode($postal_code) {
        $this->postal_code = $postal_code;
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

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }

    public function getUpdatedAt() {
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at) {
        $this->updated_at = $updated_at;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function getState() {
        return $this->state;
    }

    public function setState($state) {
        $this->state = $state;
    }

    public function getCountry() {
        return $this->country;
    }

    public function setCountry($country) {
        $this->country = $country;
    }
}

?>