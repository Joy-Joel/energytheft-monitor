<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Control;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            $countsall = Feedback::where('serial_number', $request->serial_number)->count() > 0;
            if($countsall){
             $storeFeedback=Feedback::where('serial_number', $request->serial_number)->first();
             $storeFeedback->f1 =$request->f1;
             $storeFeedback->f2 =$request->f2;
             $storeFeedback->f3 =$request->f3;
             $storeFeedback->save();
            }else{
             $storeFeedback= Feedback::create([
               'serial_number' => $request->serial_number,
               'f1' => $request->f1,
               'f2' => $request->f2,
               'f3' => $request->f3,
             ]);
             $storeFeedback->save();
            }
            $storeControl=Control::where('serial_number', $request->serial_number)
                ->select(['c1','c2','c3'])
                ->first();
            return response()->json($storeControl);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
