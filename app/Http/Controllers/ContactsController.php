<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contacts;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* TODO Stuff of gates (learning WTF) */
//        Gate::define ('hello', function ($user) {
//            return true;
//        });
//
//        abort_unless(Gate::allows('hello'), 403);

        $contacts = Contacts::all();

        // Visualizar como si fuera un "var_dump" lo que contiene la variable de arriba (info de la tabla del database)
        //dd($contacts);

        return view('contacts.index', compact('contacts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newContact = Contacts::create([
            'first_name' => $request->input('first-name'),
            'last_name' => $request->input('last-name'),
            'phone' => $request->input('phone'),
            'phone_type' => $request->input('phone-type'),
            'users_id' => $request->input('active-user')
        ]);

        // Grabbing current user id from hidden input
        $activeUserId = $request->input('active-user');

        // Redirecting to the user contact list
        return redirect('/users/' . $activeUserId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currentContact = Contacts::where('id', $id)->first();
        return view ('contacts.edit')->with('currentContact', $currentContact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $editedContact = Contacts::where('id', $id)->update([
            'first_name' => $request->input('first-name'),
            'last_name' => $request->input('last-name'),
            'phone' => $request->input('phone'),
            'phone_type' => $request->input('phone-type'),
        ]);

        // Grabbing current user id from hidden input
        $activeUserId = $request->input('active-user');

        // Redirecting to the user contact list
        return redirect('/users/' . $activeUserId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currentContact = Contacts::where('id', $id)->delete();

        // It is possible to call the global variable since it will exist when the code is executed
        $activeUserId = $_COOKIE['activeUser'];

        // Redirecting to the user contact list
        return redirect('/users/' . $activeUserId);
    }
}
