<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;


class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }



    public function store(Request $request)
    {

        $inputs=request()->validate([
            'title'=>'required|max:255',
            'email'=>'required|email|max:255',
            'body'=>'required|max:1000',
        ]);
        Contact::create($inputs);
        return back()->with('message', 'お問い合わせ送信完了しました');
    }

    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(5);
        
        return view('contact.index',compact('contacts'));

    }


    public function show($id)
    {
        $contact =Contact::findOrFail($id);
        return view('contact.show',compact('contact'));
    }

    
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contact.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $inputs = $request->validate([
            'title' => 'required|max:255',
            'email' => 'required|email|max:255',
            'body' => 'required|max:1000',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($inputs);

        return redirect()->route('contacts.show', $contact->id)
            ->with('message', 'お問い合わせが更新されました。');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')
            ->with('message', 'お問い合わせが削除されました。');
    }




}
