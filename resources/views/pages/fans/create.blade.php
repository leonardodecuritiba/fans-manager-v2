@extends('layouts.template')
@section('style_content')
    {!! Html::style('public/css/signin.css') !!}
    {!! Html::style('public/css/estilos.css') !!}
    {!! Html::style('public/vendors/intl-tel-input/css/intlTelInput.css') !!}

    {!! Html::script('public/js/jquery.min.js') !!}
    {!! Html::script('public/vendors/intl-tel-input/js/intlTelInput.js') !!}
    {!! Html::script('public/vendors/jquery.maskedinput-master/src/jquery.maskedinput.js') !!}

@endsection
@section('page_content')

    @if(count($errors)>0)
        <script>
            alert('Por favor corrija os seguintes erros:\n\n' +
                    '@foreach ($errors->all() as $error)' +
                    '{{ ' - '.$error.'\n' }}' +
                    '@endforeach');
        </script>
    @endif
<?php $Estados = array("AC"=>"Acre", "AL"=>"Alagoas", "AM"=>"Amazonas", "AP"=>"Amapá","BA"=>"Bahia","CE"=>"Ceará","DF"=>"Distrito Federal","ES"=>"Espírito Santo","GO"=>"Goiás","MA"=>"Maranhão","MT"=>"Mato Grosso","MS"=>"Mato Grosso do Sul","MG"=>"Minas Gerais","PA"=>"Pará","PB"=>"Paraíba","PR"=>"Paraná","PE"=>"Pernambuco","PI"=>"Piauí","RJ"=>"Rio de Janeiro","RN"=>"Rio Grande do Norte","RO"=>"Rondônia","RS"=>"Rio Grande do Sul","RR"=>"Roraima","SC"=>"Santa Catarina","SE"=>"Sergipe","SP"=>"São Paulo","TO"=>"Tocantins") ?>
<div class="container-text">
    <?php echo empty($mensagem) ? "" : "<p class='mensagemSaida textoAviso'>$mensagem</p>" ?>

    <div>
        <h1 class="tituloPrincipal" style="text-align: left">Cadastro do <br/><span class="textoAmarelo">Torcedor</span>
        </h1>
        <p style="margin-left: 20px">
            Os campos com <b class="textoAmarelo">(*)</b> são obrigatórios o preenchimento.
        </p>
    </div>
    <form action="{{route('fans.store')}}" method="post" id="cadastroForm">
        {{--1:Cruzeiro--}}
        <input type="hidden" name="club_id" value="1"/>
        <?php echo Form::token();?>
        <div class="caixa2">
            <div class="espacador">
                <label>
                    <span class="textoAmarelo">Nome*:</span><br/>
                    <input type="text" name="name" class="deslogado.select"
                           value="{{Request::has('name')?Request::get('name'):old('name')}}"/>
                </label>

                <label class="naoQuebrar meio margem">
                    <span class="textoAmarelo">CPF*:</span><br/>
                    <input type="text" name="cpf" id="cpf" class="obrigatorio" maxlength="11"
                           value="{{Request::has('cpf')?Request::get('cpf'):old('cpf')}}"/>
                </label>

                <label class="naoQuebrar meio">
                </label>

                <label class="naoQuebrar" style="
                    width: 125px;
                ">
                    <span class="textoAmarelo">Sexo:</span><br/>
                    <select name="sex">
                        <option value="0" {{(Request::has('sex') && (Request::get('sex') == 0))?'selected':''}}>
                            Feminino
                        </option>
                        <option value="1" {{(Request::has('sex') && (Request::get('sex') == 1))?'selected':''}}>
                            Masculino
                        </option>
                    </select>
                </label>

                <label class="naoQuebrar" style="
                    width: 125px;
                    margin-left: 30px;
                ">
                    <span class="textoAmarelo">Data de Nascimento*:</span><br/>
                    <input type="text" name="birthday" id="dataNascimento" class="obrigatorio"
                           value="{{Request::has('birthday')?Request::get('birthday'):old('birthday')}}"/>
                </label>
                <label class="naoQuebrar meio margem">
                    <span class="textoAmarelo">Telefone:</span><br/>
                    <input type="text" name="cellphone" id="telefone" class="intl-number"
                           style="padding-left: 50px; width: 180px; height: 33px; color: #26587B"
                           value="{{Request::has('cellphone')?Request::get('cellphone'):old('cellphone')}}"/>
                    <span id="valid-msg" class="hide">✓ Válido</span>
                    <span id="error-msg" class="hide">Número inválido</span>
                    <script>
                        $("#telefone").intlTelInput({
                            onlyCountries: ["br", "us"],
                            initialCountry: "br",

                            utilsScript: "http://localhost/fansmanager/public/js/intl-tel-input/js/utils.js" // just for formatting/placeholders etc
                        });

                    </script>
                </label>
            </div>
            <div class="espacador">
                <label class="naoQuebrar" style="
                    width: 237px;
                    margin-right: 15px;
                ">
                    <span class="textoAmarelo">Login*:</span><br/>
                    <input type="text" name="login" id="login" class="obrigatorio"
                           value="{{Request::has('login')?Request::get('login'):old('login')}}"/>
                </label>

                <label class="naoQuebrar" style="
                    width: 80px;
                ">
                    <span class="textoAmarelo">Email*:</span><br/>
                    <input type="text" name="email" id="email" class="obrigatorio"
                           value="{{Request::has('email')?Request::get('email'):old('email')}}"/>
                </label>
                <div class="larguraDiferente">
                    <label>
                        <span class="textoAmarelo">Senha*:</span><br/>
                        <input type="password" name="password" id="senha" class="obrigatorio"/>
                    </label>
                    <label>
                        <span class="textoAmarelo">Repetir a Senha*:</span><br/>
                        <input type="password" name="password_confirmation" id="confirmaSenha" class="obrigatorio"/>
                    </label>
                </div>
            </div>
        </div>
        <div class="caixa2">
            <div class="desgruda containerDados">

                <label class="naoQuebrar" style="
                    width: 237px;
                    margin-right: 15px;
                ">
                    <span class="textoAmarelo">Endereço:</span><br/>
                    <input type="text" name="address" id="endereco"
                           value="{{Request::has('address')?Request::get('address'):old('address')}}"/>
                </label>

                <label class="naoQuebrar" style="
                    width: 80px;
                ">
                    <span class="textoAmarelo">Número:</span><br/>
                    <input type="text" name="number" id="numero"
                           value="{{Request::has('number')?Request::get('number'):old('number')}}"/>
                </label>

                <label>
                    <span class="textoAmarelo">Complemento:</span><br/>
                    <input type="text" name="complement"
                           value="{{Request::has('complement')?Request::get('complement'):old('complement')}}"/>
                </label>

                <label class="naoQuebrar meio*">
                    <span class="textoAmarelo">CEP:</span><br/>
                    <input type="text" name="zipcode" id="cep"
                           value="{{Request::has('zipcode')?Request::get('zipcode'):old('zipcode')}}"/>
                </label>

                <label class="naoQuebrar" style="
                    width: 245px;
                    margin-right: 15px;
                ">
                    <span class="textoAmarelo">Cidade:</span><br/>
                    <input type="text" name="city" id="cidade"
                           value="{{Request::has('city')?Request::get('city'):old('city')}}"/>
                </label>

                <label class="naoQuebrar">
                    <span class="textoAmarelo">Estado:</span><br/>
                    <select name="state" id="uf">
                        @foreach($Estados as $ind => $estado)
                            <option value="{{$ind}}" {{(Request::has('state') && (Request::get('state') == $ind))?'selected':''}}>{{$estado}}</option>
                        @endforeach
                    </select>
                </label>
                <label>
                    <span class="textoAmarelo">Termos de uso:</span><br/>
                    <textarea cols="50" readonly>{{include("public/extras/termos-de-uso.txt")}}</textarea>
                </label>

                <label>
                    <input type="checkbox" name="aceito" value="1" class="obrigatorio"/>
                    <span class="textoAmarelo">Aceito*</span>
                    <!-- Ao realizar o cadastro eu aceito os termos de uso. -->
                </label>
                <hr>
                <input type="submit" class="botaoBorda" value="Enviar"
                       value="<?php echo isset($post) && isset($post['botaoBorda']) ? $post['botaoBorda'] : ""?>"/>
            </div>
        </div>
    </form>

</div>
<script type="text/javascript">
	jQuery(function($){
		$("#dataNascimento").mask("99/99/9999");
		$("#cep").mask("99999-999");
		$("#cpf").mask("999.999.999-99");
		$("#numero").mask("9?9999");
		$("#rg").mask("99.999.9?99-**");
		$("#phone").mask("(99) 9999-9999?9");
		$("#celular").mask("(99) 99999999?9");
	});


	/**
	* This method is used to convert the entered phone number to international format and submit this data as POST data.
	* To achieve this, a new (hidden) field is added which replaces the original field and holds the calculated international
	* phone number.
	*/
	$("form").submit(function() {
	 
	    // Lookup all intl-number fields
	    $(".intl-number").each(function(index) {
	 
	        var numberIntl = $(this).intlTelInput("getNumber");
	        var elementId = $(this).attr('id');
	        var elementName = $(this).attr('name');
	 
	        // Was the form already submitted? Store the original field name for referal use. This field also indicates,
	        // if the form was already submitted (and for example submission was stopped by another script). If so we
	        // don´t add the hidden field but we update the field value bellow.
	        if(!$(this).data('telefone')) {
	            $(this).data('telefone',elementId);
	 
	            // Rename the original field to avoid duplicate field names in the form
	            $(this).attr('name',elementId);
	 
	            // Add a new element with the intl value that replaces the original one.
	            $(this).parent().parent().append('<input type="hidden" name="'+elementId+'" />');
	 
	        }
	 
	        // Update the value of the hidden field.
	        $(this).parent().parent().find('input[name="'+$(this).data('telefone')+'"]').val(numberIntl);
	 
	    });
	 
	});
	
</script>
@endsection