<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;


    function saveimage($diskName,$image,$folder){
        $logo=time().rand(0,9999999).".".$image->getClientOriginalExtension();
        $path=Storage::disk($diskName)->putFileAs($folder,$image,$logo);
        return $path;
    }


    function adddisk($name,$aws_access_key,$aws_secret_access,$aws_region,$aws_bucket){

        $disks=Config::get("filesystems.disks");
        $disks[$name]=[
            'driver' => 's3',
            'key' => $aws_access_key,
            'secret' => $aws_secret_access,
            'region' => $aws_region,
            'bucket' => $aws_bucket,
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ];
        config(['filesystems.disks' => $disks]);
        $fp = fopen(base_path() .'/config/filesystems.php' , 'w');
        fwrite($fp, '<?php return ' . var_export(config('filesystems'), true) . ';');
        fclose($fp);


    }


    function deletedisk($name){
        $disks=Config::get("filesystems.disks");
        unset($disks[$name]);
        config(['filesystems.disks' => $disks]);
        $fp = fopen(base_path() .'/config/filesystems.php' , 'w');
        fwrite($fp, '<?php return ' . var_export(config('filesystems'), true) . ';');
        fclose($fp);

    }

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



