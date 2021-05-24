<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Http\Resources\QuestionResource;
use App\Http\Resources\QuestionCollection;

class QuestionController extends Controller
{
        public function index()
    {
        return new QuestionCollection(Question::paginate(10));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param QuestionRequest $request
     * @return QuestionResource
     */
    public function store(QuestionRequest $request)
    {

        $question = Question::create([
            'question' => $request->question,
            'created_by' => $request->createdBy
        ]);

        return new QuestionResource($question);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param QuestionRequest $request
     * @param Question $question
     * @return QuestionResource
     */
    public function update(QuestionRequest $request, Question $question)
    {
        $question->update([
            'question' => $request->question,
            'created_by' => $request->createdBy
        ]);

        return new QuestionResource($question);
    }
}
