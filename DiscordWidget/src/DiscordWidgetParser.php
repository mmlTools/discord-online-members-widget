<?php namespace src;

class DiscordWidgetParser  {
    private $serverData, $widget_url;

    /**
     * DiscordWidgetParser constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->widget_url = $url;
        try{
            $this->FetchData();
        }catch (\Exception $e){
            exit($e->getMessage());
        }
    }

    /**
     * @throws \Exception
     */
    private function FetchData(){
        if(!isset($this->widget_url) || !filter_var($this->widget_url, FILTER_VALIDATE_URL))
            throw new \Exception('Invalid Widget URL');

        $this->serverData = json_decode(file_get_contents($this->widget_url), false);
    }

    /**
     * @return mixed
     */
    public function GetInviteLink(){
        return $this->serverData->instant_invite;
    }

    /**
     * @return mixed
     */
    public function GetServerId(){
        return $this->serverData->id;
    }

    /**
     * @return mixed
     */
    public function GetServerName(){
        return $this->serverData->name;
    }

    /**
     * Status Online, Idle, & Offline
     * @param null $status
     * @return array
     */
    public function GetMembers($status = null){
        if(!$status)
            return $this->serverData->members;

        $result = [];
        foreach ($this->serverData->members as $i)
            if($i->status == strtolower($status))
                $result[] = $i;

        return $result;
    }

    /**
     * @return mixed
     */
    public function GetData(){
        return $this->serverData;
    }
}
