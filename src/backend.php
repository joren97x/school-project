<?php 
    require '../src/database.php';

    class backend
    {
        public function register($firstname, $lastname, $email, $password, $userType)
        {
            return self::registerApplicant($firstname, $lastname, $email, $password, $userType);
        }

        public function login($email, $password)
        {
            return self::loginRequest($email, $password);
        }

        public function adminLogin($email, $password)
        {
            return self::adminLoginRequest($email, $password);
        }

        public function confirmRes($room_id, $firstname, $middlename, $lastname, $address, $contact_no, $payment_process, $room_price, $status, $date, $user_id)
        {
            return self::confirmReservation($room_id, $firstname, $middlename, $lastname, $address, $contact_no, $payment_process, $room_price, $status, $date, $user_id);
        }

        public function approveRes($res_id)
        {
            return self::approveReservation($res_id);
        }

        public function cancelRes($res_id)
        {
            return self::cancelReservation($res_id);
        }

        public function deleteRes($res_id)
        {
            return self::deleteReservation($res_id);
        }

        public function deleteGuestHouse($room_id)
        {
            return self::deleteGuestHouseFunction($room_id);
        }

        public function updateGuestHouse($room_id, $room_name, $room_details, $room_price, $room_location, $room_link, $room_no)
        {
            return self::updateGuestHouseFunction($room_id, $room_name, $room_details, $room_price, $room_location, $room_link, $room_no);
        }
       
        public function createRoom($roomName, $roomDetails, $roomPrice, $roomLocation, $roomLink, $roomImg, $roomNo)
        {
            return self::createRoomFunction($roomName, $roomDetails, $roomPrice, $roomLocation, $roomLink, $roomImg, $roomNo);
        }

        public function displayRooms()
        {
            return self::getAllRooms();
        }

        public function viewReservationAdmin()
        {
            return self::getAllReservations();
        }

        public function viewReservationUser($user_id)
        {
            return self::getReservations($user_id);
        }

        public function viewDetails($roomId)
        {   
            return self::viewRoomDetails($roomId);
        }

        private function viewRoomDetails($roomId)
        {
            try {
                if($roomId != '') {
                    $db = new database();
                    if($db->getStatus()) {
                        $stmt = $db->getConn()->prepare($this->roomDetailsQuery());
                        $stmt->execute(array($roomId));
                        $res = $stmt->fetch();
                        return json_encode($res);
                        $db->closeConn();
                    }
                    else {
                        return '403';
                    }
                }
                else {
                    return '403';
                }
            }
            catch(PDOException $e) {
                return $e;
            }
        }


        private function getAllRooms()
        {
            try {
                $db = new database();
                if($db->getStatus()) {
                    $stmt = $db->getConn()->prepare($this->getAllRoomQuery());
                    $stmt->execute();
                    $var = $stmt->fetchAll();
                    $db->closeConn();
                    return json_encode($var);
                }
                else {
                    return "403";
                }
            }
            catch(PDOException $e) {
                return $e;
            }
        }

        private function getAllReservations()
        {
            try{
                $db = new database();
                if($db->getStatus()) {
                    $stmt = $db->getConn()->prepare($this->getAllReservationsQuery());
                    $stmt->execute();
                    $var = $stmt->fetchAll();
                    $db->closeConn();
                    return json_encode($var);
                }
                else {
                    return "403";
                }
            }
            catch(PDOException $e) {
                return $e;
            }
        }

        private function getReservations($user_id)
        {
            try{
                $db = new database();
                if($db->getStatus()) {
                    $stmt = $db->getConn()->prepare($this->getReservationsQuery());
                    $stmt->execute(array($user_id));
                    $res = $stmt->fetchAll();
                    return json_encode($res);
                    $db->closeConn();
                }
                else {
                    return "403";
                }
            }
            catch(PDOException $e) {
                return $e;
            }
        }

        private function deleteReservation($id)
        {
            try {
                if ($id != '') {
                    $db = new database();
                    if ($db->getStatus()) {
                        $stmt = $db->getConn()->prepare($this->deleteReservationQuery());
                        $stmt->execute(array($id));
                        $res = $stmt->fetch();
                        if (!$res) {
                            $db->closeConn();
                            return "200";
                        } else {
                            $db->closeConn();
                            return "404";
                        }
                    } else {
                        return "403";
                    }
                } else {
                    return "403";
                }
            } catch (PDOException $e) {
                return $e;
            }
        }

        private function deleteGuestHouseFunction($room_id)
        {
            try {
                if ($room_id != '') {
                    $db = new database();
                    if ($db->getStatus()) {
                        $stmt = $db->getConn()->prepare($this->deleteGuestHouseQuery());
                        $stmt->execute(array($room_id));
                        $res = $stmt->fetch();
                        if (!$res) {
                            $db->closeConn();
                            return "200";
                        } 
                        else {
                            $db->closeConn();
                            return "404";
                        }
                    } 
                    else {
                        return "403";
                    }
                }
            } catch (PDOException $e) {
                return $e;
            }
        }

        private function updateGuestHouseFunction($room_id, $room_name, $room_details, $room_price, $room_location, $room_link, $room_no)
        {
            try {
                if ($room_id != '') {
                    $db = new database();
                    if ($db->getStatus()) {
                        $stmt = $db->getConn()->prepare($this->updateGuestHouseQuery());
                        $stmt->execute(array($room_name, $room_details, $room_price, $room_location, $room_link, $room_no, $room_id));
                        $res = $stmt->fetch();
                        if (!$res) {
                            $db->closeConn();
                            return "200";
                        } 
                        else {
                            $db->closeConn();
                            return "404";
                        }
                    } 
                    else {
                        return "403";
                    }
                }
            } catch (PDOException $e) {
                return $e;
            }
        }

        private function loginRequest($email, $password)
        {
            try {
                if ($this->checkLogin($email, $password)) {
                    $db = new database();
                    if ($db->getStatus()) {
                        $tmp = md5($password);
                        $stmt = $db->getConn()->prepare($this->loginApplicantQuery());
                        $stmt->execute(array($email, $tmp));
                        $res = $stmt->fetch();
                        if ($res) {
                            $_SESSION["userType"] = $res['userType'];
                            $_SESSION["userId"] = $res['account_id'];
                            $_SESSION["firstname"] = $res['firstname'];
                            $db->closeConn();
                            return "200";
                        } else {
                            $db->closeConn();
                            return "404";
                        }
                    } else {
                        return "403";
                    }
                } else {
                    return "403";
                }
            } catch (PDOException $e) {
                return $e;
            }
        }
        private function adminLoginRequest($email, $password)
        {
            try {
                if ($this->checkLogin($email, $password)) {
                    $db = new database();
                    if ($db->getStatus()) {
                        $tmp = md5($password);
                        $stmt = $db->getConn()->prepare($this->loginAdminQuery());
                        $stmt->execute(array($email, md5($password)));
                        $res = $stmt->fetch();
                        if ($res) {
                            $_SESSION["userType"] = $res['userType'];
                            $_SESSION["userId"] = $res['account_id'];
                            $_SESSION["firstname"] = $res['firstname'];
                            $db->closeConn();
                            return "200";
                        } else {
                            $db->closeConn();
                            return "404";
                        }
                    } else {
                        return "403";
                    }
                } else {
                    return "403";
                }
            } catch (PDOException $e) {
                return $e;
            }
        }

        public function confirmReservation($room_id, $firstname, $middlename, $lastname, $address, $contact_no, $payment_process, $room_price, $status, $date, $user_id)
        {
            try {
                if($this->checkPaymentInfo($room_id, $firstname, $middlename, $lastname, $address, $contact_no, $payment_process, $user_id)) {
                    $db = new database();
                    if($db->getStatus()) {
                        $stmt = $db->getConn()->prepare($this->confirmReservationQuery());
                        $stmt2 = $db->getConn()->prepare($this->addCash());
                        $fullname = $firstname." ".$middlename." ".$lastname;
                        $tomorrowDateTime = date('Y-m-d H:i:s', strtotime('+1 day'));
                        $stmt->execute(array($room_id, $user_id, $fullname, $address, $contact_no, $payment_process, $status, $date, $tomorrowDateTime));
                        $stmt2->execute(array($room_price));
                        $res = $stmt->fetch();
                        $res2 = $stmt2->fetch();
                        if(!$res) {
                            $db->closeConn();
                            return "200";
                        }
                        else {
                            $db->closeConn();
                            return "404";
                        }
                    }
                    else {
                        return '403';
                    }
                }
                else {
                    return '403';
                }
            }
            catch (PDOException $e) {
                return $e;
            }
        }

        private function approveReservation($res_id)
        {
            try {
                $db = new database();
                if($db->getStatus()) {
                    $stmt = $db->getConn()->prepare($this->approveResQuery());
                    $stmt->execute(array($res_id));
                    $res = $stmt->fetch();
                    if(!$res) {
                        $db->closeConn();
                        return '200 OK';
                    }
                    else {
                        return '404 BRUH';
                    }
                }
                else {
                    return '403 bruh';
                }
            }catch (PDOException $e) {
                return $e;
            }
        }

        private function cancelReservation($res_id)
        {
            try {
                $db = new database();
                if($db->getStatus()) {
                    $stmt = $db->getConn()->prepare($this->cancelResQuery());
                    $stmt->execute(array($res_id));
                    $res = $stmt->fetch();
                    if(!$res) {
                        $db->closeConn();
                        return '200 OK';
                    }
                    else {
                        return '404 BRUH';
                    }
                }
                else {
                    return '403 bruh';
                }
            }catch (PDOException $e) {
                return $e;
            }
        }

        private function registerApplicant($firstname, $lastname, $email, $password, $userType)
        {
            try {
                if ($this->checkRegister($firstname, $lastname, $email, $password, $userType)) {
                    $db = new database();
                    if ($db->getStatus()) {
                        $stmt = $db->getConn()->prepare($this->registerApplicantsQuery());
                        $stmt->execute(array($firstname, $lastname, $email, md5($password), $userType));
                        $res = $stmt->fetch();
                        $stmt2 = $db->getConn()->prepare($this->loginApplicantQuery());
                        $stmt2->execute(array($email, md5($password)));
                        $res2 = $stmt2->fetch();

                        if (!$res) {
                            $_SESSION["userType"] = $res2['userType'];
                            $_SESSION["userId"] = $res2['account_id'];
                            $_SESSION["firstname"] = $res2['firstname'];
                            $db->closeConn();
                            return "200";
                        } else {
                            $db->closeConn();
                            return "404";
                        }
                    } else {
                        return "403";
                    }
                } else {
                    return "403";
                }
            } catch (PDOException $e) {
                return $e;
            }
        }

        private function createRoomFunction($roomName, $roomDetails, $roomPrice, $roomLocation, $roomLink, $roomImg, $roomNo) 
        {
            try {
                if($this->checkRoom($roomName, $roomDetails, $roomPrice, $roomLocation, $roomLink, $roomImg, $roomNo)) {
                    $db = new database();
                    if($db->getStatus()) {
                        $stmt = $db->getConn()->prepare($this->createRoomQuery());
                        $stmt->execute(array($roomName, $roomDetails, $roomPrice, $roomLocation, $roomLink, $roomImg, $roomNo));
                        $res = $stmt->fetch();
                        if(!$res) {
                            $db->closeConn();
                            return '200';
                        }
                        else {
                            $db->closeConn();
                            return '404';
                        }
                    }
                    else {
                        return '403';
                    }
            }
            else {
                return '403';
            }
            }catch(PDOException $e) {
                return $e;
            }


        }

        private function checkRegister($firstname, $lastname, $email, $password, $userType)
        {
            return ($firstname != '' && $lastname != '' && $email != '' && $password != '' && $userType != '') ? true : false;
        }

        private function checkRoom($roomName, $roomDetails, $roomPrice,$roomLocation, $roomLink, $roomImg)
        {
            return ($roomName != '' && $roomDetails != '' && $roomPrice != '' && $roomLocation != '' && $roomLink != '' && $roomImg != '');
        }

        private function checkLogin($email, $password)
        {
            return ($email != '' && $password != '') ? true : false;
        }

        private function checkPaymentInfo($room_id, $firstname, $middlename, $lastname, $address, $contact_no, $payment_process, $user_id)
        {
            return ($room_id != '' && $firstname != '' && $middlename != '' && $lastname != '' && $address != '' && $contact_no != '' && $user_id != '' && $payment_process != '') ? true : false;
        }

        private function registerApplicantsQuery()
        {
            return "CALL `createAccount`(?,?,?,?,?)";
        }

        private function createRoomQuery()
        {
            return "INSERT INTO `rooms` (`room_name`, `room_details`, `room_price`, `room_location`, `room_link`, `room_img`, `room_no`) VALUES (?,?,?,?,?,?,?);";
        }

        private function confirmReservationQuery() 
        {
            return "INSERT INTO `tbl_reservation` (`room_id`, `user_id`, `name`, `address`, `contact_no`, `payment_process`, `status`, `res_date`, `expire_time`) VALUES(?,?,?,?,?,?,?,?,?);";
        }

        private function deleteReservationQuery()
        {
            return "CALL `deleteReservation`(?)";
        }

        private function addCash()
        {
            return "UPDATE `tbl_admin` SET `cash` = `cash` + ? WHERE `account_id` = 1;";
        } 

        private function deleteGuestHouseQuery()
        {
            return "DELETE FROM `rooms` WHERE `room_id` = ?";
        }

        private function updateGuestHouseQuery()
        {
            return "UPDATE `rooms` SET `room_name` = ?, `room_details` = ?, `room_price` = ?, `room_location` = ?, `room_link` = ?, `room_no` = ? WHERE `room_id` = ?;";
        }

        private function loginApplicantQuery()
        {
            return "CALL `loginRequest`(?,?)";
        }

        private function loginAdminQuery()
        {
            return "SELECT * FROM `tbl_admin` WHERE `email` = ? AND `password` = ?";
        }

        private function getAllRoomQuery()
        {
            return "CALL `getAllRoom`()";
        }

        private function getAllReservationsQuery()
        {
            return "SELECT * FROM `tbl_reservation` ORDER BY `res_id` ASC";
        }

        private function getReservationsQuery()
        {
            return "SELECT * FROM `tbl_reservation` WHERE `user_id` = ?";
        }

        private function approveResQuery()
        {
            return "UPDATE `tbl_reservation` SET `status` = 'approved' WHERE `res_id` = ?;";
        }

        private function cancelResQuery()
        {
            return "UPDATE `tbl_reservation` SET `status` = 'cancelled' WHERE `res_id` = ?;";
        }

        private function roomDetailsQuery()
        {
            return "CALL `getRoomDetail`(?)";
        }
    }


?>