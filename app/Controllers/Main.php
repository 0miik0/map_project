<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RequestInterface;

class Main extends BaseController
{
    public function index(): string
    {
        return view('index');
    }

    public function json()
    {
        $cesta = "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/significant_month.geojson";
        $data ["file"]= file_get_contents($cesta);
        //var_dump($data);
        echo view("json", $data);
    }
    public function obvody()
    {
        $cesta = "assets\VO_Senat_2022g300.geojson";
        $data ["file"]= file_get_contents($cesta);
        //var_dump($data);
        echo view("obvody", $data);
    }
}

