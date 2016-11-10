<html>
    Olá, <b>{{$fan->name}}</b>
    <br>
    Clique no link abaixo para validar seu cadastro:
    <br>
    <br>
    <a href="{{route('validar.fans',[$id,$token])}}">Clique Aqui!</a>

</html>