<?php
    class Userroles_model extends CI_Model{

        public function getAll(){
            $api_url = ('http://localhost:8888/users/getRole/');

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $api_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1
            ));

            $response = json_decode(curl_exec($curl));

            curl_close($curl);

            if (is_array($response))            
                return $response;
            else{
                $this->session->set_flashdata('error', "Respond Status: $response->status; Message: $response->message");
                throw new Exception();
            }
        }

        public function getUser($userName = NULL) {
            if (is_null($userName)) {
                $this->session->set_flashdata('error', "Message: Please select a User!");
                throw new Exception();
            }

            $api_url = ("http://localhost:8888/users/get_by_username/$userName");

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $api_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1
            ));

            $response = json_decode(curl_exec($curl));

            curl_close($curl);

            if (isset($response->status)) {
                $this->session->set_flashdata('error', "Respond Status: $response->status; Message: $response->message");

                if ($response->status <> 200){
                    throw new Exception();
                }
            }           
            else{
                return $response;
            }
        }

        public function getusersByUserId($userId = NULL) {
            if (is_null($userId)) {
                $this->session->set_flashdata('error', "Message: Please select a User!");
                throw new Exception();
            }

            $api_url = ("http://localhost:8888/users/getrole_by_userid/$userId");

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $api_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1
            ));

            $response = json_decode(curl_exec($curl));

            curl_close($curl);
            // var_dump($response); //die();

            if (isset($response->status)) {
                $this->session->set_flashdata('error', "Respond Status: $response->status; Message: $response->message");

                if ($response->status <> 200){
                    throw new Exception();
                }
            }           
            else{
                return $response;
            }
        }

        public function create() {
            $api_url = "http://localhost:8888/users/create_role";

            $data = array(
                'userid' => $this->input->post('userId', true),
                'roleid' => $this->input->post('userRole', true),
                'aktif' => $this->input->post('aktif', true),
            );

            $svcPost = curl_init();

            curl_setopt_array($svcPost, array(
                CURLOPT_URL => $api_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($data),
                CURLOPT_HTTPHEADER => array('Content-Type: application/json')
            ));

            $response = json_decode(curl_exec($svcPost));

            curl_close($svcPost);
            // var_dump($response); die();

            if ($response->status == 200) {
                $this->session->set_flashdata('success', "Respond Status: $response->status; Message: $response->message");
                return true;
            }
            else {
                $this->session->set_flashdata('error', "Respond Status: $response->status; Message: $response->message");
                return false;               
            }
        }

        public function delete($userRoleId) {
            $api_url = "http://localhost:8888/users/delete_role/$userRoleId";
            
            $svcGet = curl_init();

            curl_setopt_array($svcGet, array(
                CURLOPT_URL => $api_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'DELETE'
            ));

            $response = json_decode(curl_exec($svcGet));
            
            curl_close($svcGet);

            // var_dump($response); die();
            if ($response->status == 200) {
                $this->session->set_flashdata('success', "Respond Status: $response->status; Message: $response->message");
                
                return true;
            }
            else {
                $this->session->set_flashdata('error', "Respond Status: $response->status; Message: $response->message");
                
                throw new Exception();               
            }
        }

        public function updateUserRole() {
            $id = $this->input->post('id');
            $api_url = "http://localhost:8888/users/edit_role/$id";

            $data = array(
                'id' => (int)$this->input->post('id'),
                'userid' => $this->input->post('userid', true),
                'roleid' => $this->input->post('userRole', true),
                'aktif' => $this->input->post('aktif', true),
            );

            // var_dump($data); die($api_url);
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $api_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'PUT',
                CURLOPT_POSTFIELDS => json_encode($data),
                CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
            ));

            $response= json_decode(curl_exec($curl));

            curl_close($curl);
            
            if ($response->status == 200) {
                $this->session->set_flashdata('success', "Respond Status: $response->status; Message: $response->message");
                return true;
            }
            else {
                $this->session->set_flashdata('error', "Respond Status: $response->status; Message: $response->message");
                throw new Exception();           
            }
        }
    }