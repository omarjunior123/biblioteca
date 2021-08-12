@extends('index')

@section('content')
<section id="news" class="livros" data-stellar-background-ratio="2.5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                    <h2>Meus Livros</h2>
                </div>
            </div>
            
            @foreach($lista as $livro)
                <div class="col-md-4 col-sm-6" style="height:580px;">
                    <div class="news-thumb wow fadeInUp" data-wow-delay="0.6s" ><br/>
                        <a href="">
                            <?php if(isset($livro->volumeInfo->imageLinks))
                                $img = $livro->volumeInfo->imageLinks->thumbnail;
                            else
                                $img = 'images/sem_capa.jpg';
                            ?>
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
        </div>
    </div>
</section>           
@endsection