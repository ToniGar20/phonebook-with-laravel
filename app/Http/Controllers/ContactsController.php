<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\Contacts;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all contacts with current user logged in: storing user id and then using it to filter contacts table
        $currentUser = Auth::user()->id;
        $currentUserContacts = Contacts::where('users_id', $currentUser)->get();

        return view('contacts.index', compact('currentUserContacts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lang='es')
    {
        App::setLocale($lang);

        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $request->validated();

        $favouriteValue = 0;
        if($request->input('favourite')){
            $favouriteValue = 1;
        }

        //Method 1 -> Raw
//        $values = array(
//            'first_name' => $request->input('first-name'),
//            'last_name' => $request->input('last-name'),
//            'phone' => $request->input('phone'),
//            'phone_type' => $request->input('phone-type'),
//            'description' => $request->input('description'),
//            'is_favourite' => $favouriteValue,
//            'users_id' => Auth::user()->id
//            );
//        DB::table('contacts')->insert($values);

        //Method 2 -> Query buildr (active one)
        Contacts::create([
            'first_name' => $request->input('first-name'),
            'last_name' => $request->input('last-name'),
            'phone' => $request->input('phone'),
            'phone_type' => $request->input('phone-type'),
            'description' => $request->input('description'),
            'is_favourite' => $favouriteValue,
            'users_id' => Auth::user()->id
        ]);

        //Method 3 -> Eloquent
//        $contacts = new Contacts();
//        $contacts->first_name = $request->input('first-name');
//        $contacts->last_name = $request->input('last-name');
//        $contacts->phone = $request->input('phone');
//        $contacts->phone_type = $request->input('phone-type');
//        $contacts->description = $request->input('description');
//        $contacts->is_favourite = $favouriteValue;
//        $contacts->users_id = Auth::user()->id;

        return redirect('contacts');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $lang='es')
    {
        App::setLocale($lang);

        $currentContact = Contacts::where('id', $id)->first();
        return view ('contacts.show')->with('currentContact', $currentContact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $lang='es')
    {
        App::setLocale($lang);

        $currentContact = Contacts::where('id', $id)->first();

        if(Auth::user()->id === $currentContact->users_id) {
            return view('contacts.edit')->with('currentContact', $currentContact);
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, $id)
    {
        $request->validated();

        $favouriteValue = 0;
        if($request->input('favourite')){
            $favouriteValue = 1;
        }

        Contacts::where('id', $id)->update([
            'first_name' => $request->input('first-name'),
            'last_name' => $request->input('last-name'),
            'phone' => $request->input('phone'),
            'phone_type' => $request->input('phone-type'),
            'description' => $request->input('description'),
            'is_favourite' => $favouriteValue
        ]);


        // Redirecting to the user contact list
        return redirect('/contacts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete-permissions'); //This dont allow to delete contacts!

        $currentContact = Contacts::where('id', $id)->delete();

        // Redirecting to the user contact list
        return redirect('contacts');
    }
}
