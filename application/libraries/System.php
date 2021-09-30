<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class System
{

    public $userCacheSession = null;
    private $userSession = null;
    private $statusSession = false;

    function __construct($core)
    {
        $this->core = $core[0];

        $this->core->load->model('m_config');
        $this->core->load->library('session');
        $this->core->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));

        $this->verifySession();
    }

    /**
     * Carrega os dados do usuário connectado
     * 
     * @return array 
     */
    function getDataUser(): array
    {
        return [];
    }

    /**
     * Carrega os dados de visualização dá aplicação
     * 
     * @return array|null
     */
    function getDataView($data = [], bool $auth = true)
    {
        if ($auth === true and !$this->validateSession())
        {
            return $this->redirect();
        }

        

        $data = array_merge([
            "menu" => $this->core->router->fetch_class()
        ], $data);

        return $data;
    }

    /**
     * Retorna um valor da session do usuário
     * 
     * @param string $index Valor referente a chave do valor requerido
     * 
     * @return mixed
     */
    public function getSessionValue(string $index)
    {
        if (!$this->validateSession())
        {
            return $this->redirect();
        }

        if (array_key_exists($index, $this->userCacheSession))
        {
            return $this->userCacheSession[$index];
        }

        return null;
    }

    /**
     * Retorna o status da session
     * 
     * @return bool
     */
    public function validateSession(): bool
    {
        return $this->statusSession;
    }


    /**
     * Verifica se a session é valida
     * 
     * @return bool
     */
    public function verifySession(): bool
    {
        $this->userSession = $this->core->session->userdata();

        if (
            $this->userCacheSession === null and 
            isset($this->userSession['index']) and
            isset($this->userSession['token']) and
            isset($this->userSession['pin'])
        )
        {
            $this->userCacheSession = $this->core->cache->get($this->userSession['index']);
        }

        if (
            is_array($this->userCacheSession) and
            isset($this->userCacheSession['pin']) and
            isset($this->userCacheSession['token'])
        )
        {
            if (
                $this->userCacheSession['pin'] === $this->userSession['pin'] and
                $this->userCacheSession['token'] == $this->userSession['token']
            )
            {
                $pin = mt_rand(100000000, 999999999);
                $token = sha1(md5(mt_rand() . date("Y-m-d h:i:s")));

                $this->userSession['pin'] = $pin;
                $this->userSession['token'] = $token;
                
                $this->userCacheSession['pin'] = $pin;
                $this->userCacheSession['token'] = $token;
    
                $this->core->session->set_userdata($this->userSession);

                $this->core->cache->save(
                    $this->userSession['index'],
                    $this->userCacheSession,
                    3600
                );

                return $this->statusSession = true;
            }
        }

        return $this->statusSession = false;
    }

    /**
     * Redireciona a requisição para logout
     * 
     * @return void
     */
    public function redirect()
    {
        redirect('/logout');
        
        exit();
    }

    /**
     *  Utiliza a API do correios para calcular o frete do produto
     * 
     * @param string $cod_servico     Codigo do servico desejado 
     * @param string $cep_origem      Cep de origem, apenas numeros 
     * @param string $cep_destino     Cep de destino, apenas numeros 
     * @param string $peso            Valor dado em Kg incluindo a embalagem. 0.1, 0.3, 1, 2 ,3 , 4 
     * @param string $altura          Altura do produto em cm incluindo a embalagem
     * @param string $largura         Altura do produto em cm incluindo a embalagem 
     * @param string $comprimento     Comprimento do produto incluindo embalagem em cm 
     * @param string $valor_declarado Indicar 0 caso nao queira o valor declarado 
     * 
     * @return array|bool
     */

}
