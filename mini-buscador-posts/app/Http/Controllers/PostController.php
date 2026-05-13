<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    public function show(Request $request, $id)
    {
        // Validación del ID
        if (!is_numeric($id) || $id <= 0) {
            return response()->json([
                'error' => 'El ID debe ser un número positivo'
            ], 422);
        }

        $response = Http::withoutVerifying()
            ->get("https://jsonplaceholder.typicode.com/posts/{$id}");

        if ($response->status() === 404) {
            return response()->json([
                'error' => 'Post no encontrado'
            ], 404);
        }

        if ($response->failed()) {
            return response()->json([
                'error' => 'Error al consultar la API externa'
            ], $response->status());
        }

        $post = $response->json();

        // Modificar el título según el requisito
        $post['title'] = 'POST: ' . $post['title'];

        // Retornar solo los campos solicitados
        return response()->json([
            'id'    => $post['id'],
            'title' => $post['title'],
            'body'  => $post['body'],
        ]);
    }
}
