<?php
    include "classes/Futebol.php";

    $fute1 = new Fultebol("Neymar","Al Haly");
    $fute2 = new Fultebol("Mbape","PSG");
    $fute3 = new Fultebol("Vini JR","Real Madrid");
    $fute4 = new Fultebol("Salah","Liverpool");
    $fute5 = new Fultebol("Romario","Flamengo");

    $fute1->SetSalario(2500);
    $fute2->SetSalario(25000);
    $fute3->SetSalario(500);
    $fute4->SetSalario(250000);
    $fute5->SetSalario(30000);

    echo "<br>O jogador $fute1->jogador que joga no time $fute1->time e ganha atualmente R$ ".$fute1->GetSalario();
    echo "<br>O jogador $fute2->jogador que joga no time $fute2->time e ganha atualmente R$ ".$fute2->GetSalario();
    echo "<br>O jogador $fute3->jogador que joga no time $fute3->time e ganha atualmente R$ ".$fute3->GetSalario();
    echo "<br>O jogador $fute4->jogador que joga no time $fute4->time e ganha atualmente R$ ".$fute4->GetSalario();
    echo "<br>O jogador $fute5->jogador que joga no time $fute5->time e ganha atualmente R$ ".$fute5->GetSalario();


    
    $bonus1 = new bonus("Neymar","Al Haly","6000");
    $bonus2 = new bonus("Mbape","PSG","1000");
    $bonus3 = new bonus("Vini JR","Real Madrid","600000");
    $bonus4 = new bonus("Salah","Liverpool","60030");
    $bonus5 = new bonus("Romario","Flamengo","80000");

    $bonus1->SetSalario(800000);
    $bonus2->SetSalario(15000);
    $bonus3->SetSalario(1000000);
    $bonus4->SetSalario(10000);
    $bonus5->SetSalario(7800000);

?>