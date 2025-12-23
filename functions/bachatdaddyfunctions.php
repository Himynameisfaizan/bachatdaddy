<?php
class User
{
    private $ID;
    private $uname;
    private $umobile;
    private $uemail;
    private $cname;
    private $cmobile;
    private $cemail;
    private $rmname;
    private $area;
    private $pincode;
    private $city;
    private $state;
    private $zone;
    private $accountno;
    private $ifsc;
    private $bankname;
    private $add_proof;
    private $pan_proof;
    private $bank_proof;
    private $agreement;
    private $conndb;

    function addUsers($uname, $umobile, $uemail, $password)
    {

        $conn = new dbClass();

        $sql = "
            INSERT INTO `users` (
                name, phone, email, password
            ) VALUES (
                :name, :mobile, :email, :password
            )";


        $params = [
            ':name' => $uname,
            ':mobile' => $umobile,
            ':email' => $uemail,
            ':password' => $password
        ];

        $stmt = $conn->executeStatement($sql, $params);

        return $stmt;
    }
    function checkMobile($mobile)
    {

        $conn = new dbClass();

        // Check if the mobile number already exists
        $query = "SELECT COUNT(*) AS count FROM `users` WHERE phone = :mobile";
        $params = [':mobile' => $mobile];
        $result = $conn->getDataWithParams($query, $params);

        if ($result && $result['count'] > 0) {
            return $result['count'];
        }
    }
    function checkEmail($Email)
    {

        $conn = new dbClass();

        // Check if the mobile number already exists
        $query = "SELECT COUNT(*) AS count FROM `users` WHERE email = :email";
        $params = [':email' => $Email];
        $result = $conn->getDataWithParams($query, $params);

        if ($result && $result['count'] > 0) {
            return $result['count'];
        }
    }

    function getUsersDetails($ID)
    {
        $conn = new dbClass();
        $stmt = $conn->getData("SELECT * FROM `users` WHERE `id` = '$ID'");

        return $stmt;
    }

    function getAllUsersDetails()
    {
        $conn = new dbClass();
        $stmt = $conn->getAllData("SELECT * FROM `users` Order by `id` Desc");

        return $stmt;
    }

    function getCardHolderData()
    {
        $conn = new dbClass();
        $stmt = $conn->getAllData("SELECT * FROM `cardnumber` Order by `id` Desc");

        return $stmt;
    }

    function addUserById($id, $adhar, $birthday, $anniversary, $state, $city, $pincode, $address, $representative_name, $image)
    {
        $conn = new dbClass();
        $sql = "UPDATE `users` SET image = :image, adhar = :adhar, birthday = :birthday, anniversary = :anniversary, state = :state, city = :city, pincode = :pincode, address = :address, representative_name = :representative_name WHERE id = :id";

        $params = [
            ':image' => $image,
            ':adhar' => $adhar,
            ':birthday' => $birthday,
            ':anniversary' => $anniversary,
            ':state' => $state,
            ':city' => $city,
            ':pincode' => $pincode,
            ':address' => $address,
            ':representative_name' => $representative_name,
            ':id' => $id
        ];

        $stmt = $conn->executeStatement($sql, $params);

        return $stmt;
    }
}

class Common
{
    function getAllIdustry()
    {
        $conn = new dbClass;
        $stmt = $conn->getAllData("SELECT * FROM `industry` where `active`='1' ORDER BY `id` DESC");
        return $stmt;
    }
    function getAllSubIn()
    {
        $conn = new dbClass;
        $stmt = $conn->getAllData("SELECT * FROM `sub_industry` where `active`='1' ORDER BY `id` DESC");
        return $stmt;
    }
    function getSubindustriesByIndustry($industryName)
    {
        $conn = new dbClass;
        $sql = "SELECT * FROM `sub_industry` WHERE `industry_id` = '$industryName' ORDER BY `id` DESC";  // Add single quotes around $stateName
        $stmt = $conn->getAllData($sql);

        return $stmt;
    }
    function getIdustry($id)
    {
        $conn = new dbClass;
        // $this->conndb = $conn;
        $stmt = $conn->getData("SELECT * FROM `industry` where `id`=$id ");
        return $stmt;
    }
    function getsubByIdustry($id)
    {
        $conn = new dbClass;
        $stmt = $conn->getAllData("SELECT * FROM `sub_industry` where `industry_id`=$id And `active`='1' ORDER BY `id` DESC");
        return $stmt;
    }
    function getsubIdustry($id)
    {
        $conn = new dbClass;
        $stmt = $conn->getData("SELECT * FROM `sub_industry` where `id`=$id ");
        return $stmt;
    }
    function getIdustryBySub($id)
    {
        $conn = new dbClass;
        $stmt = $conn->getData("SELECT * FROM `industry` where `id`=$id ");
        return $stmt;
    }
    function getCity($id)
    {
        $conn = new dbClass;
        $stmt = $conn->getData("SELECT * FROM `locations` where `id`=$id ");
        return $stmt;
    }
    function addContactMessage($name, $phone, $email, $message)
    {
        $conn = new dbClass();  // Initialize database connection

        // SQL query to insert the contact message data
        $sql = "
            INSERT INTO `contact_messages` (
                name, phone, email, message
            ) VALUES (
                :name, :phone, :email, :message
            )";

        // Parameters for the SQL query
        $params = [
            ':name' => $name,
            ':phone' => $phone,
            ':email' => $email,
            ':message' => $message
        ];

        // Execute the SQL query with the provided parameters
        $stmt = $conn->executeStatement($sql, $params);

        return $stmt;  // Return the result of the query execution
    }
    function getCitiesByState($stateName)
    {
        $conn = new dbClass;
        $sql = "SELECT * FROM `locations` WHERE `state` = '$stateName' ORDER BY `id` DESC";  // Add single quotes around $stateName
        $stmt = $conn->getAllData($sql);

        return $stmt;
    }
}

class Vendor
{

    private $conndb;


    public function getImagesByOfferIds(array $offerIds)
    {
        if (empty($offerIds)) {
            return [];
        }

        $conn = new dbClass();

        // Simple: direct string with IN clause
        $idList = implode(',', array_map('intval', $offerIds));

        $sql = "SELECT offer_id, image 
            FROM vendor_images 
            WHERE offer_id IN ($idList)";

        return $conn->getAllData($sql);
    }

    public function getMobilesByOfferIds(array $offerIds)
    {
        if (empty($offerIds)) {
            return [];
        }
        $conn = new dbClass();
        $idList = implode(',', array_map('intval', $offerIds));
        $sql = "SELECT offer_id, mobile 
        FROM vendermobile WHERE offer_id IN ($idList)";
        return $conn->getAllData($sql);
    }

    public function getEmailsByOfferIds(array $offerIds)
    {
        if (empty($offerIds)) {
            return [];
        }
        $conn = new dbClass();
        $idList = implode(',', array_map('intval', $offerIds));
        $sql = "SELECT offer_id, email FROM venderemail WHERE offer_id IN ($idList)";
        return $conn->getAllData($sql);
    }

    public function getSconditionsByOfferIds(array $offerIds)
    {
        if (empty($offerIds)) {
            return [];
        }
        $conn = new dbClass();
        $idList = implode(',', array_map('intval', $offerIds));
        $sql = "SELECT offer_id, `condition` FROM venderscondition WHERE offer_id IN ($idList)";
        return $conn->getAllData($sql);
    }

    public function getGconditionsByOfferIds(array $offerIds)
    {
        if (empty($offerIds)) {
            return [];
        }
        $conn = new dbClass();
        $idList = implode(',', array_map('intval', $offerIds));
        $sql = "SELECT offer_id, `condition` FROM vendergcondition WHERE offer_id IN ($idList)";
        return $conn->getAllData($sql);
    }


    public function getAllVendors()
    {
        $conn = new dbClass();
        $this->conndb = $conn;

        $sql_vendors = "SELECT 
                                v.id AS vendor_id, 
                                v.name AS vendor_name, 
                                v.image, 
                                v.address AS vendor_address,
                                v.status, 
                                v.offer,
                                v.email,
                                v.sdate,
                                v.edate,
                                v.city_id,           -- Adding city_id from vendor table
                                l.city AS city_name,  -- Adding city name from locations table
                                l.state AS city_state -- Adding state name from locations table
                            FROM vendor v
                            INNER JOIN locations l ON v.city_id = l.id   -- Joining with locations to get city name
                            ORDER BY v.id DESC";

        $vendors = $conn->getAllData($sql_vendors);

        return $vendors;
    }


    public function getVendorById($id)
    {
        $conn = new dbClass();

        $stmt = $conn->getAllData("SELECT 
                                        v.id AS vendor_id, 
                                        v.name AS vendor_name, 
                                        v.image,
                                        v.status,
                                        v.offer,
                                        v.email,
                                        v.sdate,
                                        v.edate, 
                                        v.address AS vendor_address, 
                                        v.city_id,           
                                        l.city AS city_name,  
                                        l.state AS city_state 
                                    FROM vendor v
                                    INNER JOIN locations l ON v.city_id = l.id
                                    WHERE v.id = $id ORDER BY vendor_id DESC");

        return $stmt;
    }
    public function getVendorBysub($id)
    {
        $conn = new dbClass();

        $stmt = $conn->getAllData("SELECT 
                                        v.id AS vendor_id, 
                                        v.name AS vendor_name, 
                                        v.image,
                                        v.status,
                                        v.offer,
                                        v.email,
                                        v.sdate,
                                        v.edate, 
                                        v.address AS vendor_address, 
                                        v.city_id,           
                                        l.city AS city_name,  
                                        l.state AS city_state 
                                    FROM vendor v
                                    INNER JOIN locations l ON v.city_id = l.id
                                    WHERE v.category_id = $id ORDER BY vendor_id DESC");

        return $stmt;
    }
    public function getVendorBysubAndCity($id, $cid)
    {
        $conn = new dbClass();

        $stmt = $conn->getAllData("SELECT 
                                        v.id AS vendor_id, 
                                        v.name AS vendor_name, 
                                        v.image,
                                        v.status,
                                        v.offer,
                                        v.email,
                                        v.sdate,
                                        v.edate, 
                                        v.address AS vendor_address, 
                                        v.city_id,           
                                        l.city AS city_name,  
                                        l.state AS city_state 
                                    FROM vendor v
                                    INNER JOIN locations l ON v.city_id = l.id
                                    WHERE v.category_id = $id and v.city_id = $cid ORDER BY vendor_id DESC");

        return $stmt;
    }

    function getAllImages($vid)
    {
        $conn = new dbClass();
        $stmt = $conn->getAllData("SELECT * FROM `vendor_images` WHERE `vendor_id` = $vid");
        return $stmt;
    }
    function getImage($id)
    {
        $conn = new dbClass();
        $stmt = $conn->getAllData("SELECT * FROM `vendor_images` WHERE `id` = $id ORDER BY id DESC");
        return $stmt;
    }

    // Get the name of a vendor by its ID
    public function getVendorName($id)
    {
        $conn = new dbClass;
        $this->conndb = $conn;

        $stmt = $conn->getData("SELECT `name` FROM `vendor` WHERE `id` = $id");
        return $stmt;
    }



    function getVendorDetails()
    {
        $conn = new dbClass();
        $stmt = $conn->getAllData("SELECT * FROM `vendor`");
        return $stmt;
    }
    function updateVendor($name, $email, $address, $city, $image, $id)
    {
        $conn = new dbClass();
        $sql = "UPDATE `vendor` SET  city_id = :city, name = :name, email = :email, address = :address, image = :image WHERE id = :id";
        $params = [
            ':name' => $name,
            ':email' => $email,
            ':address' => $address,
            ':city' => $city,
            ':image' => $image,
            ':id' => $id
        ];
        $stmt = $conn->executeStatement($sql, $params);
        return $stmt;
    }
    // Get All Vendor Emails
    public function getAllVendorEmails($vendorId)
    {
        $conn = new dbClass();
        $stmt = $conn->getAllData("SELECT * FROM `venderemail` WHERE `vendor_id` = $vendorId");
        return $stmt;
    }
    // Get All Vendor Phones
    public function getAllVendorPhones($vendorId)
    {
        $conn = new dbClass();
        $stmt = $conn->getAllData("SELECT * FROM `vendermobile` WHERE `vendor_id` = $vendorId");
        return $stmt;
    }
    // Get All Vendor Offers
    public function getAllVendorOffers($vendorId)
    {
        $conn = new dbClass();
        $stmt = $conn->getAllData("SELECT * FROM `venderoffer` WHERE `vendor_id` = $vendorId");
        return $stmt;
    }
    // Get All Vendor Special Conditions
    public function getAllVendorSconditions($vendorId)
    {
        $conn = new dbClass();
        $stmt = $conn->getAllData("SELECT * FROM `venderscondition` WHERE `vendor_id` = $vendorId");
        return $stmt;
    }
    // Get All Vendor General Conditions
    public function getAllVendorGconditions($vendorId)
    {
        $conn = new dbClass();
        $stmt = $conn->getAllData("SELECT * FROM `vendergcondition` WHERE `vendor_id` = $vendorId");
        return $stmt;
    }
}
