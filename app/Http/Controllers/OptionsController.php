<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Requests\Options\CreateOptionRequest;
use App\Http\Requests\Options\UpdateOptionRequest;

class OptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($question_id)
    {
        $response = array(
            'status' => 'success',
            'options' => Option::where('question_id', $question_id)
        );
        return response()->json($response); 

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
    public function store(CreateOptionRequest $request, Question $question_id)
    {
        $options = Option::where('question_id', $question_id);
        $option_count = count($options);

        if ($option_count !== 4) {
            $option = Option::create([
                'description' => $request->description,
                'question_id' => $request->question,
            ]);
    
            $response = array(
                'status' => 'success',
                'msg' => 'Option Added Successfully!',
            );
    
        } else {
            $response = array(
                'status' => 'success',
                'msg' => 'Option Count Limit For Selected Question Reached!',
            );
        }
        return response()->json($response); 

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
    public function update(UpdateOptionRequest $request, Option $option)
    {
        $data = $request->only(['description']);

        // update attributes
        $option->update($data);

        $response = array(
            'status' => 'success',
            'msg' => 'Option Updated Successfully!',
        );

        return response()->json($response); 


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
