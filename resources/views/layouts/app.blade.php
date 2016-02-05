<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
        <!-- Styles -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">

    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>


                    <a class="navbar-brand" href="#">Youitems.com</a>

                </div>
                <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">GR</a></li>
                        <li><a href="#about">RU</a></li>
                    </ul>

                    <ul class="nav navbar-nav center-element">
                        <li><a href="#about" class="telephone"><span class="glyphicon glyphicon-earphone"></span> 0899991045</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{URL::asset('login')}}"><span class="glyphicon glyphicon-user"></span> Влез</a></li>
                        <li><a href="{{URL::asset('register')}}"><span class="glyphicon glyphicon-pencil"></span> Регистрация</a></li>                     
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <nav class="navbar navbar-default mynav navbar-blue" role="navigation">
            <div class="container nav-container">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".test1" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>


                </div>

                <div id="links" class="navbar-collapse collapse test1" aria-expanded="false" style="height: 1px;">
                    <ul class="nav navbar-nav second-nav">
                        <li ><a href="#">СТОКИ ЗА ДОМА</a></li>
                        <li><a href="#about">ЗДРАВЕ</a></li>
                        <li><a href="#about">СПОРТ</a></li>
                        <li><a href="#about">СЕЗОННИ АРТИКУЛИ</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right second-nav">
                        <li><a href="">ЗА ПОРЪЧКА </a></li> 
                        <li><a href=""><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
                        <li><a href=""><div class="numberCircle">1</div></a></li>  
                    </ul>


                </div><!--/.nav-collapse -->
            </div>
        </nav>

        @yield('content')
        

        <!-- JavaScripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script type="text/javascript">
$(window).load(function () {
    $('#myCarousel').carousel({
        interval: 3000
    });
});
$('.carousel').carousel();

        </script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=1459902027590468";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

    </body>
</html>
