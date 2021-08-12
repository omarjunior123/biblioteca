@extends('index')

@section('content')
<!-- HOME -->
<section id="home" class="slider" data-stellar-background-ratio="0.5">
     <div class="container">
          <div class="row">
               <div class="owl-carousel owl-theme">
                    <div class="item item-first">
                         <div class="caption">
                              <div class="col-md-offset-1 col-md-10">
                                   <h1><span style="background:#c03d39; padding:0.3%; opacity:0.8;">Biblioteca Pede.ai</span></h1>
                              </div>
                         </div>
                     </div>
               </div>
          </div>
     </div>
</section>   

<!-- LIVROS -->
<section id="news" class="livros" data-stellar-background-ratio="2.5">
     <div class="container">
          <div class="row">
               <div class="col-md-12 col-sm-12">
                    <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                         <h2>Nossa biblioteca</h2>
                    </div>
               </div>

               <div class="col-md-12 col-sm-12"  style="margin-bottom:2%; text-align:center;">
                    <form method="post" action="/search">
                         @csrf
                         <div class="col-md-6 col-sm-6">         
                              <input type="text" class="form-control" id="livro" name="livro" placeholder="Pesquisar livro"/>
                         </div>
                         <div class="col-md-2 col-sm-2">  
                              <button type="submit" class="form-control" id="cf-submit" name="submit" style="background:green; color:#FFFFFF;">Pesquisar livros</button>
                         </div>
                    </form>
               </div>
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
                                   <a href="/livro?id={{ $livro->id }}"><button type="submit" class="form-control" id="cf-submit" name="submit" style="background:green; color:#FFFFFF; width:80%; margin-left:10%; margin-top:-5%;">Saiba mais...</button>
                                   </a>
                              </div><br/>
                         </div>
                    </div>
               @endforeach
               @else
                    <p>Resultado não encontrado. Tente novamente</p>
                @endif
          </div>
     </div>
</section>
@endsection