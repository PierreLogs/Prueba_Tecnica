<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    //Creamos el método "show"
    public function show(Request $request, $id)
    {
        // Validación del ID, da error si el número es negativo
        if (!is_numeric($id) || $id <= 0) {
            return response()->json([
                'error' => 'El ID debe ser un número positivo'
            ], 422);
        }

        $response = Http::withoutVerifying() //El cliente Http withoutVerifying Evita temporalmente prolemas con el certificado SSL en Local
            ->get("https://jsonplaceholder.typicode.com/posts/{$id}");

        //Manejo de errores en el caso si el post no existe
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

        // Modificar el título agregando el prefijo "POST" según el requisito enunciado
        $post['title'] = 'POST: ' . $post['title'];

        // Retornar solo los campos solicitados
        return response()->json([
            'id'    => $post['id'],
            'title' => $post['title'],
            'body'  => $post['body'],
        ]);
    }
}
