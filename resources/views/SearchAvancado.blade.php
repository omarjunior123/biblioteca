<script type="text/javascript">
function atualizar(status){
    if(status == 1){
        document.getElementById('filtro_titulo').style.display = 'block';
        document.getElementById('filtro_autor').style.display = 'none';
        document.getElementById('filtro_categoria').style.display = 'none';
        document.getElementById('filtro_editora').style.display = 'none';
        document.getElementById('filtro_isbn').style.display = 'none';
    }
    if(status == 2){
        document.getElementById('filtro_titulo').style.display = 'none';
        document.getElementById('filtro_autor').style.display = 'block';
        document.getElementById('filtro_categoria').style.display = 'none';
        document.getElementById('filtro_editora').style.display = 'none';
        document.getElementById('filtro_isbn').style.display = 'none';
    }
    if(status == 3){
        document.getElementById('filtro_titulo').style.display = 'none';
        document.getElementById('filtro_autor').style.display = 'none';
        document.getElementById('filtro_categoria').style.display = 'block';
        document.getElementById('filtro_editora').style.display = 'none';
        document.getElementById('filtro_isbn').style.display = 'none';
    }
    if(status == 4){
        document.getElementById('filtro_titulo').style.display = 'none';
        document.getElementById('filtro_autor').style.display = 'none';
        document.getElementById('filtro_categoria').style.display = 'none';
        document.getElementById('filtro_editora').style.display = 'block';
        document.getElementById('filtro_isbn').style.display = 'none';
    }
    if(status == 5){
        document.getElementById('filtro_titulo').style.display = 'none';
        document.getElementById('filtro_autor').style.display = 'none';
        document.getElementById('filtro_categoria').style.display = 'none';
        document.getElementById('filtro_editora').style.display = 'none';
        document.getElementById('filtro_isbn').style.display = 'block';
    }
}
</script>

@extends('index')

@section('content')
<section id="news" class="livros" data-stellar-background-ratio="2.5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                    <h2>Pesquisa avançada</h2>
                    </div>
                </div>

                <form method="post" action="/SearchAvancado">
                    @csrf
                    <div class="col-md-12 col-sm-12" style="text-align:left; margin-bottom:3%;">
                        <div class="col-md-6 col-sm-6">
                            <label>Filtro de pesquisa</label>
                            <select class="form-control select" name="filtro" id="filtro" onchange="atualizar(this.value)">
                                <option value="1">Título</option>
                                <option></option>
                                <option value="1">Título</option>
                                <option value="2">Autor</option>
                                <option value="3">Categoria</option>
                                <option value="4">Editora</option>
                                <option value="5">ISBN</option>
                            </select>
                        </div>

                        <div id="filtro_titulo" class="col-md-6 col-sm-6">
                            <label for="name">Título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Digite o título">
                        </div>

                        <div id="filtro_autor" class="col-md-6 col-sm-6" style="display:none;">
                            <label for="name">Autor</label>
                            <input type="text" class="form-control" id="autor" name="autor" placeholder="Digite o autor do livro">
                        </div>

                        <div id="filtro_categoria" class="col-md-6 col-sm-6" style="display:none;">
                            <label for="name">Categoria</label>
                            <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Digite a categoria">
                        </div>

                        <div id="filtro_editora" class="col-md-6 col-sm-6" style="display:none;">
                            <label for="name">Editora</label>
                            <input type="text" class="form-control" id="editora" name="editora" placeholder="Digite o autor do livro">
                        </div>

                        <div id="filtro_isbn" class="col-md-6 col-sm-6" style="display:none;">
                            <label for="name">ISBN</label>
                            <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Digite o ISBN">
                        </div>

                        <div class="col-md-3 col-sm-3" style="margin-top:2%;"> 
                            <button type="submit" class="form-control" id="cf-submit" name="submit" style="background:green; color:#FFFFFF;">Pesquisar livros</button>
                        </div>    
                    </div>
                </form>

                @if($lista->totalItems)
                @foreach($lista->items as $livro)
                    <?php
                     if(isset($livro->volumeInfo->imageLinks))
                         $img = $livro->volumeInfo->imageLinks->thumbnail;
                     else
                         $img = 'images/sem_capa.jpg';
                    ?>

                    <div class="col-md-4 col-sm-6" style="height:580px;">
                        <div class="news-thumb wow fadeInUp" data-wow-delay="0.6s" ><br/>
                            <a href="">
                                <img src="{{ $img }}" class="img-responsive" alt="" style="margin-left:30%;">
                            </a>

                            <div class="news-info">
                                <h3><a href="">{{ substr($livro->volumeInfo->title,0,40).'...'; }} </a></h3>
                                <p>
                                    <?php
                                        if(isset($livro->volumeInfo->description))
                                            echo substr($livro->volumeInfo->description,0,70).'...';
                                    ?>
                                </p>

                                <p> Autor:
                                    <?php
                                        if(isset($livro->volumeInfo->authors[0]))
                                            echo $livro->volumeInfo->authors[0];
                                    ?>
                                </p>

                            </div>

                            <div>
                                <a href="/livro?id={{ $livro->id }}"><button type="submit" class="form-control" id="cf-submit" name="submit" style="background:green; color:#FFFFFF; width:80%; margin-left:10%; margin-top:-5%;">Saiba mais...</button> </a>
                            </div><br/>
                        </div>
                    </div>
                @endforeach
                @else
                    <p>Resultado não encontrado. Tente novamente</p>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection