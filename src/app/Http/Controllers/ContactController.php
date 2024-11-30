<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category; 
use Illuminate\Http\Request;

class ContactController extends Controller
{    
    public function index(Request $request)
    {
        $query = Contact::query();

        // name
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
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

        return view('contacts.index', compact('contacts', 'categories'));
    }







// public function index()
// {
//   return view('register');
// }



  //   public function index()
  // {
  //   $contacts = Contact::all();
  //   return view('index',compact('contacts'));
  // }

   public function confirm(Request $request)
     {
      $contact = $request->only(['last_name', 'first_name', 'gender','email', 'tel', 'address','building', 'detail']);
         return view('confiem',compact('contact'));
    }

    public function store(ContactRequest $request)
    {
      $contact = $request->only(['last_name', 'first_name', 'gender','email', 'tel', 'address','building','inquiry_type', 'detail']);
       Contact::create($contact);
         return view('thanks');
    }

}
