<?php

namespace App\Services;

use Mail;


trait BaseServiceTrait
{

    public function store($params)
    {
        $this->repository->create($params);
    }

    public function find(array $conditions, $first = false)
    {
        return $this->repository->find($conditions, $first);
    }

    public function delete()
    {

    }

    public function update(array $conditions)
    {
        return $this->repository->update($conditions);
    }

    public function logicalDelete(array $conditions)
    {
        return $this->repository->logicalDelete($conditions);
    }


    public function total($columns = [], $defaultText = '')
    {
        return $this->repository->total($columns, $defaultText);
    }

    public function search($keyword, $search)
    {
        return $this->repository->search($keyword, $search);
    }

    public function sendMail($mail)
    {
        Mail::send($mail);
        return $this;
    }


}
