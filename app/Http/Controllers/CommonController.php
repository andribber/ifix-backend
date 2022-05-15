<?php

namespace App\Http\Controllers;

use App\Enums\ServiceOrders\Status;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function status()
    {
        return Status::all();
    }
}
