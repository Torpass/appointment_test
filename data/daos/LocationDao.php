<?php
require_once __DIR__. '/../Conection.php';
require_once __DIR__ . '/../classes/Location.php';


$connect = new ConexionSQL();
$conn = $connect->getConnection();

/**
 * Adds a new location to the database
 */
function createLocation($id_code, $is_active, $created_at, $updated_at, $postal_code, $address, $city, $state, $country)
{
    global $conn;

    // Prepare SQL query
    $query = "INSERT INTO location(id_code, is_active, created_at, updated_at, postal_code, address, city, state, country) 
              VALUES (:id_code, :is_active, :created_at, :updated_at, :postal_code,:address, :city, :state, :country)";
    // Prepare the statement
    $stmt = $conn->prepare($query);
    // Bind parameters
    $stmt->bindParam(':id_code', $id_code);
    $stmt->bindParam(':is_active', $is_active);
    $stmt->bindParam(':created_at', $created_at);
    $stmt->bindParam(':updated_at', $updated_at);
    $stmt->bindParam(':postal_code', $postal_code);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':state', $state);
    $stmt->bindParam(':country', $country);
    // Execute the statement
    $stmt->execute();

    // // Retrieve the automatically generated ID
    // $location_id = $conn->lastInsertId();

    // // Create the Location object
    // $location = new Location($id_code, $is_active, $created_at, $updated_at, $postal_code, $address, $city, $state, $country);
    // // Return the Location object
    // return $location;
}

/**
 * Retrieves a location from the database by id
 */
function getLocationById($id)
{
    global $conn;
    // Prepare SQL query
    $query = "SELECT * FROM locations WHERE id = :id";
    // Prepare the statement
    $stmt = $conn->prepare($query);
    // Bind parameters
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    // Execute the statement
    $stmt->execute();
    // Retrieve the location from the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if a location was found
    if ($result) {
        // Create a Location object with the retrieved data
        $location = new Location(
            $result['id'],
            $result['id_code'],
            $result['is_active'],
            $result['created_at'],
            $result['updated_at'],
            $result['latitude'],
            $result['address'],
            $result['city'],
            $result['state'],
            $result['country']
        );
        // Return the Location object
        return $location;
    } else {
        // If no location was found, return null
        return null;
    }
}

/**
 * Retrieves all locations from the database
 */
function getAllLocations()
{
    global $conn;
    // Prepare SQL query
    $query = "SELECT * FROM location";
    // Prepare the statement
    $stmt = $conn->prepare($query);
    // Execute the statement
    $stmt->execute();
    // Retrieve the locations from the result
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Create an array to store Location objects
    $locations = [];
    // Check if any location was found
    if ($results) {
        // Loop through the results and create instances of the Location class with the data obtained from the database
        foreach ($results as $result) {
            $location = new Location(
                $result['id_code'],
                $result['is_active'],
                $result['created_at'],
                $result['updated_at'],
                $result['postal_code'],
                $result['address'],
                $result['city'],
                $result['state'],
                $result['country']
            );
            // Add the Location object to the array
            $locations[] = $location;
        }
        // Return the Location objects
        return $locations;
    } else {
        // If no location was found, return null
        return null;
    }
}

function getAllActiveLocations()
{
    global $conn;
    // Prepare SQL query
    $query = "SELECT * FROM location where is_active = 1";
    // Prepare the statement
    $stmt = $conn->prepare($query);
    // Execute the statement
    $stmt->execute();
    // Retrieve the locations from the result
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Create an array to store Location objects
    $locations = [];
    // Check if any location was found
    if ($results) {
        // Loop through the results and create instances of the Location class with the data obtained from the database
        foreach ($results as $result) {
            $location = new Location(
                $result['id_code'],
                $result['is_active'],
                $result['created_at'],
                $result['updated_at'],
                $result['postal_code'],
                $result['address'],
                $result['city'],
                $result['state'],
                $result['country']
            );
            // Add the Location object to the array
            $locations[] = $location;
        }
        // Return the Location objects
        return $locations;
    } else {
        // If no location was found, return null
        return null;
    }
}

/**
 * Updates an existing location in the database
 */
function updateLocation($id, $id_code, $is_active, $created_at, $updated_at, $postal_code, $address, $city, $state, $country)
{
    global $conn;
    // Prepare SQL query
    $query = "UPDATE locations SET id_code = :id_code, is_active = :is_active, created_at = :created_at, updated_at = :updated_at, 
              latitude = :latitude, longitude = :longitude, address = :address, city = :city, state = :state, country = :country 
              WHERE id = :id";
    // Prepare the statement
    $stmt = $conn->prepare($query);
    // Bind parameters
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':id_code', $id_code);
    $stmt->bindParam(':is_active', $is_active);
    $stmt->bindParam(':created_at', $created_at);
    $stmt->bindParam(':updated_at', $updated_at);
    $stmt->bindParam(':postal_code', $postal_code);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':state', $state);
    $stmt->bindParam(':country', $country);
    // Execute the statement
    return $stmt->execute();
}

/**
 * Deletes a location from the database
 */
function deleteLocation($id)
{
    global $conn;
    // Prepare SQL query
    $query = "DELETE FROM locations WHERE id = :id";
    // Prepare the statement
    $stmt = $conn->prepare($query);
    // Bind parameters
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    // Execute the statement
    $stmt->execute();
    // Check if the location was deleted
    if ($stmt->rowCount() > 0) {
        return true; // Return true if row was deleted
    } else {
        return false; // Return false if no row was deleted
    }
}
?>