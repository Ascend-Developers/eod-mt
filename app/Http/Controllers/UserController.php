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
use DataTables;

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
        // $users = User::all();
        // return view('users.index', compact('users'));
        
        return view('users.index');
    }

    public function getFilterData($request)
    {
        $users = User::query();
        return $users->orderBy('created_at', 'desc');
    }

    public function DataTables(Request $request)
    {
        $users = $this->getFilterData($request)->get();

        return DataTables::of($users)
            ->addColumn('name', function ($user) {
                return $user->name;
            })
            ->addColumn('email', function ($user) {
                return $user->email;
            })
            ->addColumn('type', function ($user) {
                return $user->type;
            })
            ->addColumn('sites', function ($user) {
                return $user->sites ? preg_replace('/[]]/', '',preg_replace('/[["]/', '',$user->sites->pluck('name'))) : "--";
            })
            ->addColumn('phone', function ($user) {
                return $user->phone;
            })
            ->addColumn('module', function ($user) {
                return $user->modules ? preg_replace('/[]]/', '',preg_replace('/[["]/', '',$user->modules->pluck('name'))) : "--";
            })
            ->addColumn('category', function ($user) {
                return $user->category;
            })
            ->addColumn('action', function ($user) {
                $route = route('user.edit', $user->id);
                $route1 = route('user.show', $user->_id);
                return '<a href="' . $route . '"><i data-feather="edit"></i></a>
                        <form action=" ' . route("user.destroy", $user->id) . ' " method="POST" style="display: inline" class="macros-delete" id="delete-macros-' . $user->_id . '">
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="_token" value="' . csrf_token() . '">
                            <button class="text-danger selectDelBtn" type="submit" style="background: none; border:none; display:inline"><i data-feather="delete"></i></button>
                        </form>
                        <a href="' . $route1 . '"><i data-feather="show"></i></a>';
            })
            ->whitelist(['name', 'email', 'type', 'site', 'phone', 'module', 'category'])
            ->toJson();
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
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => strtolower(trim($request->input('email'))),
            'password' => Hash::make($request->input('password')),
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
