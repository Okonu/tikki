<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEndpointRequest;
use App\Http\Requests\UpdateEndpointRequest;
use App\Models\Endpoint;

class EndpointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEndpointRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Endpoint $endpoint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Endpoint $endpoint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEndpointRequest $request, Endpoint $endpoint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Endpoint $endpoint)
    {
        //
    }
}
