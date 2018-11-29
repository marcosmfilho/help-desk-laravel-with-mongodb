<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active = 'users';
        
        $users = User::all();
        $total = User::count();
        $admin = User::where('is_admin', true)->count();
        $agent = User::where('is_agent', true)->count();
        $client = $total - ($admin + $agent);

        return  view('users.index',
                compact('active', 
                        'users', 
                        'admin', 
                        'agent', 
                        'client', 
                        'total'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function promoteToAdmin(Request $request)
    {
        $params = $request->all();
        $id = $params['id'];

        $user = User::find($id);

        $user->update(['is_admin' => true, 'is_agent' => false]);
        
        return redirect()->route('users.index')
                        ->with('success','Occurrence deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function promoteToAgent(Request $request)
    {
        $params = $request->all();
        $id = $params['id'];

        $user = User::find($id);

        $user->update(['is_agent' => true, 'is_admin' => false]);

        return redirect()->route('users.index')
                        ->with('success','Occurrence deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function promoteToClient(Request $request)
    {
        $params = $request->all();
        $id = $params['id'];

        $user = User::find($id);
        
        $user->update(['is_agent' => false, 'is_admin' => false]);
        
        return redirect()->route('users.index')
                        ->with('success','Occurrence deleted successfully');
    }
}
