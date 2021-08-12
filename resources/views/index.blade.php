<!DOCTYPE html>
<html lang="pt-br">
<head>
     <title>:: Biblioteca Pede.ai ::</title>
<!--
Template 2098 Health
http://www.tooplate.com/view/2098-health
-->
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/owl.carousel.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/tooplate-style.css">
  

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
     <section class="preloader">
          <div class="spinner">
               <span class="spinner-rotate"></span>
          </div>
     </section>


     <section class="navbar navbar-default navbar-static-top" role="navigation">
          <div class="container">
               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>
               </div>

               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="/" class="smoothScroll">Home</a></li>
                         <li><a href="/avancado" class="smoothScroll">Pesquisa avançada</a></li>
                         @if(!Auth::check())
                         <li class="appointment-btn"><a href="/cadastro" style="background:#ad4444;">Cadastrar</a></li>
                         <li class="appointment-btn"><a href="/login" style="background: #49a7af;">Entrar</a></li>
                         @else
                         <li class="appointment-btn"><a href="/meuslivros" style="background:#769a55;">Meus Livros</a></li>
                         <li class="appointment-btn"><a href="/logout" style="background:#c03d39;">Logout</a></li>
                         @endif
                         
                    </ul>
               </div>
          </div>
     </section>

     @yield('content')

     <footer data-stellar-background-ratio="5">
          <div class="container">
               <div class="row">
                    <div class="col-md-12 col-sm-12 border-top">
                         <div class="col-md-4 col-sm-6">
                              <div class="copyright-text">
                                   <p>Copyright &copy; 2021 <br/>:: Todos os direitos reservados :: Biblioteca Pede.ai</p>
                              </div>
                         </div>
                         <div class="col-md-2 col-sm-2 text-align-center">
                              <div class="angle-up-btn">
                                  <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                              </div>
                         </div>
                    </div>

               </div>
          </div>
     </footer>
     
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>
