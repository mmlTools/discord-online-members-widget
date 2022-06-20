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
        if(!isset($this->widget_url) || !filter_var($this->widget_url, FILTER_VALIDATE_URL)):
            throw new \Exception('Invalid Widget URL');
        endif;

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
     * @return int
     */
    public function GetTotalActiveMembers(){
        return count($this->GetMembersList());
    }

    /**
     * Status Online, Idle
     * @param null $status
     * @return array
     */
    public function GetMembersList($status = null){
        if(!$status)
            return $this->serverData->members;

        $result = [];
        foreach ($this->serverData->members as $i):
            if($i->status == strtolower($status)):
                $result[] = $i;
            endif;
        endforeach;

        return $result;
    }

    /**
     * @param int $results - how many members to show in list
     * @param null $status - idle/online
     * @param bool $rand - show random members true/false
     * @return string
     */
    public function RenderMembersList($results = 10, $status = null, $rand = true){
        $str = "";
        foreach ($rand ? array_rand($this->GetMembersList($status), $results) : $this->GetMembersList($status) as $i):
            $user = $this->GetMembersList()[$i];
            $str .= '<div class="discord-member">';
            $str .= '    <div class="discord-avatar" style="background: url("'.$user->avatar_url.'") no-repeat"></div>';
            $str .= '    <div class="discord-username">'.$user->username.'</div>';
            $str .= '</div>';
        endforeach;

        return $str;
    }

    /**
     * @return mixed
     */
    public function GetData(){
        return $this->serverData;
    }
}
