<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // ✅ Validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // ✅ Save to DB
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Message sent successfully!');
    }

    // ✅ Admin messages
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('messages', compact('contacts'));
    }

    public function destroy($id)
{
    $data = Contact::find($id);

    if($data){
        $data->delete();
    }

    return back()->with('success', 'Message deleted successfully!');
}
}