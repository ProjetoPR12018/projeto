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

    public function getNotifications($to_id)
    {
        $this->notifications = $this->format($this->getInstance->notificacao->get($to_id));
        return json_encode($this->notifications);
    }

    public function getCount($to_id) 
    {
        $this->count = $this->getInstance->notificacao->getCount($to_id);
        return json_encode($this->count);
    }

    public function notify()
    {

    }

    /**
     * @author Pedro Henrique Guimarães
     * 
     * Formatação de informações 
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
     */
    private function swicthTimestamp($timestamp, $full = TRUE)
    {
        $parts = explode(' ', $timestamp);
        return $full ? switchDate($parts[0]).' '.$parts[1] : switchDate($parts[0]);
    }


}