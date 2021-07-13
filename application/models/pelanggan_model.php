<?php

    class Pelanggan_Model extends CI_Model {
        public function getAll() {
            //Mengakses Web Service menggunakan HTTP Request
            $api_url = "http://localhost:8081/allpelanggan";
            $svcGet = curl_init();

            curl_setopt_array($svcGet, array(
                CURLOPT_URL => $api_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET'
            ));

            $response = json_decode(curl_exec($svcGet));
            
            curl_close($svcGet);

            if (!is_null($response))            
                return $response;
            else
                show_404();
        }

        public function getPelangganById($id) {
            //Mengakses Web Service menggunakan HTTP Request
            $api_url = "http://localhost:8081/pelanggan/$id";
            $svcGet = curl_init();

            curl_setopt_array($svcGet, array(
                CURLOPT_URL => $api_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET'
            ));

            $response = json_decode(curl_exec($svcGet));

            curl_close($svcGet);

            if (!is_null($response))            
                return $response;
            else
                show_404();
        }

        public function addPelanggan() {
            $api_url = "http://localhost:8081/create";

            $data = array(
                'kodepel' => $this->input->post('kodepel', true),
                'nama' => $this->input->post('nama', true),
                'alamat' => $this->input->post('alamat', true),
                'telp' => $this->input->post('telp', true),
                'jk' => $this->input->post('jk', true),
                'email' => $this->input->post('email', true)
            );

            $svcGet = curl_init();

            curl_setopt_array($svcGet, array(
                CURLOPT_URL => $api_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($data),
                CURLOPT_HTTPHEADER => array('Content-Type: application/json')
            ));

            $response = json_decode(curl_exec($svcGet));

            curl_close($svcGet);

            if (!is_null($response))            
                return $response;
            else
                show_404();            
        }

        public function deletePelanggan($id) {
            //Mengakses Web Service menggunakan HTTP Request
            $api_url = "http://localhost:8081/delete/$id";

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

            if (!is_null($response))            
                return $response;
            else
                show_404();
        }

        public function editPelanggan($id) {
            //Mengakses Web Service menggunakan HTTP Request
            $api_url = "http://localhost:8081/edit/$id";

            $data = array(
                'id' => $this->input->post('id', true),
                'kodepel' => $this->input->post('kodepel', true),
                'nama' => $this->input->post('nama', true),
                'alamat' => $this->input->post('alamat', true),
                'telp' => $this->input->post('telp', true),
                'jk' => $this->input->post('jk', true),
                'email' => $this->input->post('email', true)
            );

            $svcGet = curl_init();

            curl_setopt_array($svcGet, array(
                CURLOPT_URL => $api_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'PUT',
                CURLOPT_POSTFIELDS => json_encode($data),
                CURLOPT_HTTPHEADER => array('Content-Type: application/json')
            ));

            $response = json_decode(curl_exec($svcGet));

            curl_close($svcGet);

            // var_dump($response);
            if (!is_null($response))            
                return $response;
            else
                show_404();

        }
    }
?>