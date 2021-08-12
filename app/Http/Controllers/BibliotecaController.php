<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Livro;

class BibliotecaController extends Controller
{
    public function index()
    { 
        $url = file_get_contents("https://www.googleapis.com/books/v1/volumes?q="."a");
        $lista = json_decode($url);
        return view('home', ['lista' => $lista]);
    }

    
    public function search(Request $request)
    {
        $search = str_replace(' ', '+', $request->livro);
        $url = file_get_contents("https://www.googleapis.com/books/v1/volumes?q=$search");
        $lista = json_decode($url);
        return view('home', ['lista' => $lista]); 
    }

    public function searchLivro()
    {
        $id = request('id');
        $url = file_get_contents("https://www.googleapis.com/books/v1/volumes/$id");
        $livro = json_decode($url);
        $id_user = Auth::id();
        $status = Livro::where('id_livro', $id)->where('id_user', $id_user)->count();
        return view('livro', ['livro' => $livro, 'status' => $status]); 
    }

    public function viewAvancado()
    { 
        $url = file_get_contents("https://www.googleapis.com/books/v1/volumes?q="."a");
        $lista = json_decode($url);
        return view('SearchAvancado', ['lista' => $lista]);
    }

    public function searchAvancado(Request $request)
    {  
        if($request->filtro == 1)
        {
            $search = str_replace(' ', '+', $request->titulo);
            $url = file_get_contents("https://www.googleapis.com/books/v1/volumes?q=$search");
            $lista = json_decode($url);
        }

        if($request->filtro == 2)
        {
            $search = str_replace(' ', '+', $request->autor);
            $url = file_get_contents("https://www.googleapis.com/books/v1/volumes?q=+inauthor:$search");
            $lista = json_decode($url);
        }

        if($request->filtro == 3)
        {
            $search = str_replace(' ', '+', $request->categoria);
            $url = file_get_contents("https://www.googleapis.com/books/v1/volumes?q=+subject:$search");
            $lista = json_decode($url);
        }

        if($request->filtro == 4)
        {
            $search = str_replace(' ', '+', $request->editora);
            $url = file_get_contents("https://www.googleapis.com/books/v1/volumes?q=+inpublisher:$search");
            $lista = json_decode($url);
        }

        if($request->filtro == 5)
        {
            $search = str_replace(' ', '+', $request->isbn);
            $url = file_get_contents("https://www.googleapis.com/books/v1/volumes?q=+isbn:$search");
            $lista = json_decode($url);
        }

        return view('SearchAvancado', ['lista' => $lista]);
    }

}
