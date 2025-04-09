    // Executar Mascáras

    //Define o Objeto e chama a função
    function mascara(o, f) {

        objeto = o;
        funcao = f;
        setTimeout("executaMascara()", 1);

    }


    function executaMascara() {
        objeto.value=funcao(objeto.value);
    }

    //Mascaras

    //Mascara do Telefone

    function telefone(InputValue) {
        //parenteses em volta dos dois primeiros digitos
        InputValue = InputValue.replace(/\D/g,"");

        InputValue = InputValue.replace(/^(\d\d)(\d)/g,"($1)$2");
        InputValue=InputValue.replace(/(\d{4})(\d)/,"$1-$2");

        return InputValue
    }

    //Mascara do RG e CPF
    function Cpf(InputValue){
        InputValue=InputValue.replace(/\D/g,""); // remove o que não é numero

        InputValue=InputValue.replace(/(\d{3})(\d)/, "$1.$2") ;// Coloca um ponto após o terceiro o digito e o quarto

        InputValue=InputValue.replace(/(\d{3})(\d)/, "$1.$2"); // Coloca um ponto após o sexto o digito e o setimo

        InputValue=InputValue.replace(/(\d{3})(\d{1,2})$/, "$1-$2"); 

        return InputValue;
    }

    //Mascara do CEP

    function Cep(InputValue) {
        InputValue=InputValue.replace(/\D/g,""); 
        
        InputValue=InputValue.replace(/(\d{5})(\d{1,3})$/,"$1-$2");

        InputValue=InputValue.replace(/(\d{2})(\d)/,"$1.$2");

        return InputValue;
        
    }

    function Str(InputValue) {
        InputValue = InputValue.replace(/^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/);

        return InputValue;
    }

    function Nbm(InputValue) {

        InputValue = InputValue.replace(/\D/g,"");

        return InputValue;
    }



    function Domin(InputValue) {
        InputValue = InputValue.replace(/^[a-z0-9.]+@[a-z0-9]+\.[a-z]+(\.[a-z]+)?$/i);

        return InputValue;
    }


    function Rg(InputValue) {
        InputValue=InputValue.replace(/\D/g,"");

        InputValue=InputValue.replace(/(\d{2})(\d)/, "$1.$2") ;

        InputValue=InputValue.replace(/(\d{3})(\d)/, "$1.$2");

        InputValue=InputValue.replace(/(\d{3})(\d{1,2})$/, "$1-$2"); 

        return InputValue;
    }
    