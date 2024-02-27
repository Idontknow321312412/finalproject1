<?php

// app/Http/Controllers/ItemController.php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Restaurant2;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{

    
    public function showForm()
    {
        return view('addItemForm');
    }
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'item_name' => 'required|string|max:255',
            'item_price' => 'required|numeric',
            'item_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // Add other validation rules for your form fields
        ]);
    
        // Get the logged-in user
        $user = auth()->user();
    
        // Assuming the user's name is stored in a column named 'name'
        $tableName = strtolower(str_replace(' ', '_', $user->name));
    
        // Get the path where the image is stored relative to storage/app/public
        $itemPicturePath = $request->file('item_picture')->store('item_pictures', 'public');
    
        // Get only the file name without the "item_pictures/" prefix
        $itemPictureName = basename($itemPicturePath);
    
        // Use Eloquent to insert a new item into the user-specific table
        DB::table($tableName)->insert([
            'item_name' => $request->input('item_name'),
            'item_price' => $request->input('item_price'),
            'item_picture' => $itemPictureName,
            // Add other fields as needed
        ]);
    
        return redirect()->route('dashboard')->with('success', 'Item added successfully!');
    }
    public function edit($product_id){
        // Get the logged-in user
        $user = auth()->user();
    
        // Assuming the user's name is stored in a column named 'name'
        $tableName = strtolower(str_replace(' ', '_', $user->name));
        $product2 =  DB::table($tableName)->find($product_id);
        return view('editProduct', ['product' =>$product2]);
    }

    public function update(Request $request, $product_id){
        // Get the logged-in user
        $user = auth()->user();
    
        // Assuming the user's name is stored in a column named 'name'
        $tableName = strtolower(str_replace(' ', '_', $user->name));
        $product2 =  DB::table($tableName)->find($product_id);


        $request->validate([
            'item_name' => 'required|string|max:255',
            'item_price' => 'required|numeric',
            'item_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // Add other validation rules for your form fields
        ]);

        $itemPicturePath = $request->file('item_picture')->store('item_pictures', 'public');
    
        // Get only the file name without the "item_pictures/" prefix
        $itemPictureName = basename($itemPicturePath);

        DB::table($tableName)
        ->where('id', $product_id) // Assuming 'id' is the primary key
        ->update([
            'item_name' => $request->input('item_name'),
            'item_price' => $request->input('item_price'),
            'item_picture' => $itemPictureName,
            // Add other fields as needed
        ]);

        return redirect('/');
    }
    
}

