<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EncryptionController extends Controller
{
    private $iv = 'R3PR353N';
    private $key = 'rpaSPvIvVLlrcmtzPU9/c67Gkj7yL1S5';

    public function showForm()
    {
        return view('encrypt');
    }

    public function encrypt(Request $request)
    {
        $numero1 = $request->input('numero1');

        if (is_numeric($numero1) && strpos($numero1, '.') === false) {
            $encrypted = $this->encryptNumber($numero1);
            return view('encrypt', ['encrypted' => $encrypted]);
        } elseif (is_numeric($numero1)) {
            return view('encrypt', ['error' => 'Usted ingresó un número decimal y no un número entero']);
        } else {
            return view('encrypt', ['error' => 'Usted colocó un string o un número escrito y no un número']);
        }
    }

    private function encryptNumber($numero)
    {
        $iv = $this->iv;
        $key = base64_decode($this->key);
        $data = $numero;

        $ciphertext = openssl_encrypt($data, 'DES-EDE3-CBC', $key, OPENSSL_RAW_DATA, $iv);
        return base64_encode($ciphertext);
    }
}
