<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;

class PostTag extends ResourceController
{
  protected $modelName = 'App\Models\PostTagModel';
  protected $format    = 'json';

  public function index()
  {
    $data = $this->model->paginate($limit = 10);
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
    $data = $this->model->find($id);

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
    $body = $this->request->getJSON();

    if (!$this->model->insert($body))
      return $this->fail($this->model->errors());

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
