<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "123456",
    "papelaria"
);

if($conn){
    echo "Conexão realizada com sucesso!";
}else{
    echo "Erro na conexão: " . mysqli_connect_error();
}

?>