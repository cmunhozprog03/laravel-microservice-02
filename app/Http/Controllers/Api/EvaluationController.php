<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateElavuationResquest;
use App\Http\Resources\EvaluationResource;
use App\Models\Evaluetion;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    protected $repository;

    public function __construct(Evaluetion $model)
    {
        $this->repository = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($company)
    {
        $evaluations = $this->repository->where('company', $company)->get();

        return EvaluationResource::collection($evaluations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateElavuationResquest $request, $company)
    {
        $evaluation = $this->repository->create($request->validated());

        return new EvaluationResource($evaluation);
    }


}
