<?php

namespace App\Http\Controllers;

use App\Temp;

use Illuminate\Http\Request;

class TempController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temp = Temp::get();
        $temp =  Temp::latest()->get();

        return \json_encode($temp);
    }
    public function showTemp($id){
        $temp = Temp::findOrFail($id);
        return \json_encode($temp);

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

            //dd($request->project);
            $temp = new Temp();
            $temp->mac = $request->mac;
            $temp->value = $request->value;
            $temp->flame = $request->flame;
            $temp->smoke = $request->smoke;

            // return response()->json([
            //     'success' => false,
            //     'comment' => $temp,
            //     'user_id' => $userId,
            //     'user' => $user
            // ]);

            // $data = [
            //     'image' => '',
            // ];


            $temp->save();
            //dd($agent);



            return response()->json([
                'success' => true,
                'comment' => $temp,
            ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
