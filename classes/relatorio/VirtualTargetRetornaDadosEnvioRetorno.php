<?php

  /**
   * Classe com os atributos de retorno do método RetornaDadosEnvio.
   * 
   * @author Ivan Wilhelm <ivan.whm@me.com>
   * @version 1.0
   */
  class VirtualTargetRetornaDadosEnvioRetorno
  {

    /**
     * Contém o código da campanha.
     * 
     * @var integer     
     */
    private $campanhaId;

    /**
     * Contém o nome do remetente.
     * 
     * @var string     
     */
    private $remetenteNome;

    /**
     * Contém o e-mail do remetente.
     * 
     * @var string     
     */
    private $remetenteEmail;

    /**
     * Contém o e-mail de resposta.
     * 
     * @var string     
     */
    private $remetenteReplay;

    /**
     * Contém o assunto da mensagem.
     * 
     * @var string     
     */
    private $assunto;

    /**
     * Contém o código HTML da mensagem.
     * 
     * @var string     
     */
    private $html;

    /**
     * Contém a data e hora programada para o envio.
     * 
     * @var DateTime     
     */
    private $dataHoraProgramada;

    /**
     * Informa o código da campanha.
     * 
     * @param integer $campanhaId Código da campanha.
     */
    public function setCampanhaId($campanhaId)
    {
      $this->campanhaId = (integer) $campanhaId;
    }

    /**
     * Informa o nome do remetente.
     * @param string $remetenteNome Nome do remetente.
     */
    public function setRemetenteNome($remetenteNome)
    {
      $this->remetenteNome = $remetenteNome;
    }

    /**
     * Informa o e-mail do remetente.
     * 
     * @param string $remetenteEmail E-mail do remetente.
     */
    public function setRemetenteEmail($remetenteEmail)
    {
      $this->remetenteEmail = $remetenteEmail;
    }

    /**
     * Informa o endereço de e-mail de resposta.
     * 
     * @param string $remetenteReplay Endereço de e-mail de resposta.
     */
    public function setRemetenteReplay($remetenteReplay)
    {
      $this->remetenteReplay = $remetenteReplay;
    }

    /**
     * Informa o assunto da mensagem.
     * 
     * @param string $assunto Assunto da mensagem.
     */
    public function setAssunto($assunto)
    {
      $this->assunto = $assunto;
    }

    /**
     * Informa o código HTML da mensagem.
     * 
     * @param string $html Código HTML da mensagem.
     */
    public function setHtml($html)
    {
      $this->html = $html;
    }

    /**
     * Informa a data de hora programada para o envio.
     * 
     * @param string $dataHoraProgramada Data de hora programada para o envio.
     */
    public function setDataHoraProgramada($dataHoraProgramada)
    {
      if (!empty($dataHoraProgramada))
      {
        try
        {
          //Separa a data e a hora
          $dataSeparada = explode(' ', $dataHoraProgramada);
          $dataJunta = $dataSeparada[0];
          $horaJunta = $dataSeparada[1];
          //Separa a data
          $data = explode('/', $dataJunta);
          //Separa a hora
          $hora = explode(':', $horaJunta);
          //Monta a data novamente
          $data = mktime($hora[0], $hora[1], 0, $data[1], $data[0], $data[2]);
          //Ajusta o formato
          $dataFinal = date('Y-m-d H:i:s', $data);
          //Grava
          $timezone = new DateTimeZone(VirtualTarget::VIRTUAL_TARGET_TIMEZONE);
          $this->dataHoraProgramada = new DateTime($dataFinal, $timezone);
        } catch (Exception $exc)
        {
          $this->dataHoraProgramada = NULL;
        }
      } else
        $this->dataHoraProgramada = NULL;
    }

    /**
     * Retorna o código da campanha.
     * 
     * @return integer 
     */
    public function getCampanhaId()
    {
      return $this->campanhaId;
    }

    /**
     * Retorna o nome do remetente.
     * 
     * @return string
     */
    public function getRemetenteNome()
    {
      return $this->remetenteNome;
    }

    /**
     * Retorna o e-mail do remetente.
     * 
     * @return string 
     */
    public function getRemetenteEmail()
    {
      return $this->remetenteEmail;
    }

    /**
     * Retorna o endereço de e-mail de resposta.
     * 
     * @return string
     */
    public function getRemetenteReplay()
    {
      return $this->remetenteReplay;
    }

    /**
     * Retorna o assunto da mensagem.
     * 
     * @return string
     */
    public function getAssunto()
    {
      return $this->assunto;
    }

    /**
     * Retorna o código HTML da mensagem,
     * 
     * @return string
     */
    public function getHtml()
    {
      return $this->html;
    }

    /**
     * Retorna o objeto de data e hora programada para o envio.
     * 
     * @return DateTime
     */
    public function getDataHoraProgramada()
    {
      return $this->dataHoraProgramada;
    }

  }

?>