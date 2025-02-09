<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use Illuminate\Support\Facades\Storage;

class IncomeController extends Controller {
    public function index() {
        $incomes = Income::all();
        return view('incomes.index', compact('incomes'));
    }

    public function create() {
        return view('incomes.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'amount' => 'required|numeric',
            'income_date' => 'required|date',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('incomes', 'public');
        }

        Income::create($data);
        return redirect()->route('incomes.index')->with('success', 'تمت إضافة الدخل بنجاح!');
    }

    public function edit(Income $income) {
        return view('incomes.edit', compact('income'));
    }

    public function update(Request $request, Income $income) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'amount' => 'required|numeric',
            'income_date' => 'required|date',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($income->image);
            $data['image'] = $request->file('image')->store('incomes', 'public');
        }

        $income->update($data);
        return redirect()->route('incomes.index')->with('success', 'تم تحديث الدخل بنجاح!');
    }

    public function destroy(Income $income) {
        if ($income->image) {
            Storage::disk('public')->delete($income->image);
        }
        $income->delete();
        return redirect()->route('incomes.index')->with('success', 'تم حذف الدخل بنجاح!');
    }
}
