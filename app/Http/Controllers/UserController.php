<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.backend.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {

        try{
          User::create([
              'name' =>$request->name,
              'email' => $request->email,
              'password' => Hash::make($request->password),

          ]);

          session()->flash('add',trans('backend/message.success'));
            // return redirect()->back();
            return response()->json([
              'done' => 'Done',
            ]);
        }catch(Exception $e){
            return response()->json([
                'done' => 'error',
                'error' => $e->getMessage(),
             ]);
        }
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

    public function getData(){
        $users = User::all();
        return response()->json([
            'users' =>$users,
        ]);
    }

    public function get_edit(Request $request){
        $user = User::findOrFail($request->id);
        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'user_id' => $user->id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        try{
            $user = User::findOrFail($request->user_id);
            $user->update([
                'name' =>$request->name,
                'email' => $request->email,
            ]);
            session()->flash('add',trans('backend/message.success'));
              // return redirect()->back();
              return response()->json([
                'done' => 'Done',
              ]);
          }catch(Exception $e){
              return response()->json([
                  'done' => 'error',
                  'error' => $e->getMessage(),
               ]);
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try{
            $user = User::findOrFail($request->id);
            $user->delete();

            session()->flash('delete',trans('backend/message.deleted'));
              // return redirect()->back();
              return response()->json([
                  'id'=>$request->id,
                  'done' => 'Done',
              ]);
          }catch(Exception $e){
              return response()->json([
                  'done' => 'error',
                  'error' => $e->getMessage(),
               ]);
          }
    }
}
