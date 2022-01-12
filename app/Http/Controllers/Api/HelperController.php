<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\InventoryTransaction;
use App\Models\WaitingTime;
use App\Models\Inventory;
use Illuminate\Http\Request;

class HelperController extends Controller
{
    public function eodSubmission(Request $request)
    {
        $size = $request->per_page ? (int)$request->per_page : 20;
        $eod = InventoryTransaction::orderBy('created_at', 'DESC')->with('site')->paginate($size);
        return response()->json($eod, 200);
    }

    public function waitingTime(Request $request)
    {
        $size = $request->per_page ? (int)$request->per_page : 20;
        $waitingTime = WaitingTime::orderBy('created_at', 'DESC')->with('site')->paginate($size);
        return response()->json($waitingTime, 200);
    }

    public function siteInventory(Request $request)
    {
        $size = $request->per_page ? (int)$request->per_page : 20;
        $inventory = Inventory::orderBy('created_at', 'DESC')->with('site')->paginate($size);
        return response()->json($inventory, 200);
    }
}
