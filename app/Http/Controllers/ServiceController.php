<?php

namespace App\Http\Controllers;

use App\Service;
use App\Http\Resources\Service as ServiceResources;
use App\Http\Resources\ServiceCollection;
use Illuminate\Http\Request;


class ServiceController extends Controller
{
    public function index()
    {
        return new ServiceCollection(Service::paginate(10));
    }


    public function show(Service $service)
    {

        return response()->json(new ServiceResources  ($service), 200);
    }


    public function store(Request $request)
    {
        $service = Service::create($request->all()); return response()->json($service, 201);
    }


    public function update(Request $request, Service $service)
    {
        $service->update($request->all()); return response()->json($service, 200);
    }


    public function delete(Service $service)
    {

        $service->delete(); return response()->json(null, 204);
    }
}
