@extends('layouts.template')
@section('style_content')
    {!! Html::style('public/css/main.css') !!}
@endsection
@section('page_content')
    <div class="bg">
        <div class="centralizado">
            <header>
                <section class="center-content">
                    <div class="login">
                        <p><span class="highlight">Acesse</span> sua conta</p>
                        <form id="loginForm" class="form-holder">
                            <input type="text" name="login" placeholder="Login">
                            <input type="password" name="senha" placeholder="Senha">
                            <input type="submit" disabled value="Entrar">
                            <p>Esqueceu sua <a href="{{ url('/password/reset') }}" class="highlight">senha?</a></p>
                            <a href="{{route('fans.create')}}">Cadastre-se</a>
                        </form>
                    </div>
                </section>
            </header>

            <main>
                <section class="center-content">
                    <div style="margin-top: 50px;">
                        <img src="{!! asset('public/images/team_logo.png') !!}"
                             style="display: block; margin: 0 auto; width: 700px">
                    </div>

                    <section class="youtube-holder">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/6cqhQIGEB2U" frameborder="0"
                                allowfullscreen></iframe>
                    </section>

                    <h1>Chegou a hora de <span class="highlight">jogar junto!</span></h1>

                    <p>
                        Chegou a hora de mostrar a força da nossa torcida.</br> Contribua com o Cruzeiro e vamos fazer
                        dele um time muito mais forte.
                    </p>

                    <div style="margin-top: 50px;">
                        <img src="{!! asset('public/images/logo_group.png') !!}"
                             style="display: block; margin: 0 auto;">
                    </div>

                </section>
            </main>

        </div>
    </div>
@endsection