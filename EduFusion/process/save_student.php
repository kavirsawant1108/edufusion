<?php
// Firebase PHP SDK
require 'vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

// Firebase setup
$firebase = (new Factory)
    ->withServiceAccount('path/to/firebase_credentials.json') // Path to Firebase JSON file
    ->withDatabaseUri('https://your-database.firebaseio.com/')
    ->createDatabase();

// Get JSON data from request
$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    $student = [
        'fullName' => $data['fullName'],
        'enrollmentNo' => $data['enrollmentNo'],
        'branch' => $data['branch'],
        'year' => $data['year'],
        'currentSem' => $data['currentSem'],
    ];

    // Save to Firebase
    $firebase->getReference('students')->push($student);

    echo json_encode(["success" => true]);
} else {
    http_response_code(400);
    echo json_encode(["error" => "Invalid data"]);
}
?>
