<?php

namespace App\Http\Controllers;


use App\Models\portfolio;
use Exception;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $portfolios = portfolio::paginate(5);
        return view('layouts.backend.portfolio.index',compact('portfolios'));
    }

    public function getData(){
        $portfolios = portfolio::all();
        return response()->json([
           'portfolios' => $portfolios,
        ]);
    }

    public function get_edit(Request $request){
       $portfolio = portfolio::findOrFail($request->id);
       return response()->json([
          'name_en' => $portfolio->getTranslation('name','en'),
          'name_ar' => $portfolio->getTranslation('name', 'ar'),
          'description' => $portfolio->description,
          'port_id' => $portfolio->id,
       ]);
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
        //


        try{
            portfolio::create([
                'name'=>['en' => $request->name_en, 'ar' => $request->name_ar],
                'description'=>$request->description,
            ]);
            session()->flash('add',trans('backend/message.success'));
            // return redirect()->back();
            return response()->json([
              'done' => 'Done',
            ]);
        }
        catch(Exception $e){
            // return redirect()->back()->withErrors('error',$e->getMessage());
             return response()->json([
                'done' => 'error',
                'error' => $e->getMessage(),
             ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(portfolio $portfolio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

         try{
            $portfolio = portfolio::findOrFail($request->port_id);
            $portfolio->update([
                'name'=>['en' => $request->name_en, 'ar' => $request->name_ar],
                'description'=>$request->description,
            ]);
            session()->flash('add',trans('backend/message.success'));
            // return redirect()->back();
            return response()->json([
              'done' => 'Done',
            ]);
        }
        catch(Exception $e){
            // return redirect()->back()->withErrors('error',$e->getMessage());
             return response()->json([
                'done' => 'error',
                'error' => $e->getMessage(),
             ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */


    public function destroy(Request $request)
    {
        try{
            $portfolio = portfolio::findOrFail($request->id);
            $portfolio->delete();
            session()->flash('delete',trans('backend/message.deleted'));
            // return redirect()->back();
            return response()->json([
                'done' => 'Done',
              'id' => $portfolio->id,
            ]);
        }
        catch(Exception $e){
            // return redirect()->back()->withErrors('error',$e->getMessage());
             return response()->json([
                'done' => 'error',
                'error' => $e->getMessage(),
             ]);
        }
    }
}
