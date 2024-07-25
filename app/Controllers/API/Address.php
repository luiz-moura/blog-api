<?php

namespace App\Controllers\API;

use App\Models\AddressModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Address extends ResourceController
{
    protected AddressModel $modelName = AddressModel::class;
    protected $format = 'json';

    public function index()
    {
        $addresses = $this->model->paginate($perPage = 10);

        if (!$addresses) {
            return $this->respondNoContent();
        }

        return $this->respond([
            'meta' => [
                'per-page' => $perPage,
                'current-page' => $this->model->pager->getCurrentPage(),
                'total' => $this->model->pager->getTotal(),
                'last-page' => $this->model->pager->getPageCount(),
            ],
            'data' => $addresses,
        ]);
    }

    public function show($id = null)
    {
        $address = $this->model->find($id);

        if (!$address) {
            return $this->failNotFound();
        }

        return $this->respond($address);
    }

    public function create()
    {
        $request = $this->request->getJSON();

        if (!$this->validate($request, $this->model->getValidationRules())) {
            return $this->respond(
                $this->validator->getErrors(),
                ResponseInterface::HTTP_BAD_REQUEST
            );
        }

        if (!$this->model->insert($request)) {
            return $this->fail($this->model->errors());
        }

        return $this->respondCreated([
            'id' => $this->model->getInsertID()
        ]);
    }

    public function update($id = null)
    {
        $address = $this->model->where('id', $id)->first();

        if (!$address) {
            return $this->failNotFound();
        }

        $request = $this->request->getJSON();

        if (!$this->model->update($id, $request)) {
            return $this->fail($this->model->errors());
        }

        return $this->respondNoContent();
    }

    public function delete($id = null)
    {
        $address = $this->model->where('id', $id)->first();

        if (!$address) {
            return $this->failNotFound();
        }

        $this->model->delete($id);

        return $this->respondDeleted();
    }
}
