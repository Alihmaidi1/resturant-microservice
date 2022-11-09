<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




    function updateEnv($data = array())
    {
        if (!count($data)) {
            return;
        }

        $pattern = '/([^\=]*)\=[^\n]*/';

        $envFile = base_path() . '/.env';
        $lines = file($envFile);
        $newLines = [];
        foreach ($lines as $line) {
            preg_match($pattern, $line, $matches);

            if (!count($matches)) {
                $newLines[] = $line;
                continue;
            }

            if (!key_exists(trim($matches[1]), $data)) {
                $newLines[] = $line;
                continue;
            }

            $line = trim($matches[1]) . "={$data[trim($matches[1])]}\n";
            $newLines[] = $line;
        }

        $newContent = implode('', $newLines);
        file_put_contents($envFile, $newContent);
    }


    function tokenInfo($email,$password,$provider="admins"){

        $client= DB::table('oauth_clients')->where("provider",$provider)->first();
        return Http::asForm()->post(env("APP_URL")."/oauth/token",[
                'grant_type' => 'password',
                'client_id' =>$client->id,
                'client_secret' => $client->secret ,
                'username' => $email,
                'password' => $password,

        ]);


    }


    function refreshToken($refreshToken,$provider="admins"){
        $client=DB::table('oauth_clients')->where("provider",$provider)->first();
        return  Http::asForm()->post(env("APP_URL")."/oauth/token",[
            'grant_type' => 'refresh_token',
            'refresh_token' => $refreshToken,
            'client_id' => $client->id,
            'client_secret' => $client->secret,
        ]);
    }



