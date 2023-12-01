<?php

namespace App\Repositories\Contracts;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface EloquentRepositoryInterface
{

    /*
    interface that will contain all the common methods 
    that are used when we are accessing our database to retrieve, 
    store, and remove data. (CRUD)
    */

    function all(array $columns = ['*'],array $relations = [] ) : Collection ;

    function allTrashed() : Collection ;

    function findById(int $id,array $columns=['*'],array $relations = [],array $appends = []) : ?Model ;

    function findTrashedById(int $id) : ?Model ;

    function create(array $payload) : ?Model;
    function update(int $id,array $payload) : bool;

    function deleteById(int $id) : bool;

    function restoreById(int $id) : bool;

    function permanentlyDeleteById(int $id) : bool;
    function customizePayload(array $data) : array;
    




}