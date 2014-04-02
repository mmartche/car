<h2>Feedback</h2>
<?php
// display form if user has not clicked submit
/*
if (!isset($_POST["enviar"]))
  {
  ?>
  <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
  To: <input type="text" name="to"><br>
  From: <input type="text" name="from"><br>
  Subject: <input type="text" name="subject"><br>
  Message: <textarea rows="10" cols="40" name="message"></textarea><br>
  <input type="submit" name="submit" value="Submit Feedback">
  </form>
  <?php 
  }
  */
  // the user has submitted the form
  
  // Check if the "from" input field is filled out
  if (isset($_POST["enviar"]))
    {
    // $to = 'mmartche@hotmail.com';
    $to = "salete.soares@carsale.com.br; manoel.bezerra@carsale.com.br";
    $from = "Mega Ofertas Carsale <carsale@carsale.com.br>"; // sender
    $subject = 'Proposta campanha '.$_POST[megaOfertaId].' - '.$_POST[modelName].' - '.$_POST[versionName];
    $message = 'Nome: '.$_POST[nome].'
      E-mail: '.$_POST[email].'
      Telefone: ('.$_POST[telefoneddd].') '.$_POST[telefone].'
      Celular: ('.$_POST[celularddd].') '.$_POST[celular].'
      Estado: '.$_POST[unidadeFederativa].'
      Cidade: '.$_POST[cidade].'
      Cor: '.$_POST[cor].'
      Cor alternativa: '.$_POSt[corAlternativa].'

      Quer financiar: '.$_POST[querFinanciar].'
      Valor de entrada do financiamento: R$ '.$_POST[valorEntradaFinanciamento].'
      Quantidade parcelas financiamento: '.$_POST[quantidadeParcelasFinanciamento].'

      Quer dar veículo na troca: '.$_POST[temVeiculoTroca].'
      Modelo do veículo de troca: '.$_POST[modeloVeiculoTroca].'
      Versão do veículo de troca: '.$_POST[versaoVeiculoTroca].'
      Ano do veículo de troca: '.$_POST[anoVeiculoTroca].'
      Kilometragem do veículo de troca: '.$_POST[kilometragemVeiculoTroca].'
      Cor do veículo de troca: '.$_POST[corVeiculoTroca].'
      Cambio do veículo de troca: '.$_POST[cambioVeiculoTroca].'
      Motor do veículo de troca: '.$_POST[motorVeiculoTroca].'
      Quantidade de portas do veículo de troca: '.$_POST[quantidadePortasVeiculoTroca].'

      Opcionais do veículo de troca: 
        Ar Condicionado: '.$_POST[arCondicionado].'
        Direção hidráulica:'.$_POST[direcaoHidraulica].'
        Vidro Elétrico: '.$_POST[vidroEletrico].'
        Trava Elétrica: '.$_POST[travaEletrica].'
        Kit Visibilidade: '.$_POST[kitVisibilidade].'
        Roda de Liga Leve: '.$_POST[rodaLigaLeve].'
        Air Bag: '.$_POST[airBag].'
        Freio Abs: '.$_POST[freioAbs].'

      Observações:
      '.$_POST[observacoes].'';
    // message lines should not exceed 70 characters (PHP rule), so wrap it
    $message = wordwrap($message, 70);
    // send mail
    mail($to,$subject,$message,"From: $from\n");
    echo "Thank you for sending us feedback";
    } else {
      echo $_POST["enviar"]." #error";
    }
?>
