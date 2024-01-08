<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerKapitaExpendituresRequest;
use App\Models\PerKapitaExpenditures;
use App\Http\Resources\PerKapitaExpendituresResource;
use Database\Seeders\PerKapitaExpendituresSeeder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException;
use Throwable;
class PerKapitaExpendituresController extends Controller
{
    //
    public function index()
    {
        $perKapitaExpenditures = PerKapitaExpenditures::paginate(10);
        return PerKapitaExpendituresResource::collection($perKapitaExpenditures);
    }

    public function store(PerKapitaExpendituresRequest $request)
    {
        return (new PerKapitaExpendituresResource(PerKapitaExpenditures::create($request->validated())))->response()->header('Message', 'Data Added Successfully');
    }

    public function destroy($id)
    {
        $perKapitaExpenditures = PerKapitaExpenditures::findOrFail($id);

        $perKapitaExpenditures->delete();
        return response()->json(['Message' => 'Deleted Successfully'], 200);
    }

    public function show(string $id)
    {
        $perKapitaExpenditures = PerKapitaExpenditures::findOrFail($id);
        if (!$perKapitaExpenditures) {
            return response()->json(['Message' => 'Not Found!'], 404);
        }
        return new PerKapitaExpendituresResource($perKapitaExpenditures);
    }

    public function update(PerKapitaExpendituresRequest $request, $id)
    {
        $perKapitaExpenditures = PerKapitaExpenditures::findOrFail($id);
        $perKapitaExpenditures->update($request->validated());

        return (new PerKapitaExpendituresResource(PerKapitaExpenditures::findOrFail($id)))->response()->header('Message', 'Updated Successfully');
    }
}
