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
        public function confirmRes($room_id, $firstname, $middlename, $lastname, $address, $contact_no, $payment_process)
        {
            return self::confirmReservation($room_id, $firstname, $middlename, $lastname, $address, $contact_no, $payment_process);
        }
        // //eeeeeeeeee
        // public function loginUser($firstName, $lastName)
        // {
        //     return self::loginUserFunction($firstName, $lastName);
        // }
        //tiwasonon
        public function createRoom($roomName, $roomDetails, $roomPrice, $roomImg)
        {
            return self::createRoomFunction($roomName, $roomDetails, $roomPrice, $roomImg);
        }

       

        public function viewApplicants()
        {
            return self::displayApplicants();
        }

        public function changepassword($newpass)
        {
            return self::newPassword($newpass);
        }

        public function deleteApplicant($id)
        {
            return self::removeApplicant($id);
        }

        public function displayCard($number, $email)
        {
            return self::displayIdCard($number, $email);
        }

        public function displayRooms()
        {
            return self::getAllRooms();
        }

        public function viewDetails($roomId)
        {   
            return self::viewRoomDetails($roomId);
        }

        private function displayIdCard($number, $email)
        {
            try {
                if ($number != '' && $email != '') {
                    $db = new database();
                    if ($db->getStatus()) {
                        $stmt = $db->getConn()->prepare($this->applicantQuery());
                        $stmt->execute(array($number, $email));
                        $res = $stmt->fetchAll();
                        $db->closeConn();
                        return json_encode($res);
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

        private function removeApplicant($id)
        {
            try {
                if ($id != '') {
                    $db = new database();
                    if ($db->getStatus()) {
                        $stmt = $db->getConn()->prepare($this->deleteApplicantQuery());
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

        private function newPassword($newpass)
        {
            try {
                if ($newpass != '') {
                    $db = new database();
                    if ($db->getStatus()) {
                        $stmt = $db->getConn()->prepare($this->changeAdminPassQuery());
                        $stmt->execute(array(md5($newpass), $this->getAdminID()));
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

        private function displayApplicants()
        {
            try {
                if ($this->checkLogin($_SESSION["username"], $_SESSION["password"])) {
                    $db = new database();
                    if ($db->getStatus()) {
                        $stmt = $db->getConn()->prepare($this->applicantsQuery());
                        $stmt->execute();
                        $var = $stmt->fetchAll();
                        $db->closeConn();
                        return json_encode($var);
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

        private function loginRequest($email, $password)
        {
            try {
                if ($this->checkLogin($email, $password)) {
                    $db = new database();
                    if ($db->getStatus()) {
                        $tmp = md5($password);
                        $stmt = $db->getConn()->prepare($this->loginApplicantQuery());
                        $stmt->execute(array($email, $password));
                        $res = $stmt->fetch();
                        if ($res) {
                            $_SESSION["userType"] = $res['userType'];
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
        //eeeeeeeeee
        // private function loginUserFunction($firstName, $lastName)
        // {
        //     try {
        //         if ($this->checkLogin($firstName, $lastName)) {
        //             $db = new database();
        //             if ($db->getStatus()) {
        //                 $tmp = md5($lastName);
        //                 $stmt = $db->getConn()->prepare("SELECT * FROM registers WHERE firstname = '$firstName' AND lastname = '$lastName'; " );
        //                 $stmt->execute(array($firstName, $tmp));
        //                 $res = $stmt->fetchAll();
        //                 if ($res) {
        //                     $_SESSION["userType"] = "user"; 
        //                     $_SESSION["username"] = $firstName;
        //                     $_SESSION["password"] = $tmp;
        //                     $db->closeConn();
        //                     return "200";
        //                 } else {
        //                     $db->closeConn();
        //                     return "404";
        //                 }
        //             } else {
        //                 return "403";
        //             }
        //         } else {
        //             return "403";
        //         }
        //     } catch (PDOException $e) {
        //         return $e;
        //     }
        // }

        public function confirmReservation($room_id, $firstname, $middlename, $lastname, $address, $contact_no, $payment_process)
        {
            try {
                if($this->checkPaymentInfo($room_id, $firstname, $middlename, $lastname, $address, $contact_no, $payment_process)) {
                    $db = new database();
                    if($db->getStatus()) {
                        $stmt = $db->getConn()->prepare($this->confirmReservationQuery());
                        $fullname = $firstname." ".$middlename." ".$lastname;
                        $stmt->execute(array($room_id, $fullname, $address, $contact_no, $payment_process));
                        $res = $stmt->fetch();
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

        private function registerApplicant($firstname, $lastname, $email, $password, $userType)
        {
            try {
                if ($this->checkRegister($firstname, $lastname, $email, $password, $userType)) {
                    $db = new database();
                    if ($db->getStatus()) {
                        $stmt = $db->getConn()->prepare($this->registerApplicantsQuery());
                        $stmt->execute(array($firstname, $lastname, $email, $password, $userType));
                        $res = $stmt->fetch();
                        $stmt2 = $db->getConn()->prepare($this->loginApplicantQuery());
                        $stmt2->execute(array($email, $password));
                        $res2 = $stmt2->fetch();

                        if (!$res) {
                            $_SESSION["userType"] = $res2['userType'];
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

        // private function registerUser($firstname, $lastname, $email, $password, $userType)
        // {
        //     try {
        //         if ($this->checkRegister($firstname, $lastname, $email, $password, $userType)) {
        //             $db = new database();
        //             if ($db->getStatus()) {
        //                 $stmt = $db->getConn()->prepare($this->registerApplicantsQuery());
        //                 $stmt->execute(array($firstname, $lastname, $email, $password, $userType));
        //                 $res = $stmt->fetch();
        //                 if (!$res) {
        //                     $db->closeConn();
        //                     return '200';
        //                 } else {
        //                     $db->closeConn();
        //                     return '404';
        //                 }
        //             } else {
        //                 return '403';
        //             }
        //         } else {
        //             return '403';
        //         }
        //     } catch (PDOException $e) {
        //         return $e;
        //     }
        // }
        
        private function createRoomFunction($roomName, $roomDetails, $roomPrice, $roomImg) 
        {
            try {
                if($this->checkRoom($roomName, $roomDetails, $roomPrice, $roomImg)) {
                    $db = new database();
                    if($db->getStatus()) {
                        $stmt = $db->getConn()->prepare($this->createRoomQuery());
                        $stmt->execute(array($roomName, $roomDetails, $roomPrice, $roomImg));
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

        private function getAdminID()
        {
            try {
                if ($this->checkLogin($_SESSION["username"], $_SESSION["password"])) {
                    $db = new database();
                    if ($db->getStatus()) {
                        $stmt = $db->getConn()->prepare($this->loginAdminQuery());
                        $stmt->execute(array($_SESSION["username"], $_SESSION["password"]));
                        $adminID = null;

                        while ($var = $stmt->fetch()) {
                            $adminID = $var['id'];
                        }
                        $db->closeConn();
                        return $adminID;
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

        private function checkRegister($firstname, $lastname, $email, $password, $userType)
        {
            return ($firstname != '' && $lastname != '' && $email != '' && $password != '' && $userType != '') ? true : false;
        }

        private function checkRoom($roomName, $roomDetails, $roomPrice, $roomImg)
        {
            return ($roomName != '' && $roomDetails != '' && $roomPrice != '' && $roomImg);
        }

        // private function checkAdminRegister($username, $password, $email)
        // {
        //     return ($firstname != '' && $lastname != '' && $email != '' && $password != '' && $userType != '') ? true : false;
        // }

        private function checkLogin($email, $password)
        {
            return ($email != '' && $password != '') ? true : false;
        }

        private function checkPaymentInfo($room_id, $firstname, $middlename, $lastname, $address, $contact_no, $payment_process)
        {
            return ($room_id != '' && $firstname != '' && $middlename != '' && $lastname != '' && $address != '' && $contact_no != '' && $payment_process != '') ? true : false;
        }

        private function getDateNow()
        {
            return date('Y-m-d');
        }

        private function registerApplicantsQuery()
        {
            return "INSERT INTO `tbl_account` (`firstname`,`lastname`, `email`, `password`, `userType`) VALUES (?,?,?,?,?);";
        }

        // private function registerAdminQuery()
        // {
        //     return "INSERT INTO `tbl_account` (`firstname`,`lastname`, `email`, `password`, `userType`) VALUES (?,?,?,?,?);";
        // }

        private function createRoomQuery()
        {
            return "INSERT INTO `rooms` (`room_name`, `room_details`, `room_price`, `room_img`) VALUES (?,?,?,?);";
        }

        private function confirmReservationQuery() 
        {
            return "INSERT INTO `tbl_reservation` (`room_id`, `name`, `address`, `contact_no`, `payment_process`) VALUES(?,?,?,?,?);";
        }

        private function loginApplicantQuery()
        {
            return "SELECT * FROM `tbl_account` WHERE `email` = ? AND `password` = ?;";
        }

        private function loginUserQuery()
        {
            return "SELECT * FROM `tbl_account` WHERE `email` = ? AND `password` = ?;";
        }

        private function applicantsQuery()
        {
            return "SELECT * FROM `tbl_account`;";
        }

        

        private function getAllRoomQuery()
        {
            return "SELECT * FROM `rooms`";
        }

        // private function applicantQuery()
        // {
        //     return "SELECT * FROM `tbl_account` WHERE `contact` = ? AND `mailadd` = ?;";
        // }

        private function roomDetailsQuery()
        {
            return "SELECT * FROM `rooms` WHERE `room_id` = ?";
        }

        private function deleteApplicantQuery()
        {
            return "DELETE FROM `registers` WHERE `id` = ?";
        }
    }


?>