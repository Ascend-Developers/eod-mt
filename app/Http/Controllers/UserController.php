<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Site;
use App\Models\Module;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Validation\Rule;
use App\Exports\UsersExport;
use Excel;
use App\Mail\UserCreate;
use Mail;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sites = Site::all();
        $modules = Module::all();
        return view('users.create', compact('sites', 'modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name'=> ['required'],
            'email' => ['required', Rule::unique('users','email')->whereNull('deleted_at')],
            'password'=> ['required'],
            'type'=> ['required'],
            'phone'=> ['required'],
            'category'=> ['required'],
            'site_ids'=> ['required'],
        ]);

        $password = $request->input('password');
        $data = [
            'name' => $request->input('name'),
            'email' => strtolower(trim($request->input('email'))),
            'password' => Hash::make($password),
            'type' => $request->input('type'),
            'phone' => $request->input('phone'),
            'category' => $request->input('category'),
        ];
        $user = User::create($data);

        if($request->input('site_ids')){
            $user->sites()->sync($request->input('site_ids'));
        }

        if($request->input('module_ids')){
            $user->modules()->sync($request->input('module_ids'));
        }

        try {
            Mail::to($user->email)->send(new UserCreate($user, $password));
        } catch (exception $e) {
            //throw $th;
            dd($e->error());
        }

        return redirect()->route('user.index')->with('success','User is created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $users = User::find($id);
        return view('users.Show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $users = User::find($id);
        $sites = Site::all();
        $modules = Module::all();
        return view('users.edit', compact('users', 'sites', 'modules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name'=> ['required'],
            'email' => ['required'],
            'type'=> ['required'],
            'phone'=> ['required'],
            'category'=> ['required'],
            'site_ids'=> ['required'],
        ]);

        $user = User::find($id);

        $user->name =  $request->input('name');
        $user->email =  strtolower(trim($request->input('email')));
        $user->type =  $request->input('type');
        $user->phone =  $request->input('phone');
        $user->category =  $request->input('category');

        if($request->input('password')){
            $pass = $request->input('password');
            $user->password =  Hash::make($request->input('password'));
        }

        $user->save();

        if($request->input('site_ids')){
            $user->sites()->sync($request->input('site_ids'));
        }

        if($request->input('module_ids')){
            $user->modules()->sync($request->input('module_ids'));
        }

        return redirect()->route('user.index')->with('success','User is Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'user.xlsx');
    }
}
