<?php

namespace App\Http\Controllers;

use App\Models\Amount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AmountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if (is_null($user)) {
            return response()->json(['message' => 'Usuario no logueado'], 401);
        }
        $amounts = Amount::where(['user_id' => $user->id])->get();
        return response()->json(['code' => 200, 'message' => 'Success', 'amounts' => $amounts]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'amount' => 'required|numeric',
        ]);

        $user = Auth::user();
        if (is_null($user)) {
            return response()->json(['message' => 'Usuario no logueado'], 401);
        }

        $amount = Amount::create([
            'user_id' => $user->id,
            'date' => $request->date,
            'amount' => $request->amount,
        ]);

        return response()->json(['code' => 201, 'message' => 'Amount created successfully', 'amount' => $amount]);
    }
}
