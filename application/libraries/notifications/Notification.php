<?php 

class Notification
{
    /**
     * @var object codeigniter instance
     */
    public $getInstance; 

    /**
     * @var array notifications
     */
    public $notifications = array();

    /**
     * @var array notifications
     */
    public $count = 0;    

    /**
     * @author Pedro Henrique Guimarães
     * 
     * Start point. 
     */
    public function __construct() 
    {
        $this->getInstance = &get_instance();
    }

    /**
     * @author Pedro Henrique Guimarães 
     * 
     * Busca todas as notificações do usuário logado 
     * 
     * @param int $to_id 
     * @return json 
     */
    public function getNotifications($to_id)
    {
        $this->notifications = $this->format($this->getInstance->notificacao->get($to_id));
        return json_encode($this->notifications);
    }


    /**
     * @author Pedro Henrique Guimarães
     * 
     * Busca o total de notificações do usuário logado
     *
     * @param int $to_id 
     * @return json 
     */
    public function getCount($to_id) 
    {
        $this->count = $this->getInstance->notificacao->getCount($to_id);
        return json_encode($this->count);
    }

    public function notify($from_id = null, $to_id, $text, $link)

    {
        $notification = [
            'emissor_id'       => $from_id,
            'destinatario_id'  => $to_id, 
            'criacao'          => date('Y-m-d H:i:s'),  
            'notificacao'      => $text,
            'link'             => $link
        ];

        $this->getInstance->notificacao->create($notification);
    }

    /**
     * @author Pedro Henrique Guimarães
     * 
     * Método responsável por setar a notificação como visualizada
     * 
     * @param int $notification_id
     * @return void 
     */
    public function setViewed($notification_id)
    {
        $this->getInstance->notificacao->setViewed($notification_id);
    }

    /**
     * @author Pedro Henrique Guimarães
     * 
     * Formatação de informações 
     * @param mixed 
     * @return mixed 
     */
    private function format($notifications)
    {
        if (!is_array($notifications))
            return array(); 

        foreach ($notifications as $key => $notification) {
            if ($notification->criacao)
                $notifications[$key]->criacao = $this->swicthTimestamp($notification->criacao, true);
        }

        return $notifications;
    }

    /**
     * @author Pedro Henrique Guimarães
     * 
     * Formatação de data 
     * @param string $timestamp
     * @param boolean $full 
     */
    private function swicthTimestamp($timestamp, $full = TRUE)
    {
        $parts = explode(' ', $timestamp);
        return $full ? switchDate($parts[0]).' '.$parts[1] : switchDate($parts[0]);
    }


}