<?php
// include 'config/config.php';
// include 'functions/bachatdaddyfunctions.php';
// header('Content-Type: application/json');

// $response = array();

// $conn = new dbClass();
// $user = new User();

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $image =isset($_FILES['image']['name']) ? time() . "-" . $_FILES['img']['name'] : "";
//     $id = isset($_POST['id']) ? trim($_POST['id']) : '';
//     $birthday = isset($_POST['birthday']) ? trim($_POST['birthday']) : '';
//     $anniversary = isset($_POST['anniversary']) ? trim($_POST['anniversary']) : '';
//     $state = isset($_POST['state']) ? trim($_POST['state']) : '';
//     $city = isset($_POST['city']) ? trim($_POST['city']) : '';
//     $pincode = isset($_POST['pincode']) ? trim($_POST['pincode']) : '';
//     $address = isset($_POST['address']) ? trim($_POST['address']) : '';
//     $adhar = isset($_POST['adhar_no']) ? trim($_POST['adhar_no']) : '';
//     $representative_name = isset($_POST['representative_name']) ? trim($_POST['representative_name']) : '';
//     $imagetmp = $_FILES['image']['tmp_name'];
//     $dest = "bachatdaddy@1357admin/adminuploads/images/users/" . $image;
// // echo "<script type='text/javascript'>alert('".json_encode([
// //     'id' => $id,
// //     'birthday' => $birthday,
// //     'anniversary' => $anniversary,
// //     'state' => $state,
// //     'city' => $city,
// //     'pincode' => $pincode,
// //     'address' => $address,
// //     'representative_name' => $representative_name
// // ])."');</script>";
//     if (empty($birthday) || empty($state) || empty($city) || empty($pincode) || empty($address) || empty($representative_name) || empty($adhar)) {
//         $response['status'] = 'error';
//         $response['message'] = 'Please fill in all required fields.';
//     } else {
//         $result = $user->addUserById($id,$adhar, $birthday, $anniversary, $state, $city, $pincode, $address, $representative_name,$image);

//         if ($result === true) {
//             move_uploaded_file($imagetmp, $dest);
//             $response['status'] = 'success';
//             $response['message'] = 'Form submitted successfully!';
//             $response['redirect'] = 'index.php';
//         } else {
//             $response['status'] = 'error';
//             $response['message'] = 'Problem in SQL execution.';
//         }

//     }
// } else {
//     $response['status'] = 'error';
//     $response['message'] = 'Invalid request method.';
// }

// echo json_encode($response);
// exit;
?>
<?php
include 'config/config.php';
include 'functions/bachatdaddyfunctions.php';
header('Content-Type: application/json');

$response = array();

// Assuming dbClass and User class are correctly set up.
$conn = new dbClass();
$user = new User();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if image is uploaded
    $image = isset($_FILES['image']['name']) ? time() . "-" . $_FILES['image']['name'] : "";

    // Gather other form data
    $id = isset($_POST['id']) ? trim($_POST['id']) : '';
    $birthday = isset($_POST['birthday']) ? trim($_POST['birthday']) : '';
    $anniversary = isset($_POST['anniversary']) ? trim($_POST['anniversary']) : '';
    $state = isset($_POST['state']) ? trim($_POST['state']) : '';
    $city = isset($_POST['city']) ? trim($_POST['city']) : '';
    $pincode = isset($_POST['pincode']) ? trim($_POST['pincode']) : '';
    $address = isset($_POST['address']) ? trim($_POST['address']) : '';
    $adhar = isset($_POST['adhar_no']) ? trim($_POST['adhar_no']) : '';
    $representative_name = isset($_POST['representative_name']) ? trim($_POST['representative_name']) : '';

    // Handle file upload if image is selected
    if (!empty($image)) {
        $imagetmp = $_FILES['image']['tmp_name'];
        $dest = "bachatdaddy@1357admin/adminuploads/images/users/" . $image;

        // Check if all required fields are filled
        if (empty($birthday) || empty($state) || empty($city) || empty($pincode) || empty($address) || empty($representative_name) || empty($adhar)) {
            $response['status'] = 'error';
            $response['message'] = 'Please fill in all required fields.';
        } else {
            // Add user data including the image
            $result = $user->addUserById($id, $adhar, $birthday, $anniversary, $state, $city, $pincode, $address, $representative_name, $image);

            // Check result and handle image upload
            if ($result === true) {
                // Move the uploaded file to the desired directory
                if (move_uploaded_file($imagetmp, $dest)) {
                    $response['status'] = 'success';
                    $response['message'] = 'Form submitted successfully!';
                    $response['redirect'] = 'index.php';
                } else {
                    $response['status'] = 'error';
                    $response['message'] = 'Error in uploading the image.';
                }
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Problem in SQL execution.';
            }
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'No image uploaded.';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request method.';
}

// Output the response as JSON
echo json_encode($response);
exit;
?>

