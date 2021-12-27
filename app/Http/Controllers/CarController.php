<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCarRequest;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return response(Car::get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateCarRequest $request
     * @return Response
     */
    public function store(CreateCarRequest $request): Response
    {
        $validated = $request->validated();
        Car::create([
            'brand' => $validated['brand'],
            'model' => $validated['model'],
            'price' => $validated['price'],
            'created_at' => now(),
        ]);
        return response('Ok', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(int $id): Response
    {
        return response(Car::findOrFail($id), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, int $id): Response
    {
        $car = Car::findOrFail($id);
        $car->update($request->all());
        return response('Ok', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(int $id): Response
    {
        $car = Car::findOrFail($id);
        $car->delete();
        return response('Ok', 200);
    }
}
