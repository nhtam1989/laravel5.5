<?php

namespace App\Repositories\Eloquent;

use App\Repositories\BaseRepositoryInterface;

abstract class BaseEloquentRepository implements BaseRepositoryInterface
{
    protected $model;

    abstract protected function setModel();

    protected function getModel()
    {
        $this->setModel();
        return app()->make($this->model);
    }

    public function findOne($id)
    {
        return $this->getModel()->find($id);
    }

    public function findAll()
    {
        return $this->getModel()->all();
    }

    public function findAllByIds($ids)
    {
        return $this->getModel()->whereIn('id', $ids)->get();
    }

    public function findOneByFieldName($field_name, $value, $operator = '=')
    {
        return $this->getModel()
            ->where($field_name, $operator, $value)
            ->first();
    }

    public function findAllActiveByFieldName($field_name, $value, $operator = '=')
    {
        return $this->getModel()->whereActive(true)
            ->where($field_name, $operator, $value)
            ->get();
    }

    public function findOneActive($id)
    {
        return $this->getModel()->whereActive(true)
            ->where('id', $id)
            ->first();

    }

    public function findAllActive()
    {
        return $this->getModel()->whereActive(true)->get();
    }

    public function findAllActiveByIds($ids)
    {
        return $this->getModel()->whereActive(true)
            ->where('id', $ids)
            ->get();
    }

    public function findOneActiveByFieldName($field_name, $value, $operator = '=')
    {
        return $this->getModel()->whereActive(true)->where($field_name, $operator, $value)
            ->first();
    }

    public function findAllByFieldName($field_name, $value, $operator = '=')
    {
        return $this->getModel()->where($field_name, $operator, $value)
            ->get();
    }

    public function findAllActiveSkeleton()
    {
        return $this->findAllActive();
    }

    public function findOneActiveSkeleton($id)
    {
        return $this->findAllActiveSkeleton()->where('id', $id)->first();
    }

    public function findAllSkeleton()
    {
        return $this->findAll();
    }

    public function findOneSkeleton($id)
    {
        return $this->findAllSkeleton()->where('id', $id)->first();
    }

    public function countAll()
    {
        return $this->getModel()->count();
    }

    public function countAllActive()
    {
        return $this->getModel()->whereActive(true)->count();
    }

    public function createOne($data)
    {
        return $this->getModel()->create($data);
    }

    public function updateOne($id, $data)
    {
        $isSuccess = $this->getModel()->where('id', $id)->update($data);
        if (!$isSuccess)
            return null;
        return $this->getModel()->find($id);
    }

    public function saveOne($data)
    {
        return $this->getModel()->save($data);
    }

    public function deactivateOne($id)
    {
        return $this->getModel()->find($id)->update(['active' => false]);
    }

    public function deactivateAll()
    {
        return $this->getModel()->whereActive(true)->update(['active' => false]);

    }

    public function deactivateAllByIds($ids)
    {
        return $this->getModel()->whereIn('id', $ids)->update(['active' => false]);
    }

    public function destroyAll()
    {
        return $this->getModel()->whereActive(true)->delete();
    }

    public function destroyAllByIds($ids)
    {
        return $this->getModel()->destroy($ids);
    }

    public function destroyOne($id)
    {
        return $this->getModel()->destroy($id);
    }

    public function existsValue($filed_name, $value, $skip_id = [])
    {
        $exists = $this->getModel()->where($filed_name, $value)
            ->whereNotIn('id', $skip_id)->count();
        return ($exists > 0);
    }

    public function generateCode($prefix)
    {
        $code = $prefix . date('ymd');

        $stt = $this->getModel()->where('code', 'like', $code . '%')
            ->get()->count();
        return $code . substr('00' . $stt, 0);
    }

}


