<?php

/**
 * Import users from csv to wordpress
 *
 * 1. Load the users file
 * 2. Por cada linha:
 * 2.a) Partir pelo separador, o que te dá os campos
 * 2.b) Fazer um select a verificar se o utilizador já existe -
        se existir passa à frente para nova linha
 * 2.c) Inserir os dados no wp_users e recolher o user_id que foi inserido
 * 2.d) Inserir os dados no wp_meta com o user_id que foi registado
 * 2.e) Adicionar um ao contador de users com sucesso
 * 2.f) Apagar os registos inseridos (isto enquanto ainda se está em test mode)
 * 2.g) Se ocorrer um erro, mandar para o ecrã em que linha ocorreu o erro para ser averiguado
 * 2.h) Activar a função de update profile do Wordpress por cada user
 */

require "library/csv.fn.php";



$folder = "pieces/";

echo $folder ;

//if ($handle = opendir($folder)) {
//
//    while (false !== ($entry = readdir($handle))) {
//
//        if ($entry != "." && $entry != "..") {
//            
//            csvToArray($folder.$entry);
//            
//        }
//    }
//
//    closedir($handle);
//}


