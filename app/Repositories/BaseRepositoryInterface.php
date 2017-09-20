<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    public function createOne($data);

    public function saveOne($data);

    public function updateOne($id, $data);

    public function deactivateOne($id);

    public function deactivateAll();

    public function deactivateAllByIds($ids);

    public function destroyOne($id);

    public function destroyAll();

    public function destroyAllByIds($ids);


    public function findOne($id);

    public function findAll();

    public function findAllByIds($ids);

    public function findOneByFieldName($field_name, $value, $operator = '=');

    public function findAllByFieldName($field_name, $value, $operator = '=');

    public function findOneActive($id);

    public function findAllActive();

    public function findAllActiveByIds($ids);

    public function findOneActiveByFieldName($field_name, $value, $operator = '=');

    public function findAllActiveByFieldName($field_name, $value, $operator = '=');

    public function countAll();

    public function countAllActive();

    public function generateCode($prefix);

    public function existsValue($filed_name, $value, $skip_id = []);

    public function findAllSkeleton();

    public function findOneSkeleton($id);

    public function findAllActiveSkeleton();

    public function findOneActiveSkeleton($id);

}
