@extends('index')

@section('content')
<section id="news" class="livros" data-stellar-background-ratio="2.5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                    <h2>{{ $livro->volumeInfo->title }}</h2>
                </div>
            </div>

            <div class="col-md-3 col-sm-3">
                @if(isset($livro->volumeInfo->imageLinks))
                    <img src="{{ $livro->volumeInfo->imageLinks->thumbnail }}" class="img-responsive" alt=""  width="100%">
                @else
                    <img src="images/sem_capa.jpg" class="img-responsive" alt="" style="margin-left:30%;">
                @endif

                @if(Auth::check())
                    @if($status)
                        <form method="post" action="/Naoler?id={{ $livro->id }}">
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="form-control" id="cf-submit" name="submit" style="background:#c03d39; color:#FFFFFF; width:100%; margin-top:5%;">Marcar como não lido</button>
                        </form>    
                    @else
                    <form method="get" action="/ler/{{ $livro->id }}">
                        @csrf
                            <button type="submit" class="form-control" id="cf-submit" name="submit" style="background:green; color:#FFFFFF; width:100%; margin-top:5%;">Marcar como lido</button>
                        </form> 
                    @endif
                @endif
            </div>

            <div class="col-md-9 col-sm-9" style="text-align:left;">
                <p>
                <strong>Descrição:</strong>
                @if(isset($livro->volumeInfo->description))
                    {{ print_r($livro->volumeInfo->description) }}
                @endif
                </p>
                <p>
                <strong>Autor:</strong>
                @if(isset($livro->volumeInfo->authors[0]))
                    {{ print_r($livro->volumeInfo->authors[0]) }}
                @endif
                </p>
                <p>
                <strong>Editora:</strong>
                @if(isset($livro->volumeInfo->publisher))
                    {{ print_r($livro->volumeInfo->publisher) }}
                @endif
                </p>
                <p>
                <strong>ISBN:</strong>
                @if(isset($livro->volumeInfo->industryIdentifiers[1]->identifier))
                    {{ print_r($livro->volumeInfo->industryIdentifiers[1]->identifier) }}
                @endif
                </p>
                <p>
                <strong>Categoria:</strong>
                @if(isset($livro->volumeInfo->categories))
                    {{ print_r($livro->volumeInfo->categories[0]) }}
                @endif
                </p>
            </div> 
        </div>
    </div>
</section>    
@endsection
