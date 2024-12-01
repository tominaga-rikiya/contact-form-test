<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class DashboardController extends Controller
{
      public function index(Request $request)
    {
        $query = Contact::query();

        // name
        if ($request->filled('name')) {
            $query->where('first_name', 'like', '%' . $request->name . '%')
                ->orWhere('last_name', 'like', '%' . $request->name . '%');
        }

        // email
        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        // gender
        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        // inquiry_type
        if ($request->filled('inquiry_type')) {
            $query->where('inquiry_type', 'like', '%' . $request->inquiry_type . '%');
        }

        // date
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->paginate(7);

        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));

    }
}
