<?php


$password = readline("Inserisci la password: ");

function check_password(string $password) {
$password_verificata = false;
if (verifica_lunghezza_password($password) && verifica_numero($password) && verifica_maiuscolo($password) && verifica_carattere_speciale($password)) {
    $password_verificata = true;
    echo "Password accettata \n";
}
else {
    echo "Password formalmente non valida \n";
}
return $password_verificata;
}


function verifica_lunghezza_password($password) {
    if (strlen($password) < 8) {
        return false;
    }
    else {
        return true;
    }
}

function verifica_numero ($password){
    $presenza_numero = false;

    for ($i = 0; $i < strlen($password); $i++) {
        if (is_numeric($password[$i])) {
            $presenza_numero = true;
        }
    }
    return $presenza_numero;
}

function verifica_maiuscolo ($password) {
    $presenza_maiuscolo = false;

    for ($i = 0; $i < strlen($password); $i++) {
        if (ctype_upper($password[$i])) {
            $presenza_maiuscolo = true;
        }
    }
    return $presenza_maiuscolo;
}

function verifica_carattere_speciale ($password){
    $caratteri_speciali = ["!", "@", "#", "$", "%", "&", "*"];
    $presenza_carattere_speciale = false;

    for ($i = 0; $i < strlen($password); $i++) {
        if (in_array($password[$i], $caratteri_speciali)) {
            $presenza_carattere_speciale = true;
        }
    }
    return $presenza_carattere_speciale;
}

while (!check_password($password)) {
    $password = readline("Inserisci la password: ");
}