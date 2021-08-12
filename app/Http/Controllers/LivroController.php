<?php

namespace App\Http\Controllers;
use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LivroController extends Controller
{
    public function lerLivro(Request $request)
    {
        $livro = new Livro();
        $livro->id_user = Auth::id();
        $livro->id_livro = $request->id;
        $livro->save();
        return redirect()->back();
    }

    public function destroy()
    {
        $id = request('id');
        $id_user = Auth::id();
        $id_livro = $id;
        Livro::where('id_livro', $id)->where('id_user', $id_user)->delete();
        return redirect()->back();
    }

    public function meusLivros()
    {   
        $id_user = Auth::id();
        $meus_livros = Livro::where('id_user', $id_user)->get();
        $x=0; $lista = [];
        foreach($meus_livros as $livro)
        {
            $id_livro = $livro->id_livro;
            $url = file_get_contents("https://www.googleapis.com/books/v1/volumes/$id_livro");
            $livro = json_decode($url);
            $lista += [$x => $livro];
            $x++;
        }
        return view('ViewMeusLivros', ['lista' => $lista]); 
    }
}
