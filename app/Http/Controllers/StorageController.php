<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;

class StorageController extends Controller
{
    protected $disk;

    public function __construct()
    {
        $this->disk = Storage::disk('s3');
    }

    public function setItem(Request $request): JsonResponse
    {
        $request->validate([
            'key' => 'required|string',
            'value' => 'required',
        ]);

        $key = "storage/{$request->key}.json";
        $value = json_encode($request->value);

        $this->disk->put($key, $value);

        return response()->json(['message' => 'Data saved successfully.']);
    }

    public function getItem($key): JsonResponse
    {
        $path = "storage/{$key}.json";

        if ($this->disk->exists($path)) {
            $data = json_decode($this->disk->get($path), true);
            return response()->json(['data' => $data]);
        }

        return response()->json(['message' => 'Data not found.'], 404);
    }

    public function removeItem($key): JsonResponse
    {
        $path = "storage/{$key}.json";

        if ($this->disk->exists($path)) {
            $this->disk->delete($path);
            return response()->json(['message' => 'Data deleted successfully.']);
        }

        return response()->json(['message' => 'Data not found.'], 404);
    }
}
