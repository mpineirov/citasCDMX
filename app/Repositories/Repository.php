<?php

namespace App\Repositories;

use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    /**
     * @var App
     */
    private $app;
    /**
     * @var
     */
    protected $model;
    /**
     * @param App $app
     */
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    abstract function model();

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->model->get();
    }

    public function first()
    {
        return $this->model->first();
    }

    public function allBy($name = 'name')
    {
        return $this->model->orderBy($name, 'asc')->get();
    }

    public function only30($name = 'name')
    {
        return $this->model->orderBy($name, 'asc')->take(5)->get();
    }

    /**
     * @param int $perPage
     * @return mixed
     */
    public function paginate($perPage = 15)
    {
        return $this->model->paginate($perPage);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        #$data = array_map('mb_strtoupper', $data);
        return $this->model->create($data);
    }

    /**
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return mixed
     */
    public function update(array $data, $id, $attribute = "id")
    {
        //$data = array_map('mb_strtoupper', $data);
        $u = $this->model->where($attribute, '=', $id)->update($data);

        if ($u == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function verified($attribute,$value)
    {
        $base = strtolower(class_basename($this->model));
        return $this->model->where($attribute,$value)->exists();
    }


    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $f = $this->model->find($id);

        if (!is_null($f))
            return $f;
        else
            return false;
    }


    /**
     * @param $attribute
     * @param $value
     * @return mixed
     */
    public function findBy($attribute, $value)
    {
        $F = $this->model->where($attribute, '=', $value)->first();

        if (!is_null($F)) {
            return $F;
        } else {
            return false;
        }
    }

    public function findAllwherein($atribute, array $in)
    {
        $all = $this->model->whereIn($atribute, $in)->get();

        if (isset($all[0])) {
            return $all;
        } else {
            return false;
        }
    }

    public function findAllNowherein($atribute, array $in)
    {
        $all = $this->model->whereNotIn($atribute, $in)->get();

        if (isset($all[0])) {
            return $all;
        } else {
            return false;
        }
    }


    public function findAllWhere($attribute, $value)
    {
        $faw = $this->model->where($attribute, '=', $value)->get();

        if (!is_null($faw)) {
            return $faw;
        } else {
            return false;
        }
    }

    public function findWhere($attribute, $value)
    {
        $faw = $this->model->where($attribute, '=', $value)->firstOrFail();

        if (!is_null($faw)) {
            return $faw;
        } else {
            return false;
        }
    }

    public function findlike($attribute, $value)
    {

        $F = $this->model->where($attribute, 'like', $value)->get();

        if (!is_null($F)) {
            return $F;
        } else {
            return null;
        }
    }

    public function getIdWithAttribute($attribute, $value, $idName = 'id')
    {

        $F = $this->model->where($attribute, '=', $value)->FirstOrFail()->getAttribute($idName);

        if (!is_null($F)) {
            return $F;
        } else {
            return null;
        }
    }

    public function findByWhere($attribute, $value)
    {
        $F = $this->model->where($attribute, '=', $value)->first();

        if (!is_null($F)) {
            return $F;
        } else {
            return false;
        }
    }

    public function findByWheres(array $wheres)
    {
        $F = $this->model->where($wheres)->first();

        if (!is_null($F)) {
            return $F;
        } else {
            return false;
        }
    }

    public function findAllWheres(array $wheres)
    {
        $F = $this->model->where($wheres)->get();

        if (!is_null($F)) {
            return $F;
        } else {
            return false;
        }
    }
    /**
     * @return \Illuminate\Database\Eloquent\Builder
     * @throws RepositoryException
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());//$this->app->make("App\Model\Catalogos\CatClaseVehiculo");

        if(!$model instanceof Model){
            $modelo = strtolower(class_basename($this->model()));
            abort( 500,
                "No existe ninguna instancia de {$modelo} con el valor especificado");
        }

        return $this->model = $model;
    }

    public function getTable()
    {
        return $this->model->getTable();
    }

    public function sync($id)
    {
        $this->model->attach($id, ['fecha_alta' => date('Y-m-d H:i:s'), 'fecha_fin' => '', 'status' => 1]);
    }

    public function scopeSearch($request)
    {
        if(is_array($request)){
            foreach ($request as $key => $value) {
                abort_if(array_search($key,$this->model->getFillable()) === false,422,"No existe el atributo {$key}");
            }
            return $this->findAllWheres($request);
        }
    }
}
