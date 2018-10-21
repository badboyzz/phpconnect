<?php

class phpconnect(){
    function init($type, $auth){
        global $redis;
        if ($type == "localhost"){
            $redis = new Redis();
            $connect = $redis->connect('127.0.0.1', $auth["port"]);
            if ($connect == true){
                echo "[INFO] Connected to local redis server!\n";
            }
        }else{
            $redis = new Redis();
            $redis->connect($auth["host"], $auth["port"]);
            $connect = $redis->auth($auth["password"]);
            if ($connect == true){
                echo "[INFO] Connected to remote redis server!\n";
            }
        }
        global $pid;
        $pid = rand(6, 6);
        $redis->set(__FILE__, "$pid");
        echo "[INFO] The PID of this process is: $pid\nKeep it in mind! You can pick the actual process PID by getting data from the full path of the file." ;
    }
    function put_data($data, $key){
        if (empty($key)){
            $redis->set($auth["default_key"], $data);
        }else{
            $redis->set($key, $data);
        }
        
    }
    function get_data($key){
        if (empty($key)){
            $redis->get($auth["default_key"]);
        }else{
            $redis->get($key);
        }
    }

}