<?php

//3936813
$bancoSantander = new \Umbrella\Ya\Boleto\Banco\Santander("3857", "6188974");
$bancoSantander->setIos("0");

$carteira102 = new \Umbrella\Ya\Boleto\Carteira\Santander\Carteira102("2");
$convenioSantander = new \Umbrella\Ya\Boleto\Convenio($bancoSantander, $carteira102, "0033418619006188974");

$boletoSantander = new \Umbrella\Ya\Boleto\Boleto\Santander($sacado, $cedente, $convenioSantander);
$boletoSantander
        ->setLocalPagamento("Pagável em qualquer banco")
        ->setValorDocumento(1.00)
//        ->setDesconto(2.00)
//        ->setOutrasDeducoes(2.00)
//        ->setOutrosAcrescimos(20.00)
        ->setAceite("N")
        ->setQuantidade(1)
        ->setEspecie("Dinheiro")
        ->setNumeroDocumento("2")
        ->setDataVencimento(new DateTime("2013-12-12"))
        ->setInstrucoes(array(
            'Instrucao 01 [vencimento]',
            'Instrucao 02',
            'Instrucao 03'
        ))
        ->getLinhaDigitavel();

echo $twig->render('Santander.html.twig', array(
    'model' => $boletoSantander,
    'barcode' => new \Umbrella\Ya\Boleto\View\Helper\BarcodeCss()
));

echo $twig->render('Real.html.twig', array(
    'model' => $boletoSantander,
    'barcode' => new \Umbrella\Ya\Boleto\View\Helper\BarcodeCss()
));
