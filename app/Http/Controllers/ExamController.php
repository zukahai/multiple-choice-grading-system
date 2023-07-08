<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;
use App\Http\Services\ExamService;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public $data = [];
    protected $limit = 10;
    public function __construct(ExamService $examService){
        $this->examService = $examService;
    }
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $listExam = $this->examService->paginate($this->limit,$keyword);
        $this->data['exams'] = $listExam;
        return View('teacher.pages.Exam.index',$this->data);
    }

    public function showCreate()
    {
        return View('teacher.pages.Exam.create');
    }

    public function create(Request $request)
    {
        // dd(auth()->user()->id);
        $this->examService->add(auth()->id(), $request->name, $request->time_start, 
    $request->time_end );
    return redirect(route('teacher.exam.index'))->with('info','Thêm đề thi thành công');
    }

  
    public function showEdit($id)
    {
       $this->data['exam']= $this->examService->find($id);
       return View('teacher.pages.Exam.edit', $this->data); 
    }

    public function edit($id, Request $request){
        $exam = $this->examService->find($id);
        $data['user_id'] = auth()->id();
        $data['name'] = $request->name;
        $data['time_start'] = $request->time_start;
        $data['time_end'] = $request->time_end;
        $this->examService->update($id, $data);
        return redirect(route('teacher.exam.index'))->with('info','Cập nhật đề thi thành công');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExamRequest  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExamRequest $request, Exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        //
    }
}
