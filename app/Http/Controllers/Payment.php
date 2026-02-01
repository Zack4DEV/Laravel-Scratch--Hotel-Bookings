<?php

namespace App\Http\Controllers;

// On utilise un alias pour le modèle afin d'éviter le conflit avec le nom de la classe
use App\Models\Payment as PaymentModel;
use Illuminate\Http\Request;

class Payment extends Controller
{
    public function _show()
    {
        // Récupère tous les paiements depuis la table 'payment'
        $payments = PaymentModel::all();
        return response()->json($payments);
    }

    public function _store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|unique:payment,id',
            'name' => 'required|string',
            'email' => 'required|email',
            'roomtotal' => 'required|numeric',
            'finaltotal' => 'required|numeric',
        ]);

        $payment = PaymentModel::create($validated);
        return response()->json($payment, 201);
    }

    public function _delete(Request $request)
    {
        $payment = PaymentModel::findOrFail($request->payment_id);
        $payment->delete();
        return response()->json(['message' => 'Payment deleted successfully']);
    }
}
