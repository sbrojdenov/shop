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
                    <a href="#"><h3>Thumbnail label</h3></a>
                    <h3 class="price ">Цена : 25,5 лв.</h3>
                    <a href = "#" class = "btn btn-primary pull-right" role = "button">
                        <span class="glyphicon glyphicon-shopping-cart"> </span> Купи сега
                    </a>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Подобни продукти</div>
                <div class="panel-body">
                    <div class="thumbnail">
                        <img class="group list-group-image" src="http://placehold.it/400x250/000/fff" alt="">
                        <div class="caption">
                            <h4 class="group inner list-group-item-heading">
                                Product title</h4>
                            <p class="group inner list-group-item-text">
                                Product description... Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <p class="lead">
                                        $21.000</p>
                                </div> 
                            </div>
                        </div>
                    </div>
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
