<?php 
    require './database.php';

    class backend
    {
        public function register($lastname, $firstname, $midname, $birthdate, $mailadd, $region, $city, $municipality, $zipcode, $streetname, $contact, $fathername, $mothername, $gender, $age)
        {
            return self::registerApplicant($lastname, $firstname, $midname, $birthdate, $mailadd, $region, $city, $municipality, $zipcode, $streetname, $contact, $fathername, $mothername, $gender, $age);
        }

        public function registeradmin($username, $password, $email)
        {
            return self::registrationAdmin($username, $password, $email);
        }

        public function login($user, $pass)
        {
            return self::loginAdmin($user, $pass);
        }

        public function loginUser($firstName, $lastName)
        {
            return self::loginUserFunction($firstName, $lastName);
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

        private function loginAdmin($user, $pass)
        {
            try {
                if ($this->checkLogin($user, $pass)) {
                    $db = new database();
                    if ($db->getStatus()) {
                        $tmp = md5($pass);
                        $stmt = $db->getConn()->prepare($this->loginAdminQuery());
                        $stmt->execute(array($user, $tmp));
                        $res = $stmt->fetch();
                        if ($res) {
                            $_SESSION["username"] = $user;
                            $_SESSION["password"] = $tmp;
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

        private function loginUserFunction($firstName, $lastName)
        {
            try {
                if ($this->checkLogin($firstName, $lastName)) {
                    $db = new database();
                    if ($db->getStatus()) {
                        $tmp = md5($lastName);
                        $stmt = $db->getConn()->prepare("SELECT * FROM registers WHERE firstname = '$firstName' AND lastname = '$lastName'; " );
                        $stmt->execute(array($firstName, $tmp));
                        $res = $stmt->fetchAll();
                        if ($res) {
                            $_SESSION["username"] = $firstName;
                            $_SESSION["password"] = $tmp;
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

        private function registrationAdmin($username, $password, $email)
        {
            try {
                if ($this->checkAdminRegister($username, $password, $email)) {
                    $db = new database();
                    if ($db->getStatus()) {
                        $stmt = $db->getConn()->prepare($this->registerAdminQuery());
                        $stmt->execute(array($username, md5($password), $email, $this->getDateNow()));
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

        private function registerApplicant($lastname, $firstname, $midname, $birthdate, $mailadd, $region, $city, $municipality, $zipcode, $streetname, $contact, $fathername, $mothername, $gender, $age)
        {
            try {
                if ($this->checkApplicants($lastname, $firstname, $midname, $birthdate, $mailadd, $region, $city, $municipality, $zipcode, $streetname, $contact, $fathername, $mothername, $gender, $age)) {
                    $db = new database();
                    if ($db->getStatus()) {
                        $stmt = $db->getConn()->prepare($this->registerApplicantsQuery());
                        $stmt->execute(array($lastname, $firstname, $midname, $birthdate, $mailadd, $region, $city, $municipality, $zipcode, $streetname, $contact, $fathername, $mothername, $gender, $age, $this->getDateNow()));
                        $res = $stmt->fetch();
                        if (!$res) {
                            $db->closeConn();
                            return '200';
                        } else {
                            $db->closeConn();
                            return '404';
                        }
                    } else {
                        return '403';
                    }
                } else {
                    return '403';
                }
            } catch (PDOException $e) {
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

        private function checkApplicants($lastname, $firstname, $midname, $birthdate, $mailadd, $region, $city, $municipality, $zipcode, $streetname, $contact, $fathername, $mothername, $gender, $age)
        {
            return ($lastname != '' && $firstname != '' && $midname != '' && $birthdate != '' && $mailadd != '' && $region != '' && $city != '' && $municipality != '' && $zipcode != '' && $streetname != '' && $contact != '' && $fathername != '' && $mothername != '' && $gender != '' && $age != '') ? true : false;
        }

        private function checkAdminRegister($username, $password, $email)
        {
            return ($username != '' && $password != '' && $email != '') ? true : false;
        }

        private function checkLogin($user, $pass)
        {
            return ($user != '' && $pass != '') ? true : false;
        }

        private function getDateNow()
        {
            return date('Y-m-d');
        }

        private function registerApplicantsQuery()
        {
            return "INSERT INTO `registers` (`lastname`,`firstname`,`midname`,`birthdate`,`mailadd`,`region`,`city`,`municipality`,`zipcode`,`streetname`,`contact`,`fathername`,`mothername`,`gender`,`age`,`date_registered`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
        }

        private function registerAdminQuery()
        {
            return "INSERT INTO `useradmin` (`username`, `password`, `email`, `date_created`) VALUES (?,?,?,?);";
        }

        private function loginAdminQuery()
        {
            return "SELECT * FROM `useradmin` WHERE `username` = ? AND `password` = ?;";
        }

        private function loginUserQuery()
        {
            return "SELECT * FROM `registers` WHERE `firstname` = ? AND `lastname` = ?;";
        }

        private function applicantsQuery()
        {
            return "SELECT * FROM `registers`;";
        }

        private function applicantQuery()
        {
            return "SELECT * FROM `registers` WHERE `contact` = ? AND `mailadd` = ?;";
        }

        private function changeAdminPassQuery()
        {
            return "UPDATE `useradmin` SET `password` = ? WHERE `id` = ?";
        }

        private function deleteApplicantQuery()
        {
            return "DELETE FROM `registers` WHERE `id` = ?";
        }
    }


?>