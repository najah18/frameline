<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        return view('invoices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'invoice_date' => 'required|date',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Invoice::create([
            'image' => $imagePath,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'invoice_date' => $request->invoice_date,
        ]);

        return redirect()->route('invoices.index')->with('success', 'تمت إضافة الفاتورة بنجاح.');
    }

    public function edit(Invoice $invoice)
    {
        return view('invoices.edit', compact('invoice'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'image' => 'image',
            'name' => 'string|max:255',
            'description' => 'nullable|string',
            'price' => 'numeric',
            'invoice_date' => 'date',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $invoice->image = $imagePath;
        }

        $invoice->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'invoice_date' => $request->invoice_date,
        ]);

        return redirect()->route('invoices.index')->with('success', 'تم تحديث الفاتورة بنجاح.');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoices.index')->with('success', 'تم حذف الفاتورة بنجاح.');
    }
}
