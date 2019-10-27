<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        
        if ($user) {
            echo "<h1>Dados do Usuário:</h1>";
            echo "Nome: {$user->name}, E-mail: {$user->email}";
        }

        $address = $user->address()->first();

        if ($address) {
            echo "<h2>Endereço</h2>";
            echo "Rua: {$address->street}, Número: {$address->number}, {$address->city}/ {$address->state}.";
        }

        $posts = $user->posts()->get();
        // dd($posts);
        if ($posts) {
            echo "<h2>Artigos:</h2>";
            echo "<ol>";
            foreach($posts as $post){
                echo "<li>Título: {$post->title}, Conteúdo: {$post->content}, Data de Criação: {$post->created_at}.</li>";                
            }
            echo "</ol>";
        }
    }
}
