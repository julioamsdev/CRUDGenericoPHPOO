<?php

/* Exemplos */

# Inclui a função Autoload
include('autoload.php');

# Instancia a classe Cruc()
$pdo = new Crud();

/** EXEMPLO DE CONSULTA DE TODAS AS INFORMAÇÕES DE UMA TABELA */

// Consulta as informações da tabela "mh_users"	

$exemplo1 = $pdo->read("mh_users");
$list1 = $exemplo1->fetch(PDO::FETCH_OBJ);

print_r($list1);

echo "<br><hr>";

// Consulta as informações de um determinado item da tabela "mh_users" pelo ID
$exemplo2 = $pdo->read("mh_users", null, "id_user = '1'");
$list2 = $exemplo2->fetch(PDO::FETCH_OBJ);

echo $list2->nome;

/** EXEMPLO DE INSERT NA BASE DE DADOS */

// Array com os dados a serem inseridos na tabela "mh_users"
$array = array(
	'nome' 		=> 'Julio Augusto',
	'email'		=> 'exemplo@email.com',
	'telefone'	=> '(00) 0000-0000'
);

$insert = $pdo->insert("mh_users", $array);

/** EXEMPLO DE UPDATE NA BASE DE DADOS */

// Array com os dados a serem atualizados na tabela "mh_users"
$arrayDados = array(
	'nome'		=> 'Novo Nome',
	'email'  	=> 'novo@email.com',
	'telefone'  => '(00) 1111-1111'
);

$update = $pdo->update("mh_users", $arrayDados, "id_user = '1'");

/** EXEMPLO DE DELETE */

$delete = $pdo->delete("mh_users", "id_user = '1'");



