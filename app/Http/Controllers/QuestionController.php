<?php

namespace App\Http\Controllers;

use App\Models\question;
use App\Http\Requests\StorequestionRequest;
use App\Http\Requests\UpdatequestionRequest;
use App\Http\Services\QuestionService;
use Illuminate\Http\Request;
class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $data = [];
    protected $limit = 10;
    public function __construct(QuestionService $questionService){
        $this->questionService = $questionService;
    }

    public function index(Request $request)
    {
        $keyword = $request->keywords;
        $listQuestion = $this->questionService->paginate($this->limit,$keyword);
        $this->data['questions'] = $listQuestion;
        return View('teacher.pages.question.index',$this->data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCreate()
    {
        return View('teacher.pages.question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorequestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorequestionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd(auth()->user()->id);
        $this->questionService->add(auth()->id(), $request->question, $request->choicea, 
    $request->choiceb, $request->choicec, $request->choiced, $request->ans );
    return redirect(route('teacher.question.index'))->with('info','Thêm câu hỏi thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function showEdit($id)
    {
       $this->data['question']= $this->questionService->find($id);
       return View('teacher.pages.question.edit', $this->data); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatequestionRequest  $request
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatequestionRequest $request, question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function delete($id = null)
    {
        $this->questionService->delete($id);
        return redirect(route('teacher.question.index'))->with('info','Xóa thành công');
    }
}
