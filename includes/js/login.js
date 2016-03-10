$(document).ready(function(){

    var hp_orc = 20;
    var hp_humano = 12;
    var nm_humano = '';
    var nm_orc = '';
    var ordem = [];
    var fim = true;

    function Mensagem(texto){
        $(".alert-info").append(texto);
    }

    function Rolardados(faces){
        return Math.floor((Math.random() * faces) + 1);
    }

    function Iniciativa(){

        var rol_h = 0;
        var rol_o = 0;

        while(rol_h == rol_o){
            rol_h = Rolardados(20) + 2;
            rol_o = Rolardados(20);
        }
        Mensagem('Rolando a iniciativa<br>');
        if(rol_h > rol_o){
            Mensagem(nm_humano + ' ganhou a iniciativa ('+rol_h+' > '+rol_o+')<br>');
            ordem = [0,1]
            return false;
        }else{
            Mensagem(nm_orc + ' Ganhou a Iniciativa('+rol_o+' > '+rol_h+')<br>');
            ordem = [1,0]
            return false;
        }
        Mensagem('Empatou ('+rol_h+' = '+rol_o+')<br>');
    }

    function InicializaBatalha(){
        fim = true;
        nm_humano = '';
        nm_orc = '';
        nm_humano = $("#selHumano").val();
        nm_orc = $("#selOrc").val();
        hp_orc = 20;
        hp_humano = 12;
        $(".alert-info").html('');
        Mensagem('<b>Come&ccedil;ou a Batalha</b><br>');
        while(fim === true){
            Iniciativa();
            ordem.forEach(function(val){
                if(CalculaAcerto(val) === true){
                    if(CalculaDano(val) === true){
                        fim = false;
                    }
                }

            });
        }

    }

    function CalculaAcerto(atacante){
        ac = 0;
        def = 0
        if(fim === false){
            return false;
        }
        if(atacante == 0){
            ac = Rolardados(20) + 4;
            def = Rolardados(20);
            if(ac > def){
                Mensagem(nm_humano + ' acertou o ataque!<br>');
                return true;
            }else{
                Mensagem(nm_humano + ' errou o  ataque<br>');
                return false;
            }
        }else{
            ac = Rolardados(20) + 1;
            def = Rolardados(20) + 3;
            if(ac > def){
                Mensagem(nm_orc + ' Acertou o ataque<br>');
                return true;
            }else{
                Mensagem(nm_orc + ' Errou o ataque<br>');
                return false;
            }
        }

    }

    function CalculaDano(atacante){
        dano = 0;
        if(atacante == 0){
            dano = Rolardados(6) + 1;
            hp_orc = hp_orc - dano;
            if(hp_orc <= 0){hp_orc = 0;}
            Mensagem(nm_orc + ' Levou '+dano+' dano HP: '+hp_orc+'<br>');
        }else{
            dano = Rolardados(8) + 2;
            hp_humano = hp_humano - dano;
            if(hp_humano <= 0){hp_humano = 0;}
            Mensagem(nm_humano + ' levou '+dano+' dano HP: '+hp_humano+'<br>');
        }
        if(hp_humano <=0 || hp_orc <=0){
            Mensagem('<b>Fim da batalha</b><br>');
            if(hp_humano > 0){
                Mensagem(nm_humano + ' ganhou<br>');
            }else{
                Mensagem(nm_orc + ' ganhou<br>');
            }
            return true;
        }else{
            return false;
        }
    }

    $("#btnLuta").click(function(){
        InicializaBatalha();
    });


});