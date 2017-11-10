<?php

namespace LBM\DaisyBundle\Services;

class LbmDeezerConnect
{


    private $app_id = 245502;
    private $app_name = 'daisy';
    private $app_key = 'e8790491bfdaddeb1d065a72f7825749';
    private $callback = "http://trafficjam.lareanetwork.net/app_dev.php/playlist";
    protected $playlist_id = 3344090062;

    public function construct($config)
    {
        if (!empty($config)) {
            $this->config = $config;
        }

    }

    public function getToken($state)
    {
        $dialog_url = "https://connect.deezer.com/oauth/auth.php?app_id=" . $this->app_id
            . "&redirect_uri=" . urlencode($this->callback) . "&perms=email,offline_access"
            . "&state=" . $state;

        header("Location: " . $dialog_url);
        exit;
    }


    public function getDeezerUserName($code)
    {
        $token_url = "https://connect.deezer.com/oauth/access_token.php?app_id="
            . $this->app_id . "&secret="
            . $this->app_key . "&code=" . $code;

        $response = file_get_contents($token_url);
        $params = null;
        parse_str($response, $params);
        $api_url = "https://api.deezer.com/user/me?access_token="
            . $params['access_token'];

        $user = json_decode(file_get_contents($api_url));
        echo("Hello " . $user->name);

        }


    public function getPLayList($request)
    {


        $session = $request->getSession();
        $code = $request->get('code');

        if (!isset($code)) {

            $state = md5(uniqid(rand(), TRUE));
            $session->set('state', $state);

            $this->callback = "http://trafficjam.lareanetwork.net/app_dev.php/playlist";
            $this->getToken($state);
        } else {

            $state = $session->get('state');

            if ($request->get('state') == $state) {

                //$connect->getDeezerUserName($code);
                $this->getContentPlaylist($code);

            } else {
                echo("The state does not match. You may be a victim of CSRF.");
            }

        }
    }



    public function getContentPlaylist($code)
    {


        $token_url = "https://connect.deezer.com/oauth/access_token.php?app_id="
            . $this->app_id . "&secret="
            . $this->app_key . "&code=" . $code;

        $response = file_get_contents($token_url);
        $params = null;
        parse_str($response, $params);
        $api_url = "http://api.deezer.com/playlist/3344090062?access_token="
            . $params['access_token'];

        $result = json_decode(file_get_contents($api_url));

        echo '<pre>'; print_r($result);





        //if($id == null) $id = $this->playlist_id;



        //https://connect.deezer.com/oauth/auth.php?app_id=YOUR_APP_ID&redirect_uri=YOUR_REDIRECT_URI&perms=basic_access,email

        //$result = file_get_contents("https://api.deezer.com/album/302127");

        //$result= file_get_contents('https://api.deezer.com/playlist/3344090062?access_token=frHbU4F8g3l8f5ple0MQj8iuDBjdzBVJn24zxWwniIwFlt8zK06;');
       // $instaResult = json_decode($instaResults, true);








        //return $result;
    }

}