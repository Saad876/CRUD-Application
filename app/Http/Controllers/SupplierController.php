<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function allSupplier()
    {
        $supplier_count = Supplier::all();
        $supplier = Supplier::latest()->paginate(4);
        return view('admin.supplier.index', compact('supplier_count', 'supplier'));
    }
}
