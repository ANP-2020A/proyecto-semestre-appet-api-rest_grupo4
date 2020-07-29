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
        $validatedData = $request->validate([
            'title' => 'required|string|unique:services|max:255',
            'type' => 'required ',
            'locate'=> 'required ',
            'price'=> 'required ',
            'description'=> 'required',
            'image' => 'required|image|dimensions:min_width=200,min_height=200',
        ]);
        //$service = Service::create($request->all());

        $service = new Service($request->all());
        $path = $request->image->store('public/services');

        $service->image = $path;
        $service->save();
        return response()->json(new ServiceResources($service), 201);
    }


    public function update(Request $request, Service $service)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|unique:services|max:255',
            'type' => 'required ',
            'locate'=> 'required ',
            'price'=> 'required ',
            'description'=> 'required',
        ]);
        $service->update($request->all());
        return response()->json($service, 200);
    }


    public function delete(Service $service)
    {

        $service->delete(); return response()->json(null, 204);
    }
}
