<?php
header("Content-type: text/javascript; charset: UTF-8");
echo '
const $_accept = function (){
    let mcuc1d1 = new FormData();
    mcuc1d1.append("_token", "'.csrf_token().'");
    f.r({
        d:function (resp_x){
            $_i = resp_x;
            $_c.config = resp_x;
        }
    },{
        x:mcuc1d1,
        m:"post",
        t:"json",
        target:"'.route('auth').'"
    });
};
';
