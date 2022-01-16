<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Site;
use App\Models\Module;
use Hash;
use Illuminate\Validation\Rule;

class HelperController extends Controller
{
    //
    public function registerPage()
    {
        $sites = Site::all();
        $modules = Module::all();
        return view('auth.register', compact('sites', 'modules'));
    }

    public function register(Request $request)
    {
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

        $modules = Module::whereIn('name', ['EOD Submission', 'Waiting Time', 'Rapid Antigen Testing Site Audit', 'Lab Classification'])->pluck('_id')->toArray();
        $user->modules()->attach($modules);
        return redirect()->route('login')->with('success','Registration successfully');
    }
}
