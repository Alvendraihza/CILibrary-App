<?php
class Login_Model extends CI_Model{

    public function request_login() {
        //Menyiapkan Record baru ke dalam sebuah array
        $userEmail = $this->input->post('userEmail', true);
        $userPass = md5($this->input->post('userPass', true));      //Password enkripsi dg MD5 Hash
        
        // $api_url = "http://localhost:8888/users/get_by_email/$userEmail";
        $api_url = "http://localhost:8888/users/getrole_by_email/$userEmail";

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        ));

        $response = json_decode(curl_exec($curl));

        curl_close($curl);

        //Check if User exists
        if (isset($response->status)) {
            // $this->session->set_flashdata('error', "<strong>User with $userEmail is not Found!</strong>");
            $this->session->set_flashdata(
                'error',
                "<strong>Respond Status:</strong> $response->status<br />
                <strong>Message:</strong> $response->message"
            );

            return false;
        }

        //Check if Password is correct
        var_dump($response); //die();
        if (strtoupper($userPass) == strtoupper($response->password)) {
            //Put user data into Session
            $this->session->set_userdata('id', $response->id);
            $this->session->set_userdata('name', $response->name);
            $this->session->set_userdata('zipcode', $response->zipcode);
            $this->session->set_userdata('email', $response->email);
            $this->session->set_userdata('username', $response->username);
            $this->session->set_userdata('username', $response->username);
            $this->session->set_userdata('password', $response->password);
            $this->session->set_userdata('roleid', $response->roleid);
            $this->session->set_userdata('role', $response->role);
            $this->session->set_userdata('aktif', $response->aktif);
        
            if (!$response->aktif) {
                $this->session->set_flashdata('error', "<strong>User is not active</strong>");
                
                return false;   
            }

            return true;
        }
        else {
            $this->session->set_flashdata('error', "<strong>Wrong Password</strong>");
        }

        return false;
    }
}