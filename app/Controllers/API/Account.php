<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use App\Models\RecoveryCodeModel;

class Account extends ResourceController
{
  protected $modelName = 'App\Models\UserModel';
  protected $format    = 'json';

  public function emailConfirm() {
    helper(['text', 'email_helper']);

    $user = $this->request->user;

    $hashCode = random_string('alnum', 16);
    $activationCode = array('activation_code' => $hashCode);

    $this->model->update($user->id, $activationCode);

    $subject = '🚀 Confirmação de e-mail - AnyCode';
    $url = base_url('api/account/confirm-email/' . $hashCode);
    $message = 'Clique no link abaixo para confirmar seu email </br> ' . $url;
    sendEmail($user->email, $subject, $message);

    $response = array(
      'status'    => 200,
      'error'   => false,
      'messages'  => array(
        'success' => 'Successfully'
      ),
    );

    return $this->respond($response);
  }

  public function confirmEmail($code)
  {
    helper('email');

    $id = $this->request->user->id;
    $user = $this->model->where('id', $id)->first();

    if ($code != $user->activation_code)
      return $this->fail('Incorrect code');

    $user->status = 'active';
    $this->model->save($user);

    $subject = 'E-mail validado com sucesso - AnyCode';
    $message = 'Obrigado por validar o seu email </br> ';
    sendEmail($user->email, $subject, $message);

    $response = array(
      'status'    => 200,
      'error'   => false,
      'messages'  => array(
        'success' => 'Successfully'
      ),
    );

    return $this->respond($response);
  }

  public function forgotPassword() {
    helper(['text', 'email']);

    $body = $this->request->getJSON();
    $user = $this->model->findUserByEmail($body->email);

    if (!$user)
      return $this->failNotFound('No data found');

    $hashCode = random_string('alnum', 16);
    $recovery = [
      'code'        => $hashCode,
      'user'        => $user->id,
      'expiration'  => date("Y-m-d H:m:s", strtotime("+1 week")),
    ];

    $recoveryModel = new RecoveryCodeModel();
    $recoveryModel->insert($recovery);

    $subject = '🚀 Recuperação de conta - AnyCode';
    $url = base_url('api/account/confirm-email/' . $hashCode);
    $message = 'Clique no link abaixo para alterar sua senha' . $url;
    sendEmail($user->email, $subject, $message);

    $response = array(
      'status'    => 200,
      'error'   => false,
      'messages'  => array(
        'success' => 'Successfully'
      ),
    );

    return $this->respond($response);
  }

  public function resetPassword($code) {
    helper(['text', 'email']);

    $recoveryModel = new RecoveryCodeModel();
    $recovery = $recoveryModel->where('code', $code)->first();

    if (!$recovery || $recovery->status == 'inactive')
      return $this->failNotFound('No data found');

    $user = $this->model->find($recovery->user);

    if (!$user)
      return $this->failNotFound('No data found');

    $body = $this->request->getJSON();
    $password = $body->password;

    $user->password = $password;
    $this->model->save($user);

    $recovery->status = 'inactive';
    $recoveryModel->save($recovery);

    $subject = '🚀 Senha Alterada - AnyCode';
    $message = 'Senha alterada com sucesso';
    sendEmail($user->email, $subject, $message);

    $response = array(
      'status'    => 200,
      'error'   => false,
      'messages'  => array(
        'success' => 'Successfully'
      ),
    );

    return $this->respond($response);
  }
}
