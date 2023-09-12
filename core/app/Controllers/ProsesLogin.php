<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_login;

class ProsesLogin extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session     = session();
        $username    = $this->request->getPost('username');
        $password    = $this->request->getPost('password');

        // proses API Login
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL =>'localhost/project/AplikasiPenjualan/BE/api/login',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "username" : "'.$username.'",
            "password" : "'.$password.'"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Cookie: ci_session=1q8ibsak6hla1d7tqsqrta8q35f6kaqi'
        ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $hasilResponse = json_decode($response,true);
        // Logika 
        if($httpcode == 400){
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'login');
        }else {
            $ses_data = [
                'username'      => $hasilResponse['data']['username'],
                'token'         => $hasilResponse['data']['token'],
                'login'         => 1,
                'statusTambah'  => "Berhasil",
                'keterangan'    => $hasilResponse['messages']
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'dashboard');
        }
    }

    public function keluar()
    {
        $session     = session();
        $session->destroy();
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Anda telah keluar dari Admin"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'login');
    }
 
}