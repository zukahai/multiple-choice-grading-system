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
    public function indexAdmin(Request $request)
    {
        $keyword = $request->keywords;
        $listQuestion = $this->questionService->paginate($this->limit,$keyword);
        $this->data['questions'] = $listQuestion;
        return View('admin.pages.question.index',$this->data);
        
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
    public function showCreateAdmin()
    {
        return View('admin.pages.question.create');
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
    public function createAdmin(Request $request)
    {
        // dd(auth()->user()->id);
        $this->questionService->add(auth()->id(), $request->question, $request->choicea, 
    $request->choiceb, $request->choicec, $request->choiced, $request->ans );
    return redirect(route('admin.question.index'))->with('info','Thêm câu hỏi thành công');
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

    public function edit($id, Request $request){
        $question = $this->questionService->find($id);
        $data['user_id'] = auth()->id();
        $data['question'] = $request->question;
        $data['choicea'] = $request->choicea;
        $data['choiceb'] = $request->choiceb;
        $data['choicec'] = $request->choicec;
        $data['choiced'] = $request->choiced;
        $data['ans'] = $request->ans;
        $this->questionService->update($id, $data);
        return redirect(route('teacher.question.index'))->with('info','Cập nhật câu hỏi thành công');
    }

    public function showEditAdmin($id)
    {
       $this->data['question']= $this->questionService->find($id);
       return View('admin.pages.question.edit', $this->data); 
    }

    public function editAdmin($id, Request $request){
        $question = $this->questionService->find($id);
        $data['user_id'] = auth()->id();
        $data['question'] = $request->question;
        $data['choicea'] = $request->choicea;
        $data['choiceb'] = $request->choiceb;
        $data['choicec'] = $request->choicec;
        $data['choiced'] = $request->choiced;
        $data['ans'] = $request->ans;
        $this->questionService->update($id, $data);
        return redirect(route('admin.question.index'))->with('info','Cập nhật câu hỏi thành công');
    }

    public function editStatusQAdmin(Request $request){
        $data = ['status' => "Đã duyệt"];
        $this->questionService->update($request->id, $data);
        return redirect(route('admin.question.index'))->with('info','Cập nhật câu hỏi thành công');
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
    public function deleteAdmin($id = null)
    {
        $this->questionService->delete($id);
        return redirect(route('admin.question.index'))->with('info','Xóa thành công');
    }
}
