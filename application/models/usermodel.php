<?php

/**
 * Description of UserModel
 
 */
class UserModel extends CI_Model {

    private $user_table = 'users';

    function __construct() {
        parent::__construct();
    }

    function insert_user($name, $surname, $username, $education, $experience, $hobbies, $skills, $strength, $weekness, $age, $whatsapp, $password, $email, $phone, $gender, $dob, $address,$image) {
        $data = array(
            'name' => $name, 
            'password' => md5($password), 
            'email' => $email, 
            'phone' => $phone, 
            'whatsapp'=>$whatsapp,
            'username'=>$username,
            'surname'=>$surname,
            'education'=>$education,
            'experience'=>$experience,
            'strength'=>$strength,
            'hobbies' =>$hobbies,
            'skills'=>$skills,
            'age'=> $age,
            'weekness'=>$weekness,
            'gender' => $gender, 
            'dob' => $dob, 
            'address' => $address,
            'image' => $image);
        $result = $this->db->insert($this->user_table, $data);
        if ($result !== NULL) {
            return TRUE;
        }
        return FALSE;
    }

}