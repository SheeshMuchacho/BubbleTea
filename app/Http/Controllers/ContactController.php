<?php

namespace App\Http\Controllers;

use App\Models\Contact;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        return view('contact.form');
    }

    public function contactform(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message_type' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        $data = new contact();

        $data->name = $request->name;
        $data->email = $request->email;
        $data->message_type = $request->message_type;
        $data->message = $request->message;
        $data->status = 'not reviewed';

        $data->save();

        return redirect()->back()->with('message', 'Your message has been sent successfully!');
    }

    public function showfeedback()
    {
        $data=contact::all();
        return view('contact.update', compact('data'));
    }

    public function updatefeedbackstatus($id)
    {
        $data=contact::find($id);
        $data->status='reviewed';
        $data->save();

        return redirect()->back();
    }

    public function deletefeedback($id)
    {
        $data=contact::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Order Deleted Successfully');
    }

}
