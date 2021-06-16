<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    public function get();

    public function find();

    public function findOrFail($id);

    public function where();

    public function whereIn();

    public function whereNotIn();

    public function first();

    public function last();

    public function load();

    public function paginator();

    public function orderBy();

    public function limit();

    public function store();

    public function update();

    public function delete();

    public function totalRecord();

    public function getModel();
}
