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
                        @if (Auth::guest())
                            <p><span class="highlight">Acesse</span> sua conta</p>
                            <form id="loginForm" class="form-holder" method="POST" action="{{ url('/logar') }}">
                                {{ csrf_field() }}
                                <input type="text" name="username" value="{{ old('username') }}" placeholder="Login"
                                       autofocus required>
                                <input id="password" type="password" name="password" placeholder="Senha" required>
                                <input type="submit" value="Entrar">
                                <p>Esqueceu sua <a href="{{ url('/password/reset') }}" class="highlight">senha?</a></p>
                                <a href="{{route('fans.create')}}">Cadastre-se</a>
                            </form>
                            <a href="{{ url('/') }}">Home</a>
                        @else
                            <p>{{ Auth::user()->username }} <span class="highlight">Logado</span></p>
                            <p><a href="{{ url('/logout') }}" class="highlight">Sair</a></p>
                        @endif
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