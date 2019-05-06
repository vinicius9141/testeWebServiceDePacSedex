<?php



    $cep_origem = "85930000";     // CEP de origem do produto, coloquei um CEP de SP para testes
    $cep_destino = $_POST['cep']; // CEP do cliente esta sendo passado via POST




    // Dados da encomenda a ser enviada
    $peso          = 2;
    $valor         = 100;
    $tipo_do_frete = '41106'; //Sedex: 40010   |  Pac: 41106
    $altura        = 6;
    $largura       = 20;
    $comprimento   = 20;


    $url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";
    $url .= "nCdEmpresa=";
    $url .= "&sDsSenha=";
    $url .= "&sCepOrigem=" . $cep_origem;
    $url .= "&sCepDestino=" . $cep_destino;
    $url .= "&nVlPeso=" . $peso;
    $url .= "&nVlLargura=" . $largura;
    $url .= "&nVlAltura=" . $altura;
    $url .= "&nCdFormato=1";
    $url .= "&nVlComprimento=" . $comprimento;
    $url .= "&sCdMaoProria=n";
    $url .= "&nVlValorDeclarado=" . $valor;
    $url .= "&sCdAvisoRecebimento=n";
    $url .= "&nCdServico=" . $tipo_do_frete;
    $url .= "&nVlDiametro=0";
    $url .= "&StrRetorno=xml";


    $xml = simplexml_load_file($url);

    $frete =  $xml->cServico;

    echo "<h1>Valor PAC: R$ ".$frete->Valor."<br />Prazo: ".$frete->PrazoEntrega." dias <br /><br /><br /></h1>";



      //cadastro via Sedex

      // Dados da encomenda a ser enviada
      $peso          = 2;
      $valor         = 100;
      $tipo_do_frete = '40010'; //Sedex: 40010   |  Pac: 41106
      $altura        = 6;
      $largura       = 20;
      $comprimento   = 20;



      $url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";
      $url .= "nCdEmpresa=";
      $url .= "&sDsSenha=";
      $url .= "&sCepOrigem=" . $cep_origem;
      $url .= "&sCepDestino=" . $cep_destino;
      $url .= "&nVlPeso=" . $peso;
      $url .= "&nVlLargura=" . $largura;
      $url .= "&nVlAltura=" . $altura;
      $url .= "&nCdFormato=1";
      $url .= "&nVlComprimento=" . $comprimento;
      $url .= "&sCdMaoProria=n";
      $url .= "&nVlValorDeclarado=" . $valor;
      $url .= "&sCdAvisoRecebimento=n";
      $url .= "&nCdServico=" . $tipo_do_frete;
      $url .= "&nVlDiametro=0";
      $url .= "&StrRetorno=xml";


      $xml = simplexml_load_file($url);

      $frete =  $xml->cServico;

      echo "<h1>Valor SEDEX: R$ ".$frete->Valor."<br />Prazo: ".$frete->PrazoEntrega." dias</h1>";







 ?>
