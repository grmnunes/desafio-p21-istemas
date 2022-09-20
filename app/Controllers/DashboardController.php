<?php
namespace app\Controllers;

use app\Models\Fan;

class DashboardController
{
    private $fan;

    public function __construct()
    {
        $this->fan = new Fan;
    }

    public function index()
    {
        $fans = $this->fan->all();

        return view('dashboard', ['fans' => $fans]);
    }
    
}