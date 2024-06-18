<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;
use CodeIgniter\I18n\Time;

class ResetPassword extends BaseController
{
    public function requestReset()
    {
        return view('auth/request_reset');
    }


    public function sendResetLink()
    {
        $email = \Config\Services::email();
        $correo = $this->request->getPost('email');
        $userModel = new UsuarioModel();
        $user = $userModel->where('email', $correo)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'No se encontró una cuenta con ese email.');
        }

        $token = bin2hex(random_bytes(50));
        $userModel->update($user['id'], [
            'reset_token' => $token,
            'reset_expiration' => Time::now()->addMinutes(60)
        ]);

        $resetLink = site_url('password/reset/' . $token);
        $email->setFrom('edgardegantea@yahoo.com', 'Soporte Técnico');
        $email->setTo($user['email']);
        $email->setSubject('Recuperación de Contraseña');
        $email->setMessage('Hola ' . $user['nombre'] . ':<br><br>Usted solicitó recuperar su contraseña para ingresar al Sistema de Horarios de UPN 212 Teziutlán. Haga clic en el siguiente enlace para restablecer su contraseña: <a href="' . $resetLink . '">Restablecer Contraseña</a><br><br>Si usted no solicitó el cambio entonces haga caso omiso y repórtelo al desarrollador del sistema por email a: edgar.degante.a@gmail.com o por WhatsApp al: 231 205 1120<br><br>Saludos.');
        $email->send();

        if (!$email->send()) {
            return redirect()->back()->with('error', 'No se pudo enviar el email. Intente de nuevo.');
        } else {
            return redirect()->to('login')->with('success', 'Se ha enviado un enlace de restablecimiento a su email.');
        }
    }


    public function reset($token)
    {
        $userModel = new UsuarioModel();
        $user = $userModel->where('reset_token', $token)
            ->where('reset_expiration >=', Time::now())
            ->first();

        if (!$user) {
            return redirect()->to('/')->with('error', 'Token inválido o expirado.');
        }

        return view('auth/reset_password', ['token' => $token]);
    }


    public function updatePassword()
    {
        $token = $this->request->getPost('token');
        $password = $this->request->getPost('password');

        $userModel = new UsuarioModel();
        $user = $userModel->where('reset_token', $token)
            ->where('reset_expiration >=', Time::now())
            ->first();

        if (!$user) {
            return redirect()->to('/')->with('error', 'Token inválido o expirado.');
        }

        $userModel->update($user['id'], [
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'reset_token' => null,
            'reset_expiration' => null
        ]);

        return redirect()->to('/login')->with('success', 'Su contraseña ha sido restablecida.');
    }
}
