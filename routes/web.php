<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BibliotecaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LivroController;



Route::get('/', [BibliotecaController::class, 'index'])->name('view.index');

Route::get('/cadastro', [userController::class, 'viewCadastro'])->name('view.cadastro');
Route::post('/cadastro', [userController::class, 'store'])->name('store.cadastro');

Route::get('/login', [userController::class, 'viewLogin'])->name('view.login');
Route::post('/auth', [userController::class, 'auth'])->name('auth');
Route::get('/logout', [UserController::class, 'logout'])->name('logout.user')->middleware('auth');;

Route::post('/search', [BibliotecaController::class, 'search'])->name('search');
Route::get('/avancado', [BibliotecaController::class, 'viewAvancado'])->name('viewavancado.livro');
Route::post('/SearchAvancado', [BibliotecaController::class, 'searchAvancado'])->name('searchavancado.livro');
Route::get('/livro', [BibliotecaController::class, 'searchLivro'])->name('search.livro');


Route::get('/ler/{id}', [LivroController::class, 'lerLivro'])->name('ler.livro')->middleware('auth');;
Route::delete('/Naoler', [LivroController::class, 'destroy'])->name('destroy.livro')->middleware('auth');;
Route::get('/meuslivros', [LivroController::class, 'meusLivros'])->name('meus.livro')->middleware('auth');;