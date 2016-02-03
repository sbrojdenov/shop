@extends('layouts.app')
@section('content')
<div class="container">
    <div class = "row">
        <div class = "col-md-7">
            <img class="img-responsive" src="http://placehold.it/600x500" alt="Chania">
        </div>
        <div class = "col-md-5">
            <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="#"><h3>Thumbnail label</h3> </a>
                    <h3 class="price ">Цена : 25,5 лв.</h3>
                    <a href = "#myModal" class = "btn btn-primary pull-right" role = "button" data-toggle="modal" data-target="#myModal">
                        <span class="glyphicon glyphicon-shopping-cart"> </span> Купи сега
                    </a>

                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Подобни продукти</div>
                <div class="panel-body">
                    <ul class = "list-group">
                        <li  class = "list-group-item"> <a href=""><img class="img-responsive" src="http://placehold.it/50x50" alt=""></a><div class="text-cont"><a href=""> Free Domain Name Registration</a></div></li>
                        <li class = "list-group-item"> <a href=""><img class="img-responsive" src="http://placehold.it/50x50" alt=""></a><div class="text-cont"><a href=""> Free Domain Name Registration</a></div></li>                    
                    </ul>
                </div>
            </div>
        </div>
        <div class = "row">
            <div class = "col-md-7">

                <p class="product-paragraph"> Sia e едно от най-значимите имена в света на музикалната индустрия. Тя е удивително продуктивен хит-мейкър и текстописец, създала някои от най-успешните проекти през последните години. Само през 2013-та година, тя написва песни за артисти като Риана (Diamonds), Кейти Пери (Double Rainbow</p>

            </div>
        </div>
    </div>

 
</div>

@endsection
