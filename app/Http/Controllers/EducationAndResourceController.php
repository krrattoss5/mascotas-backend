<?php

namespace App\Http\Controllers;

use App\Models\EducationAndResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;

class EducationAndResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = EducationAndResource::paginate(10);
        $response = [
            'lastPage' => $data->lastPage(),
            'currentPage' => $data->currentPage(),
            'total' => $data->total(),
            'data' => $data->items()
        ];
        return response()->json($response, Response::HTTP_OK);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $rules = [
                'name' => 'required|string',
                'description' => 'required|string',
                'url' => 'required|file|max:10240',
                'status' => 'required|string|in:activo,inactivo'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validación fallida',
                    'errors' => $validator->errors()
                ], Response::HTTP_BAD_REQUEST);
            }
            if (!Gate::allows('validate-role', auth()->user())) {
                return response()->json(['message' => 'Error en privilegio', 'error' => 'No tienes permisos para realizar esta acción'], Response::HTTP_UNAUTHORIZED);
            }
            $file = $request->file('url');
            $path = Storage::disk('s3')->putFile('uploads', $file, 'public');
            $url = Storage::disk('s3')->url($path);
            $dataToCreate = $request->only(['name', 'description', 'status']);
            $dataToCreate['url'] = $url;
            $data = EducationAndResource::create($dataToCreate);
            return response()->json([
                'message' => 'Recurso creado exitosamente',
                'data' => $data
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error interno',
                'error' => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $data = EducationAndResource::findOrFail($id);
            return response()->json($data, Response::HTTP_OK);
        } catch (ModelNotFoundException $e) {
            $modelName = class_basename($e->getModel());
            return response()->json(['message' => "No query results for id $id of model {$modelName} "], Response::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error interno', 'error' =>  $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $rules = [
                'name' => 'sometimes|required|string',
                'description' => 'sometimes|required|string',
                'url' => 'sometimes|required|file|max:10240',
                'status' => 'sometimes|required|string|in:activo,inactivo'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validación fallida',
                    'errors' => $validator->errors()
                ], Response::HTTP_BAD_REQUEST);
            }
            if (!Gate::allows('validate-role', auth()->user())) {
                return response()->json(['message' => 'Error en privilegio', 'error' => 'No tienes permisos para realizar esta acción'], Response::HTTP_UNAUTHORIZED);
            }
            $data = EducationAndResource::findOrFail($id);

            if ($request->hasFile('url')) {
                $this->updateFileInS3($request, $data);
            }

            $validatedData = $request->only(['name', 'description', 'status', 'url']);
            $data->update($validatedData);
            return response()->json($data, Response::HTTP_OK);
        } catch (ModelNotFoundException $e) {
            $modelName = class_basename($e->getModel());
            return response()->json(['message' => "No query results for model {$modelName} {$id}"], Response::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error', 'error' =>  $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
    private function updateFileInS3($request, $data)
    {
        if ($data->url) {
            $existingFile = str_replace(Storage::disk('s3')->url(''), '', $data->url);
            if (!empty($existingFile)) {
                Storage::disk('s3')->delete($existingFile);
            }
        }
        $file = $request->file('url');
        $path = Storage::disk('s3')->putFile('uploads', $file, 'public');
        $url = Storage::disk('s3')->url($path);
        $request->merge(['url' => $url]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            if (!Gate::allows('validate-role', auth()->user())) {
                return response()->json(['message' => 'Error en privilegio', 'error' => 'No tienes permisos para realizar esta acción'], Response::HTTP_UNAUTHORIZED);
            }
            $data = EducationAndResource::findOrFail($id);
            $data->delete();
            return response()->json(["message" => "Alergia eliminada de forma exitosa"], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['message' => "Error", 'error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
