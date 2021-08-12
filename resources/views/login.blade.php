@extends('index')

@section('content')
<section id="appointment" class="cadastro" data-stellar-background-ratio="3">
     <div class="container">
          <div class="row">
               @if(session('danger'))
                    <div class="alert alert-danger">
                         {{ session('danger') }}
                    </div>
               @endif  

               <div class="col-md-12 col-sm-12">
                    <form id="appointment-form" role="form" method="post" action="/auth">
                         @csrf
                         <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                              <h2>Realizar Login</h2>
                         </div>

                         <div class="wow fadeInUp" data-wow-delay="0.8s">                              
                              <div class="col-md-6 col-sm-6">
                                   <label for="email">E-mail</label>
                                   <input type="email" class="form-control" id="email" name="email" placeholder="Seu E-mail" value="{{ old('email')}} ">
                              </div>

                              <div class="col-md-6 col-sm-6">
                                   <label for="name">Senha</label>
                                   <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
                              </div>

                              <div class="col-md-6 col-sm-6">
                                   <button type="submit" class="form-control" id="cf-submit" name="submit">Logar</button>
                              </div>
                         </div>
                    </form>
               </div>
          </div>
     </div>
</section>
@endsection