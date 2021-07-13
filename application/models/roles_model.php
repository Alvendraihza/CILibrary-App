<?php
    class Roles_Model extends CI_Model{

        public function getAll(){
            $api_url = ('http://localhost:8888/roles/gets');

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $api_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1
            ));

            $response = json_decode(curl_exec($curl));

            curl_close($curl);

            // var_dump($response); die();
            if (is_array($response))            
                return $response;
            else{
                $this->session->set_flashdata('error', "Respond Status: $response->status; Message: $response->message");
                throw new Exception();
            }
        }
    }