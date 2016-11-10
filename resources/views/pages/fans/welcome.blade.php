@extends('layouts.template')
@section('style_content')
    {!! Html::style('public/css/main.css') !!}
@endsection
@section('page_content')
    <div class="bg">
        <div class="centralizado">
            <main>
                <section class="center-content">

                    <h1>{{$content['content']['name']}}</h1>

                    <p>
                        em breve você poderá contribuir com o Cruzeiro, através de campanhas selecionadas pelo Pacto de
                        União Celeste.
                        Além de ter acesso a promoções exclusivas, compra de produtos personalizados, notícias e acesso
                        a todas as arrecadações realizadas de forma simples e transparente.
                        É você jogando junto com o Cruzeiro
                    </p>
                </section>
            </main>

        </div>
    </div>
@endsection
