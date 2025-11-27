<?php
        
        class User{
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

        function addUsers($uname, $umobile, $uemail, $cname, $cmobile, $cemail, 
        $rmname, $area, $pincode, $city, $state, $zone, 
        $accountno, $ifsc, $bankname, $add_proof, $pan_proof, 
        $bank_proof, $agreement,$password) {
        
        $conn = new dbClass();
    
        $sql = "
        INSERT INTO `users` (
            uname, umobile, uemail, cname, cmobile, cemail, 
            rmname, area, pincode, city, state, zone, 
            accountno, ifsc, bankname, add_proof, pan_proof, 
            bank_proof, agreement, password
        ) VALUES (
            :uname, :umobile, :uemail, :cname, :cmobile, :cemail, 
            :rmname, :area, :pincode, :city, :state, :zone, 
            :accountno, :ifsc, :bankname, :add_proof, :pan_proof, 
            :bank_proof, :agreement, :password
        )";
    
        // $stmt = $conn->prepare($sql);
    
        $params=[
            ':uname' => $uname,
            ':umobile' => $umobile,
            ':uemail' => $uemail,
            ':cname' => $cname,
            ':cmobile' => $cmobile,
            ':cemail' => $cemail,
            ':rmname' => $rmname,
            ':area' => $area,
            ':pincode' => $pincode,
            ':city' => $city,
            ':state' => $state,
            ':zone' => $zone,
            ':accountno' => $accountno,
            ':ifsc' => $ifsc,
            ':bankname' => $bankname,
            ':add_proof' => $add_proof,
            ':pan_proof' => $pan_proof,
            ':bank_proof' => $bank_proof,
            ':agreement' => $agreement,
            ':password' => $password
        ];

        $stmt=$conn->executeStatement($sql,$params);
    
        return $stmt;
    }
    
        function checkMobile($mobile) {

            $conn=new dbClass();

            // Check if the mobile number already exists
            $query = "SELECT COUNT(*) AS count FROM `users` WHERE umobile = :mobile";
            $params = [':mobile' => $mobile];
            $result = $conn->getDataWithParams($query, $params);

            if ($result && $result['count'] > 0) {
                return $result['count'];
            }
            // $query = "SELECT COUNT(*) AS count FROM `register-us` WHERE umobile = :mobile";
            // $stmt = $pdo->prepare($query);
            // $stmt->bindParam(':mobile', $mobile, PDO::PARAM_STR);
            // $stmt->execute();
            // $result = $stmt->fetch(PDO::FETCH_ASSOC);
            // return $result['count'];
        }
        function getUsersDetails()
        {
            $conn = new dbClass();
            $stmt = $conn->getAllData("SELECT * FROM `users`");
    
            return $stmt;
        }
        function delete($id){
            $conn= new dbClass();
            $query = "DELETE FROM `users` WHERE `id` = $id";
            $stmt = $conn->execute($query);
            return $stmt;
            
           
            
        }

    }



    class Contact{
        private $conndb;
        private $txtStartDate;
        private $txtEndDate;

        function getContactrDetails()
        {
            $conn = new dbClass();
            $stmt = $conn->getAllData("SELECT * FROM `contact_messages`");
            return $stmt;
        }
        function delete($id){
            $conn= new dbClass();
            $query = "DELETE FROM `contact_messages` WHERE `id` = $id";
            $stmt = $conn->execute($query);
            return $stmt;
           
        }

    }

    
    class Industry{

        private $conndb;
        private $name;
        private $txtEndDate;

        function getAllIdustry() {
            $conn = new dbClass;
            $this->conndb = $conn;
           
        
            $stmt = $conn->getAllData("SELECT * FROM `industry` ORDER BY `id` DESC");
                 
            return $stmt;
        }
        function getIdustry($id) {
            $conn = new dbClass;
            $this->conndb = $conn;
           
        
            $stmt = $conn->getData("SELECT * FROM `industry` where `id`=$id ");
                 
            return $stmt;
        }
        function addindutry($name){
            $conn = new dbClass;
            $this->conndb = $conn;
            $this->name=$name;
            $sql = "INSERT INTO `industry` (name) VALUES (:uname)";
            $params=[':uname' => $name];
            $stmt=$conn->executeStatement($sql,$params);
            return $stmt;
        }
        function updateindutry($name,$id){
            $conn = new dbClass;
            $this->conndb = $conn;
            $this->name=$name;
            // $sql = "UPDATE `industry` SET `name` = $name where `id`=$id";
            $sql = "UPDATE `industry` SET `name` = '$name' WHERE `id` = $id";
            $stmt=$conn->execute($sql);
            return $stmt;
        }
        function visibility($id,$vis){
            $conn = new dbClass();
            $this->conndb = $conn;
            $sql= "UPDATE `industry` SET `active`='$vis' WHERE `id`= '$id'";
            
            $stmt = $conn->execute($sql);

            return $stmt;
            
        }
        function delete($id){
            $conn= new dbClass();
            $query = "DELETE FROM `industry` WHERE `id` = $id";
            $stmt = $conn->execute($query);
            // if($stmt){
            //     $deleteSubCatQuery ="DELETE FROM `sub_industry` WHERE `industry_id` = $id";
            //     $stmt= $conn->execute($deleteSubCatQuery);
                
            // }
            return $stmt;
            
           
            
        }
    }

    
    class SubIndustry{

        private $conndb;
        private $name;
        private $txtEndDate;

        function getAllIndustry() {
            $conn = new dbClass();
            $this->conndb = $conn;
            $sql_sub_industries = "SELECT si.id AS sub_industry_id, si.name AS sub_industry_name, si.image, 
                                          si.active AS sub_industry_active, si.industry_id, i.name AS industry_name 
                                   FROM sub_industry si
                                   INNER JOIN industry i ON si.industry_id = i.id ORDER BY si.id DESC ";
        
            $sub_industries = $conn->getAllData($sql_sub_industries);
        
            return $sub_industries;
        }
        
        function getIdustry($id) {
            $conn = new dbClass;
            $this->conndb = $conn;
           
        
            $stmt = $conn->getData("SELECT * FROM `sub_industry` where `id`=$id ");
                 
            return $stmt;
        }
        function addindutry($category,$industryId,$image){
            $conn = new dbClass;
            $this->conndb = $conn;

            $sql = "INSERT INTO `sub_industry` (name, image, industry_id) VALUES (:name, :image, :industry_id)";
        
            // Prepare the parameters
            $params = [
                ':name' => $category,
                ':image' => $image,
                ':industry_id' => $industryId
            ];
            $stmt=$conn->executeStatement($sql,$params);
            return $stmt;
        }
        function updateindutry($category,$image,$id){
            $conn = new dbClass;
            $this->conndb = $conn;

            $sql = "UPDATE `sub_industry` SET name = :name, image = :image WHERE id = :id";

            // Prepare the parameters
            $params = [
                ':name' => $category,
                ':image' => $image,
                ':id' => $id,  // Assuming you have an $id variable for the record you want to update
            ];
            $stmt=$conn->executeStatement($sql,$params);
            return $stmt;
        }
        function visibility($id,$vis){
            $conn = new dbClass();
            $this->conndb = $conn;
            $sql= "UPDATE `sub_industry` SET `active`='$vis' WHERE `id`= '$id'";
            $stmt = $conn->execute($sql);
            return $stmt;
        }
        function delete($id){
            $conn= new dbClass();
            $query = "DELETE FROM `sub_industry` WHERE `id` = $id";
            $stmt = $conn->execute($query);
            return $stmt;
        }
        function getIndustryName($id){
            $conn = new dbClass;
            $this->conndb = $conn;
           
        
            $stmt = $conn->getData("SELECT `name` FROM `industry` where `id`=$id ");
                 
            return $stmt;
        }
        function getsubByIdustry($id) {
            $conn = new dbClass;
            $stmt = $conn->getAllData("SELECT * FROM `sub_industry` where `industry_id`=$id And `active`='1' ORDER BY `id` DESC");   
            return $stmt;
        }
    }

    class City{
        function addLocation($city, $state) {
            $conn = new dbClass;

            $sql = "INSERT INTO `locations` (city, state) VALUES (:city, :state)";

            $params = [
                ':city' => $city,
                ':state' => $state
            ];
        
            $stmt = $conn->executeStatement($sql, $params);
            return $stmt;
        }
        function getAllLocations() {
            $conn = new dbClass;
            $stmt = $conn->getAllData("SELECT * FROM `locations` ORDER BY `id` DESC");
            
            return $stmt;
        }
        function delete($id) {
            $conn = new dbClass();
            $query = "DELETE FROM `locations` WHERE `id` = $id";
            $stmt = $conn->execute($query);
            return $stmt;
        }
        
        
    }


    class Common{
        function getCitiesByState($stateName) {
            $conn = new dbClass;
            $sql = "SELECT * FROM `locations` WHERE `state` = '$stateName' ORDER BY `id` DESC";  // Add single quotes around $stateName
            $stmt = $conn->getAllData($sql);
            
            return $stmt;
        }
        function getSubindustriesByIndustry($industryName) {
            $conn = new dbClass;
            $sql = "SELECT * FROM `sub_industry` WHERE `industry_id` = '$industryName' ORDER BY `id` DESC";  // Add single quotes around $stateName
            $stmt = $conn->getAllData($sql);
            
            return $stmt;
        }
    }


    class Vendor {

        private $conndb;
    
        
        public function getAllVendors() {
            $conn = new dbClass();
            $this->conndb = $conn;
            
            $sql_vendors = "SELECT 
                                v.id AS vendor_id, 
                                v.name AS vendor_name, 
                                v.category_id,
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
        
    
        public function getVendorById($id) {
            $conn = new dbClass();
        
            $stmt = $conn->getAllData("SELECT 
                                        v.id AS vendor_id, 
                                        v.name AS vendor_name, 
                                        v.category_id,
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
                                    WHERE v.id = $id");  
        
            return $stmt;
        }

        function getAllImages($vid){
            $conn = new dbClass();
            $stmt=$conn->getAllData("SELECT * FROM `vendor_images` WHERE `vendor_id` = $vid");
            return $stmt;
        }
        function getImage($id){
            $conn = new dbClass();
            $stmt=$conn->getAllData("SELECT * FROM `vendor_images` WHERE `id` = $id ORDER BY id DESC");
            return $stmt;
        }
        public function deleteImg($id) {
            $conn = new dbClass();
            $query = "DELETE FROM `vendor_images` WHERE `id` = $id";
            $stmt = $conn->execute($query);
            return $stmt;
        }
        
    
        
        public function addVendor($name,$subindustry, $address, $city,$email,$offer,$password, $image,$sdate,$edate) {
            $conn = new dbClass;
            $this->conndb = $conn;
            $sql = "INSERT INTO `vendor` (name,category_id, address, city_id, email, offer, password, image,sdate,edate) VALUES (:name, :subindustry, :address, :city, :email, :offer, :password, :image, :sdate,:edate)";

            $params = [
                ':name' => $name,
                ':subindustry' => $subindustry,
                ':address' => $address,
                ':city' => $city,
                ':email' => $email,
                ':offer' => $offer,
                ':password'=> $password,
                ':image' => $image,
                ':sdate' => $sdate,
                ':edate' => $edate
            ];

            $stmt = $conn->executeStatement($sql, $params);

            return $stmt;
        }
        function checkEmail($Email) {

            $conn=new dbClass();

            // Check if the mobile number already exists
            $query = "SELECT COUNT(*) AS count FROM `vendor` WHERE email = :email";
            $params = [':email' => $Email];
            $result = $conn->getDataWithParams($query, $params);

            if ($result && $result['count'] > 0) {
                return $result['count'];
            }

        }
    
        function setstatus($id,$status){
            $conn = new dbClass();
            $this->conndb = $conn;
            $sql= "UPDATE `vendor` SET `status`='$status' WHERE `id`= '$id'";
            
            $stmt = $conn->execute($sql);

            return $stmt;
            
        }
    
        // Delete a sub-vendor by its ID
        public function delete($id) {
            $conn = new dbClass();
            $query = "DELETE FROM `vendor` WHERE `id` = $id";
            $stmt = $conn->execute($query);
            return $stmt;
        }
    
        // Get the name of a vendor by its ID
        public function getVendorName($id) {
            $conn = new dbClass;
            $this->conndb = $conn;
    
            $stmt = $conn->getData("SELECT `name` FROM `vendor` WHERE `id` = $id");
            return $stmt;
        }
    
        

        function VlastInsertId(){
            $conn = new dbClass;
            $stmt = $conn->getData("SELECT * FROM `vendor` ORDER BY `id` DESC");
            return $stmt;
        }
        public function insertProductImages($productId, $resizedImage) {
            $conn = new dbClass();
            $this->conndb = $conn;
            $sql = "INSERT INTO `vendor_images` (`vendor_id`, `image`) VALUES (:productId, :image)";
        
            $params = [
                ':productId' => $productId,
                ':image' => $resizedImage
            ];
        
            // Execute the query with the parameters
            $stmt = $conn->executeStatement($sql, $params);
        
            return $stmt;
        }
        public function insertVendorEmail($productId, $email) {
            $conn = new dbClass();
            $this->conndb = $conn;
            $sql = "INSERT INTO `venderemail` (`vendor_id`, `email`) VALUES (:productId, :email)";
        
            $params = [
                ':productId' => $productId,
                ':email' => $email
            ];
        
            // Execute the query with the parameters
            $stmt = $conn->executeStatement($sql, $params);
        
            return $stmt;
        }
        // Get Specific Vendor Email
        public function getVendorEmail($id) {
            $conn = new dbClass();
            $stmt = $conn->getAllData("SELECT * FROM `venderemail` WHERE `id` = $id");
            return $stmt;
        }

        // Get All Vendor Emails
        public function getAllVendorEmails($vendorId) {
            $conn = new dbClass();
            $stmt = $conn->getAllData("SELECT * FROM `venderemail` WHERE `vendor_id` = $vendorId");
            return $stmt;
        }

        // Delete Vendor Email
        public function deleteVendorEmail($id) {
            $conn = new dbClass();
            $query = "DELETE FROM `venderemail` WHERE `id` = $id";
            $stmt = $conn->execute($query);
            return $stmt;
        }

        public function insertVendorPhone($productId, $email) {
            $conn = new dbClass();
            $this->conndb = $conn;
            $sql = "INSERT INTO `vendermobile` (`vendor_id`, `mobile`) VALUES (:productId, :email)";
        
            $params = [
                ':productId' => $productId,
                ':email' => $email
            ];
        
            // Execute the query with the parameters
            $stmt = $conn->executeStatement($sql, $params);
        
            return $stmt;
        }
        // Get Specific Vendor Phone
        public function getVendorPhone($id) {
            $conn = new dbClass();
            $stmt = $conn->getAllData("SELECT * FROM `vendermobile` WHERE `id` = $id");
            return $stmt;
        }

        // Get All Vendor Phones
        public function getAllVendorPhones($vendorId) {
            $conn = new dbClass();
            $stmt = $conn->getAllData("SELECT * FROM `vendermobile` WHERE `vendor_id` = $vendorId");
            return $stmt;
        }

        // Delete Vendor Phone
        public function deleteVendorPhone($id) {
            $conn = new dbClass();
            $query = "DELETE FROM `vendermobile` WHERE `id` = $id";
            $stmt = $conn->execute($query);
            return $stmt;
        }

        public function insertVendorOffer($vendorId, $offer) {
            $conn = new dbClass();
            $this->conndb = $conn;
            $sql = "INSERT INTO `venderoffer` (`vendor_id`, `offer`) VALUES (:vendorId, :offer)";
            
            $params = [
                ':vendorId' => $vendorId,
                ':offer' => $offer
            ];
            
            // Execute the query with the parameters
            $stmt = $conn->executeStatement($sql, $params);
            
            return $stmt;
        }
        // Get Specific Vendor Offer
        public function getVendorOffer($id) {
            $conn = new dbClass();
            $stmt = $conn->getAllData("SELECT * FROM `venderoffer` WHERE `id` = $id");
            return $stmt;
        }

        // Get All Vendor Offers
        public function getAllVendorOffers($vendorId) {
            $conn = new dbClass();
            $stmt = $conn->getAllData("SELECT * FROM `venderoffer` WHERE `vendor_id` = $vendorId");
            return $stmt;
        }

        // Delete Vendor Offer
        public function deleteVendorOffer($id) {
            $conn = new dbClass();
            $query = "DELETE FROM `venderoffer` WHERE `id` = $id";
            $stmt = $conn->execute($query);
            return $stmt;
        }

        
        public function insertVendorScondition($vendorId, $scondition) {
            $conn = new dbClass();
            $this->conndb = $conn;
            $sql = "INSERT INTO `venderscondition` (`vendor_id`, `condition`) VALUES (:vendorId, :scondition)";
            
            $params = [
                ':vendorId' => $vendorId,
                ':scondition' => $scondition
            ];
            
            // Execute the query with the parameters
            $stmt = $conn->executeStatement($sql, $params);
            
            return $stmt;
        }
        // Get Specific Vendor Special Condition
        public function getVendorScondition($id) {
            $conn = new dbClass();
            $stmt = $conn->getAllData("SELECT * FROM `venderscondition` WHERE `id` = $id");
            return $stmt;
        }

        // Get All Vendor Special Conditions
        public function getAllVendorSconditions($vendorId) {
            $conn = new dbClass();
            $stmt = $conn->getAllData("SELECT * FROM `venderscondition` WHERE `vendor_id` = $vendorId");
            return $stmt;
        }

        // Delete Vendor Special Condition
        public function deleteVendorScondition($id) {
            $conn = new dbClass();
            $query = "DELETE FROM `venderscondition` WHERE `id` = $id";
            $stmt = $conn->execute($query);
            return $stmt;
        }

        public function insertVendorGcondition($vendorId, $gcondition) {
            $conn = new dbClass();
            $this->conndb = $conn;
            $sql = "INSERT INTO `vendergcondition` (`vendor_id`, `condition`) VALUES (:vendorId, :gcondition)";
            
            $params = [
                ':vendorId' => $vendorId,
                ':gcondition' => $gcondition
            ];
            
            // Execute the query with the parameters
            $stmt = $conn->executeStatement($sql, $params);
            
            return $stmt;
        }
        // Get Specific Vendor General Condition
        public function getVendorGcondition($id) {
            $conn = new dbClass();
            $stmt = $conn->getAllData("SELECT * FROM `vendergcondition` WHERE `id` = $id");
            return $stmt;
        }

        // Get All Vendor General Conditions
        public function getAllVendorGconditions($vendorId) {
            $conn = new dbClass();
            $stmt = $conn->getAllData("SELECT * FROM `vendergcondition` WHERE `vendor_id` = $vendorId");
            return $stmt;
        }

        // Delete Vendor General Condition
        public function deleteVendorGcondition($id) {
            $conn = new dbClass();
            $query = "DELETE FROM `vendergcondition` WHERE `id` = $id";
            $stmt = $conn->execute($query);
            return $stmt;
        }

        
        
        
        
        function getVendorDetails()
        {
            $conn = new dbClass();
            $stmt = $conn->getAllData("SELECT * FROM `vendor`");
            return $stmt;
        }
        function updateVendor($name, $subindustry, $address, $city, $image, $sdate, $edate, $id) {
            $conn = new dbClass();
            $sql = "UPDATE `vendor` SET city_id = :city, category_id = :category_id, name = :name, address = :address, image = :image ,sdate = :sdate, edate = :edate WHERE id = :id";
            $params = [
                ':name' => $name,
                ':category_id' => $subindustry,
                ':address' => $address,
                ':city' => $city,
                ':image' => $image,
                ':sdate' => $sdate,
                ':edate' => $edate,
                ':id' => $id
            ];
            $stmt = $conn->executeStatement($sql, $params);
            return $stmt;
        }
        
        
       
        
        
}
    
?>