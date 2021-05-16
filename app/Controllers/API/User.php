<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;

class User extends ResourceController
{
  protected $modelName = 'App\Models\UserModel';
  protected $format    = 'json';

  public function index()
  {
    $data = $this->model
      ->select('id, role, avatar, first_name, last_name, status')
      ->paginate($limit = 10);
    $pager = $this->model->pager;

    if (!$data)
      return $this->respondNoContent();

    $response = array(
      'status'    => 200,
      'error'     => false,
      'messages'  => array(
        'success' => 'OK'
      ),
      'meta'      => array(
        'current-page'  => $pager->getCurrentPage(),
        'per-page'      => $limit,
        'total'         => $pager->getTotal(),
        'last-page'     => $pager->getPageCount(),
      ),
      'data'      => $data,
    );

    return $this->respond($response);
  }

  public function show($id = null)
  {
    if (isset($request->user) && $request->user->id == $id)
      $data = $this->model
        ->select('id, role, avatar, first_name, last_name, status')
        ->find($id);
    else
      $data = $this->request->user;
      unset($data->password);
      unset($data->activation_code);

    if (!$data)
      return $this->failNotFound('No data found with id ' . $id);

    $response = array(
      'status'    => 200,
      'error'     => false,
      'messages'  => array(
        'success' => 'OK'
      ),
      'data'      => $data,
    );

    return $this->respond($response);
  }

  public function create()
  {
    helper(['text', 'email']);

    $body = $this->request->getJSON();

    $hashCode = random_string('alnum', 16);
    $body->activation_code = $hashCode;

    if (!$this->model->insert($body))
      return $this->fail($this->model->errors());

    # Confirmation Code
    $subject = '🚀 Boas vindas ao AnyCode';
    $url = base_url($hashCode);
    $message = 'Clique no link abaixo para confirmar sua conta<br/>' . $url;
    sendEmail($body->email, $subject, $message);

    $data = array('id' => $this->model->getInsertID());

    $response = array(
      'status'    => 201,
      'error'     => false,
      'messages'  => array(
        'success' => 'Successfully created'
      ),
      'data'      => $data,
    );

    return $this->respondCreated($response);
  }

  public function update($id = null)
  {
    $data = $this->model->where('id', $id)->first();

    if (!$data)
      return $this->failNotFound('No data found');

    $body = $this->request->getJSON();
    $body->id = $id;

    if (!$this->model->save($body))
      return $this->fail($this->model->errors());

    $response = array(
      'status'    => 200,
      'error'     => false,
      'messages'  => array(
        'success' => 'Successfully updated'
      ),
    );

    return $this->respond($response);
  }

  public function delete($id = null)
  {
    $data = $this->model->where('id', $id)->first();

    if (!$data)
      return $this->failNotFound('No data found');

    $this->model->delete($id);

    $response = array(
      'status'    => 200,
      'error'     => false,
      'messages'  => array(
        'success' => 'Successfully deleted'
      ),
    );

    return $this->respondDeleted($response);
  }
}
