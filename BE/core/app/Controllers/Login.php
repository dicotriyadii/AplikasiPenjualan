<?php
 
namespace App\Controllers;
 
use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_pengguna;
use App\Models\Model_data;
use \Firebase\JWT\JWT;
 
class Login extends BaseController
{
    use ResponseTrait;
    public function create()
    {
        $session    = session();
        $user       = new Model_pengguna();
        $modelData  = new Model_data();
        $username   = $this->request->getVar('username');
        $password   = $this->request->getVar('password');

        $cekUser = $modelData->cekUsername($username);
        if($cekUser == null){
            $response= [
                'status'    => 400,
                'messages'  => "Username tidak terdaftar"
            ];  
            return $this->respond($response,400);      
        }else {
            $cekPassword = password_verify($password,$cekUser[0]['password']);
            if($cekPassword == true){
                // Proses JWT
                $key = getenv('JWT_SECRET');
                $iat = time(); // current timestamp value
                $exp = $iat + 86400;
                $payload = array(
                    "iss"       => "Issuer of the JWT",
                    "aud"       => "Audience that the JWT",
                    "sub"       => "Subject of the JWT",
                    "iat"       => $iat, //Time the JWT issued at
                    "exp"       => $exp, // Expiration time of token
                    "username"  => $username,
                ); 
                $token = JWT::encode($payload, $key, 'HS256');
                $response= [
                    'status'    => 200,
                    'messages'  => "Login Berhasil",
                    'data'      => [
                                    'username'  => $username,
                                    'token'     => $token,
                                ]
                ];  
                return $this->respond($response,200);   
            }else{
                $response = [
                    'status'    => 400,
                    'messages'  => "Password yang dimasukkan salah"
                ];  
                return $this->respond($response,400);   
            }
        }
    }
 
}