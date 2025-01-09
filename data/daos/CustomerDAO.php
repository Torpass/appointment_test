<?php
require_once __DIR__ . '/../../config/config.php';
require_once './Connection.php';
require_once '/classes/Customer/Customer.php';

$connect = new ConexionSQL();
$conn = $connect->getConnection();

/**
 * Adds a new customer to the database
 */
function addCustomer($user_id, $user_id_code, $userIsActive, $username, $password, $newsletterSubscription, $termsAndPrivacyAccepted, $folderPath, $profilePicture, $userStatus, $userStatusDate, $userNotes, $customer_id_code, $customerIsActive, $firstName, $middleName, $lastName, $dateOfBirth, $gender, $maritalStatus, $occupation, $customerStatus, $customerStatusDate, $customerNotes, $ipAddress, $serverLanguage, $formLanguage, $createdAt, $updatedAt)
{
    global $conn;

    // Prepare SQL query
    $query = "INSERT INTO customers (id_code, is_active, user_id, first_name, middle_name, last_name, date_of_birth, gender, marital_status, occupation, status, status_date, notes, ip_address, server_language, form_language, created_at, updated_at) VALUES (:id_code, :is_active, :user_id, :first_name, :middle_name, :last_name, :date_of_birth, :gender, :marital_status, :occupation, :status, :status_date, :notes, :ip_address, :server_language, :form_language, :created_at, :updated_at)";
    // Prepare the statement
    $stmt = $conn->prepare($query);
    // Bind parameters
    $stmt->bindParam(':id_code', $customer_id_code);
    $stmt->bindParam(':is_active', $customerIsActive);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':first_name', $firstName);
    $stmt->bindParam(':middle_name', $middleName);
    $stmt->bindParam(':last_name', $lastName);
    $stmt->bindParam(':date_of_birth', $dateOfBirth);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':marital_status', $maritalStatus);
    $stmt->bindParam(':occupation', $occupation);
    $stmt->bindParam(':status', $customerStatus);
    $stmt->bindParam(':status_date', $customerStatusDate);
    $stmt->bindParam(':notes', $customerNotes);
    $stmt->bindParam(':ip_address', $ipAddress);
    $stmt->bindParam(':server_language', $serverLanguage);
    $stmt->bindParam(':form_language', $formLanguage);
    $stmt->bindParam(':created_at', $createdAt);
    $stmt->bindParam(':updated_at', $updatedAt);
    // Execute the statement
    $stmt->execute();

    // Retrieve the automatically generated ID
    $customer_id = $conn->lastInsertId();

    // Create the Customer object
    $customer = new Customer($user_id, $user_id_code, $userIsActive, $username, $password, $newsletterSubscription, $termsAndPrivacyAccepted, $folderPath, $profilePicture, $userStatus, $userStatusDate, $userNotes, $customer_id, $customer_id_code, $customerIsActive, $firstName, $middleName, $lastName, $dateOfBirth, $gender, $maritalStatus, $occupation, $customerStatus, $customerStatusDate, $customerNotes);
    // Return the Service object
    return $customer;
}

/**
 * Retrieves a customer from the database by customer_id
 */
function getCustomerById($customer_id)
{
    global $conn;
    // Prepare SQL query with JOIN
    $query = "SELECT users.id_code AS user_id_code, users.is_active AS user_is_active, users.username, users.password, users.newsletter_subscription, users.tap_accepted, users.folder_path, users.profile_picture, users.status AS user_status, users.status_date AS user_status_date, users.notes AS user_notes, customers.*, customers.id AS customer_id, customers.id_code AS customer_id_code, customers.is_active AS customer_is_active, customers.status AS customer_status, customers.status_date AS customer_status_date, customers.notes AS customer_notes FROM users JOIN customers ON customers.user_id = users.id WHERE customers.id = :customer_id";
    // Prepare the statement
    $stmt = $conn->prepare($query);
    // Bind parameters
    $stmt->bindParam(':customer_id', $customer_id, PDO::PARAM_INT);
    // Execute the statement
    $stmt->execute();
    // Retrieve the customer from the result 
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if a customer was found
    if ($result) {
        // Create a Customer object with the retrieved data
        $customer = new Customer(
            $result['user_id'],
            $result['user_id_code'],
            $result['user_is_active'],
            $result['username'],
            $result['password'],
            $result['newsletter_subscription'],
            $result['tap_accepted'],
            $result['folder_path'],
            $result['profile_picture'],
            $result['user_status'],
            $result['user_status_date'],
            $result['user_notes'],
            $result['customer_id'],
            $result['customer_id_code'],
            $result['customer_is_active'],
            $result['first_name'],
            $result['middle_name'],
            $result['last_name'],
            $result['date_of_birth'],
            $result['gender'],
            $result['marital_status'],
            $result['occupation'],
            $result['customer_status'],
            $result['customer_status_date'],
            $result['customer_notes']
        );
        // Return the Customer object
        return $customer;
    } else {
        // If no customer was found, return null
        return null;
    }
}

/**
 * Retrieves a customer from the database by user_id
 */
function getCustomerByUserId($user_id)
{
    global $conn;

    // Prepare SQL query with JOIN
    $query = "SELECT users.id_code AS user_id_code, users.is_active AS user_is_active, users.username, users.password, users.newsletter_subscription, users.tap_accepted, users.folder_path, users.profile_picture, users.status AS user_status, users.status_date AS user_status_date, users.notes AS user_notes, customers.*, customers.id AS customer_id, customers.id_code AS customer_id_code, customers.is_active AS customer_is_active, customers.status AS customer_status, customers.status_date AS customer_status_date, customers.notes AS customer_notes FROM users JOIN customers ON customers.user_id = users.id WHERE customers.user_id = :user_id";
    // Prepare the statement
    $stmt = $conn->prepare($query);
    // Bind parameters
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    // Execute the statement
    $stmt->execute();
    // Retrieve the customer from the result 
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if a customer was found
    if ($result) {
        // Create a Customer object with the retrieved data
        $customer = new Customer(
            $result['user_id'],
            $result['user_id_code'],
            $result['user_is_active'],
            $result['username'],
            $result['password'],
            $result['newsletter_subscription'],
            $result['tap_accepted'],
            $result['folder_path'],
            $result['profile_picture'],
            $result['user_status'],
            $result['user_status_date'],
            $result['user_notes'],
            $result['customer_id'],
            $result['customer_id_code'],
            $result['customer_is_active'],
            $result['first_name'],
            $result['middle_name'],
            $result['last_name'],
            $result['date_of_birth'],
            $result['gender'],
            $result['marital_status'],
            $result['occupation'],
            $result['customer_status'],
            $result['customer_status_date'],
            $result['customer_notes']
        );
        // Return the Customer object
        return $customer;
    } else {
        // If no customer was found, return null
        return null;
    }
}

/**
 * Retrieves a customer from the database by username
 */
function getCustomerByUsername($username)
{
    global $conn;

    // Prepare SQL query with JOIN
    $query = "SELECT users.id_code AS user_id_code, users.is_active AS user_is_active, users.username, users.password, users.newsletter_subscription, users.tap_accepted, users.folder_path, users.profile_picture, users.status AS user_status, users.status_date AS user_status_date, users.notes AS user_notes, customers.*, customers.id AS customer_id, customers.id_code AS customer_id_code, customers.is_active AS customer_is_active, customers.status AS customer_status, customers.status_date AS customer_status_date, customers.notes AS customer_notes FROM users JOIN customers ON customers.user_id = users.id WHERE customers.username = :username";
    // Prepare the statement
    $stmt = $conn->prepare($query);
    // Bind parameters
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    // Execute the statement
    $stmt->execute();
    // Retrieve the customer from the result (gets the entire row as an associative array)
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if a customer was found
    if ($result) {
        // Create a Customer object with the retrieved data
        $customer = new Customer(
            $result['user_id'],
            $result['user_id_code'],
            $result['user_is_active'],
            $result['username'],
            $result['password'],
            $result['newsletter_subscription'],
            $result['tap_accepted'],
            $result['folder_path'],
            $result['profile_picture'],
            $result['user_status'],
            $result['user_status_date'],
            $result['user_notes'],
            $result['customer_id'],
            $result['customer_id_code'],
            $result['customer_is_active'],
            $result['first_name'],
            $result['middle_name'],
            $result['last_name'],
            $result['date_of_birth'],
            $result['gender'],
            $result['marital_status'],
            $result['occupation'],
            $result['customer_status'],
            $result['customer_status_date'],
            $result['customer_notes']
        );
        // Return the Customer object
        return $customer;
    } else {
        // If no customer was found, return null
        return null;
    }
}

/**
 * Retrieves a customer from the database by email address
 */
function getCustomerByEmail($email)
{
    global $conn;

    // Prepare SQL query with JOIN
    $query = "SELECT users.id_code AS user_id_code, users.is_active AS user_is_active, users.username, users.password, users.newsletter_subscription, users.tap_accepted, users.folder_path, users.profile_picture, users.status AS user_status, users.status_date AS user_status_date, users.notes AS user_notes, customers.*, customers.id AS customer_id, customers.id_code AS customer_id_code, customers.is_active AS customer_is_active, customers.status AS customer_status, customers.status_date AS customer_status_date, customers.notes AS customer_notes FROM emails JOIN customers ON emails.customer_id = customers.id JOIN users ON emails.user_id = users.id WHERE emails.address = :email";
    // Prepare the statement
    $stmt = $conn->prepare($query);
    // Bind parameters
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    // Execute the statement
    $stmt->execute();
    // Retrieve the customer from the result 
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if a customer was found
    if ($result) {
        // Create a Customer object with the retrieved data
        $customer = new Customer(
            $result['user_id'],
            $result['user_id_code'],
            $result['user_is_active'],
            $result['username'],
            $result['password'],
            $result['newsletter_subscription'],
            $result['tap_accepted'],
            $result['folder_path'],
            $result['profile_picture'],
            $result['user_status'],
            $result['user_status_date'],
            $result['user_notes'],
            $result['customer_id'],
            $result['customer_id_code'],
            $result['customer_is_active'],
            $result['first_name'],
            $result['middle_name'],
            $result['last_name'],
            $result['date_of_birth'],
            $result['gender'],
            $result['marital_status'],
            $result['occupation'],
            $result['customer_status'],
            $result['customer_status_date'],
            $result['customer_notes']
        );
        // Return the Customer object
        return $customer;
    } else {
        // If no customer was found, return null
        return null;
    }
}

/**
 * Retrieves a customer from the database by phone
 */
function getCustomerByPhone($phone)
{
    global $conn;
    // Prepare SQL query with JOIN
    $query = "SELECT users.id_code AS user_id_code, users.is_active AS user_is_active, users.username, users.password, users.newsletter_subscription, users.tap_accepted, users.folder_path, users.profile_picture, users.status AS user_status, users.status_date AS user_status_date, users.notes AS user_notes, customers.*, customers.id AS customer_id, customers.id_code AS customer_id_code, customers.is_active AS customer_is_active, customers.status AS customer_status, customers.status_date AS customer_status_date, customers.notes AS customer_notes FROM phones JOIN customers ON phones.customer_id = customers.id JOIN users ON phones.user_id = users.id WHERE phones.address = :phone";
    // Prepare the statement
    $stmt = $conn->prepare($query);
    // Bind parameters
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
    // Execute the statement
    $stmt->execute();
    // Retrieve the customer from the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if a customer was found
    if ($result) {
        // Create a Customer object with the retrieved data
        $customer = new Customer(
            $result['user_id'],
            $result['user_id_code'],
            $result['user_is_active'],
            $result['username'],
            $result['password'],
            $result['newsletter_subscription'],
            $result['tap_accepted'],
            $result['folder_path'],
            $result['profile_picture'],
            $result['user_status'],
            $result['user_status_date'],
            $result['user_notes'],
            $result['customer_id'],
            $result['customer_id_code'],
            $result['customer_is_active'],
            $result['first_name'],
            $result['middle_name'],
            $result['last_name'],
            $result['date_of_birth'],
            $result['gender'],
            $result['marital_status'],
            $result['occupation'],
            $result['customer_status'],
            $result['customer_status_date'],
            $result['customer_notes']
        );
        // Return the Customer object
        return $customer;
    } else {
        // If no customer was found, return null
        return null;
    }
}

/**
 * Retrieves a customer from the database by name (firstName, middleName, lastName)
 */
function getCustomerByName($name)
{
    global $conn;

    // Prepare SQL query with JOIN
    $query = "SELECT users.id_code AS user_id_code, users.is_active AS user_is_active, users.username, users.password, users.newsletter_subscription, users.tap_accepted, users.folder_path, users.profile_picture, users.status AS user_status, users.status_date AS user_status_date, users.notes AS user_notes, customers.*, customers.id AS customer_id, customers.id_code AS customer_id_code, customers.is_active AS customer_is_active, customers.status AS customer_status, customers.status_date AS customer_status_date, customers.notes AS customer_notes FROM users JOIN customers ON customers.user_id = users.id WHERE WHERE customers.first_name = :name OR customers.middle_name = :name OR customers.last_name = :name";
    // Prepare the statement
    $stmt = $conn->prepare($query);
    // Bind parameters
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    // Execute the statement
    $stmt->execute();
    // Retrieve the customer from the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if a customer was found
    if ($result) {
        // Create a Customer object with the retrieved data
        $customer = new Customer(
            $result['user_id'],
            $result['user_id_code'],
            $result['user_is_active'],
            $result['username'],
            $result['password'],
            $result['newsletter_subscription'],
            $result['tap_accepted'],
            $result['folder_path'],
            $result['profile_picture'],
            $result['user_status'],
            $result['user_status_date'],
            $result['user_notes'],
            $result['customer_id'],
            $result['customer_id_code'],
            $result['customer_is_active'],
            $result['first_name'],
            $result['middle_name'],
            $result['last_name'],
            $result['date_of_birth'],
            $result['gender'],
            $result['marital_status'],
            $result['occupation'],
            $result['customer_status'],
            $result['customer_status_date'],
            $result['customer_notes']
        );
        // Return the Customer object
        return $customer;
    } else {
        // If no customer was found, return null
        return null;
    }
}

/**
 * Retrieves a customer from the database by date of birth
 */
function getCustomerByDateOfBirth($dateOfBirth)
{
    global $conn;

    // Prepare SQL query with JOIN
    $query = "SELECT users.id_code AS user_id_code, users.is_active AS user_is_active, users.username, users.password, users.newsletter_subscription, users.tap_accepted, users.folder_path, users.profile_picture, users.status AS user_status, users.status_date AS user_status_date, users.notes AS user_notes, customers.*, customers.id AS customer_id, customers.id_code AS customer_id_code, customers.is_active AS customer_is_active, customers.status AS customer_status, customers.status_date AS customer_status_date, customers.notes AS customer_notes FROM users JOIN customers ON customers.user_id = users.id WHERE customers.date_of_birth = :date_of_birth";
    // Prepare the statement
    $stmt = $conn->prepare($query);
    // Bind parameters
    $stmt->bindParam(':dateOfBirth', $dateOfBirth, PDO::PARAM_STR);
    // Execute the statement
    $stmt->execute();
    // Retrieve the customer from the result 
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if a customer was found
    if ($result) {
        // Create a Customer object with the retrieved data
        $customer = new Customer(
            $result['user_id'],
            $result['user_id_code'],
            $result['user_is_active'],
            $result['username'],
            $result['password'],
            $result['newsletter_subscription'],
            $result['tap_accepted'],
            $result['folder_path'],
            $result['profile_picture'],
            $result['user_status'],
            $result['user_status_date'],
            $result['user_notes'],
            $result['customer_id'],
            $result['customer_id_code'],
            $result['customer_is_active'],
            $result['first_name'],
            $result['middle_name'],
            $result['last_name'],
            $result['date_of_birth'],
            $result['gender'],
            $result['marital_status'],
            $result['occupation'],
            $result['customer_status'],
            $result['customer_status_date'],
            $result['customer_notes']
        );
        // Return the Customer object
        return $customer;
    } else {
        // If no customer was found, return null
        return null;
    }
}

/**
 * Gets all customers from the database
 */
function getAllCustomers()
{
    global $conn;
    // Prepare SQL query with JOIN
    $query = "SELECT users.id_code AS user_id_code, users.is_active AS user_is_active, users.username, users.password, users.newsletter_subscription, users.tap_accepted, users.folder_path, users.profile_picture, users.status AS user_status, users.status_date AS user_status_date, users.notes AS user_notes, customers.*, customers.id AS customer_id, customers.id_code AS customer_id_code, customers.is_active AS customer_is_active, customers.status AS customer_status, customers.status_date AS customer_status_date, customers.notes AS customer_notes FROM users JOIN customers ON customers.user_id = users.id";
    // Prepare the statement
    $stmt = $conn->prepare($query);
    // Execute the statement
    $stmt->execute();
    // Retrieve the customers from the result 
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Create an array to store Customer objects
    $customers = [];
    // Check if any customer was found
    if ($results) {
        // Loop through the results and create instances of the Customer class with the data obtained from the database
        foreach ($results  as $result) {
            $customer = new Customer(
                $result['user_id'],
                $result['user_id_code'],
                $result['user_is_active'],
                $result['username'],
                $result['password'],
                $result['newsletter_subscription'],
                $result['tap_accepted'],
                $result['folder_path'],
                $result['profile_picture'],
                $result['user_status'],
                $result['user_status_date'],
                $result['user_notes'],
                $result['customer_id'],
                $result['customer_id_code'],
                $result['customer_is_active'],
                $result['first_name'],
                $result['middle_name'],
                $result['last_name'],
                $result['date_of_birth'],
                $result['gender'],
                $result['marital_status'],
                $result['occupation'],
                $result['customer_status'],
                $result['customer_status_date'],
                $result['customer_notes']
            );
            // Add the Customer object to the array
            $customers[] = $customer;
        }
        // Return the Customer objects
        return $customers;
    } else {
        // If no customer was found, return null
        return null;
    }
}

/**
 * Edits an existing customer in the database
 */
function editCustomer($customer_id, $customerIsActive, $firstName, $middleName, $lastName, $dateOfBirth, $gender, $maritalStatus, $occupation, $customerStatus, $customerStatusDate, $customerNotes)
{
    global $conn;
    // Prepare SQL query 
    $query = "UPDATE customers SET is_active = :is_active, first_name = :first_name, middle_name = :middle_name, last_name = :last_name, date_of_birth = :date_of_birth, gender = :gender, marital_status = :marital_status, occupation = :occupation, status = :status, status_date = :status_date, notes = :notes WHERE id = :customer_id";
    // Prepare the statement
    $stmt = $conn->prepare($query);
    // Bind parameters
    $stmt->bindParam(':customer_id', $customer_id);
    $stmt->bindParam(':is_active', $customerIsActive);
    $stmt->bindParam(':first_name', $firstName);
    $stmt->bindParam(':middle_name', $middleName);
    $stmt->bindParam(':last_name', $lastName);
    $stmt->bindParam(':date_of_birth', $dateOfBirth);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':marital_status', $maritalStatus);
    $stmt->bindParam(':occupation', $occupation);
    $stmt->bindParam(':status', $customerStatus);
    $stmt->bindParam(':status_date', $customerStatusDate);
    $stmt->bindParam(':notes', $customerNotes);
    // Execute the statement
    return $stmt->execute();
    // Check the number of rows affected
    if ($stmt->rowCount() > 0) {
        // Return true if there are rows affected
        return true;
    } else {
        // Return false if there are no rows affected
        return false;
    }
}

/**
 * Deletes a customer from the database
 */
function deleteCustomer($customer_id)
{
    global $conn;
    // Prepare SQL query
    $query = "DELETE FROM customers WHERE id = :id";
    // Prepare the statement
    $stmt = $conn->prepare($query);
    // Bind parameters
    $stmt->bindParam(':id', $customer_id, PDO::PARAM_INT);
    // Execute the statement
    $stmt->execute();
    // Check if the customer was deleted
    if ($stmt->rowCount() > 0) {
        return true; // Return true if row was deleted
    } else {
        return false; // Return false if no row was deleted
    }
}

/**
 * Counts the total number of customers in the database
 */
function countCustomers()
{
    global $conn;
    // Prepare SQL query
    $query = "SELECT COUNT(*) FROM customers";
    // Prepare the statement
    $stmt = $conn->prepare($query);
    // Execute the statement
    $stmt->execute();
    // Retrieve the customers from the result
    $result = $stmt->fetchColumn();
    // Get and return the result
    if ($result) {
        return $result;
    } else {
        // If no customers were found, return null
        return null;
    }
}

/**
 * Check if a customer exists in the database
 */
function checkCustomerExists($field, $value)
{
    global $conn;
    // Prepare SQL query
    $query = "SELECT COUNT(*) FROM customers WHERE $field LIKE :value";
    // Prepare the statement
    $stmt = $conn->prepare($query);
    // Bind parameters
    $stmt->bindValue(':value', '%' . $value . '%', PDO::PARAM_STR);
    // Execute the statement
    $stmt->execute();
    // Retrieve the customers from the result
    $result = $stmt->fetchColumn();
    // Check if the customer exists
    if ($result > 0) {
        return true;
    } else {
        // If no customer was found, return false
        return false;
    }
}
