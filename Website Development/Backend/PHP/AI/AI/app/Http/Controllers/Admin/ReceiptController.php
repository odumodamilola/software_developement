<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Receipt;

class ReceiptController extends Controller
{

    public function index()
    {
        return view('document.upload');
    }
    public function store(Request $request)
    {
        $request->validate([
            'receipt' => 'required|file|mimes:pdf|max:2048',
        ]);

        // Store the uploaded file
        $path = $request->file('receipt')->store('receipts');

        // Save the receipt info in the database
        Receipt::create([
            'user_id' => auth()->id(),
            'file_path' => $path,
        ]);

        return redirect()->back()->with('success', 'Receipt uploaded successfully.');
    }
};