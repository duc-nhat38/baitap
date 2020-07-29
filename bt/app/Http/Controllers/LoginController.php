<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){     
        if(isset($_POST["username"]) && isset($_POST["password"])){
            $username = $_POST["username"];
            $password = $_POST["password"];
        }

        if($username !== "admin" || $password !== "admin"){
            return view("login");
        }
        if($username === "admin" && $password === "admin"){
            return view("index");
        }
    }
    public function formLogin(){
        return view("login");
    }
}
