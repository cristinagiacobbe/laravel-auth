<?php

namespace App\Http\Controllers;

use App\Mail\NewLeadMarkdown;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Lead;

class LeadController extends Controller
{
    public function create()
    {
        return view('guest.lead.create');
    }

    public function store(Request $request)
    {
        //dd($request);
        //validate
        $val_data = $request->validate([
            'name' => 'required',
            'mail' => 'required|email',
            'message' => 'required|max:1000'
        ]);


        //create
        $newLead = Lead::create($val_data);
        //dd($newLead);

        //send mail
        Mail::to('info@boolpress.com')->send(new NewLeadMarkdown($newLead));

        //redirect
        return back()->with('message', 'Message sent successfully');
    }
}
