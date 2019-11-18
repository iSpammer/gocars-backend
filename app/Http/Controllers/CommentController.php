<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;
use App\Car;
use Illuminate\Http\Request;

class CommentController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::get();
        $comments =  Comment::with('users')->latest()->get();

        return \json_encode($comments);
    }
    public function showComment($id){
        $comments = Comment::findOrFail($id);
        return \json_encode($comments);

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
            $comment = new Comment();
            $comment->comment = $request->comment;
            $comment->rating = $request->rating;

            $userId= $request->user_id;
            $carId= $request->car_id;
            // return response()->json([
            //     'success' => false,
            //     'comment' => $comment,
            //     'user_id' => $userId,
            //     'user' => $user
            // ]);

            // $data = [
            //     'image' => '',
            // ];
            try
            {
                $comment->save();

                $car = Car::find($carId);
                $car->comments()->save($comment);
                $car->save();
                //dd($project);

                //dd($request->project);
               // dd($projectId);
               $comment->save();

               $user = User::find($userId);
               //dd($project);
               // $tier = Tier::find($tierId);
               // $class = Classes::find($classId);
               // $status = Status::find($statusId);
               $user->comments()->save($comment);
               $user->save();
               $comment->save();

               //dd($project);

            }
            // catch(Exception $e) catch any exception
            catch(ModelNotFoundException $e)
            {

                return response()->json([
                    'success' => false,
                    'comment' => $comment
                ]);
            }


            $comment->save();
            //dd($agent);



            return response()->json([
                'success' => true,
                'comment' => $comment,
                'user_id' => $userId,
                'user' => $user
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
