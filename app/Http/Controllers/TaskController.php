<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use \App\Task;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects[] =  ['id' => 1, 'name' => 'crq'];
        $subjects[] =  ['id' => 2, 'name' => 'mcq'];
        $subjects[] =  ['id' => 3, 'name' => 'osce'];
        $subjects[] =  ['id' => 4, 'name' => 'crq board'];
        $subjects[] =  ['id' => 5, 'name' => 'mcq board'];
        $subjects[] =  ['id' => 6, 'name' => 'osce board'];
        $subjects[] =  ['id' => 7, 'name' => 'PIE'];
    
        $data = request()->all();
        // $tasks = Task::all();
        return view('score.index')
                    ->with([
                        'tasks'=>Task::all(),
                        'subjects'=> $subjects
                        ]);
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects[] = ['id' => 1, 'name' => 'CRQ' ];
        $subjects[] = ['id' => 2, 'name' => 'MCQ' ];
        $subjects[] = ['id' => 3, 'name' => 'OSCE' ];
        $subjects[] = ['id' => 4, 'name' => 'CRQ Board' ];
        $subjects[] = ['id' => 5, 'name' => 'McQ Board' ];
        $subjects[] = ['id' => 6, 'name' => 'OSCE Board' ];
        $subjects[] = ['id' => 7, 'name' => 'PIE' ];

        return view('score.create')->with(['subjects'=> $subjects]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        // $task = new App\Task(); //รับ request ทีละตัวเพื่อเก็บลงฐานข้อมูล
        // $task->year = $request->year;
        // $task->subject = $request->subject;
        // $task->save();     

        $validaton = $request->validate([
            'year' =>'required',
            'subject' => 'required'
        ]);
        $task = Task::create($request->all());    //function create รับ request all มาแล้วบันทึกลงฐานข้อมูล แต่ต้องเขียน fillable ที่ model  
        if($request->hasFile('file_upload')){
            $path = $request->file('file_upload')->store('/public');//เก็บ file ลงใน storage/app/public

            $filename = pathinfo($path );//save ชื่อ file ลงใน DB

            $task->file_upload = $filename['basename'];
            $task->update();
            
            //return Storage::download($path);//ให้สามารถdownload file ได้
             
            $crqimport = new \App\Imports\CrqImport();
            $crqimport->import(storage_path('app/'.$path));


            return Storage::url($path); //return url ที่เข้าถึง file นั้นมาให้
        }else{
            return 'no file';
        }
        return redirect()->back()->with('success', 'Created Successfully !!');
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
        $subjects[] = ['id' => 1, 'name' => 'CRQ' ];
        $subjects[] = ['id' => 2, 'name' => 'MCQ' ];
        $subjects[] = ['id' => 3, 'name' => 'OSCE' ];
        $subjects[] = ['id' => 4, 'name' => 'CRQ Board' ];
        $subjects[] = ['id' => 5, 'name' => 'McQ Board' ];
        $subjects[] = ['id' => 6, 'name' => 'OSCE Board' ];
        $subjects[] = ['id' => 7, 'name' => 'PIE' ];

        $task = Task::find($id);
        $tasks = Task::all();
        // return view('score.edit')->with(['task'=>$task, 'subjects'=>$subjects]);
        return view('score.index')->with([
                                            'task'=>$task, 
                                            'subjects'=>$subjects,
                                            'task'=>$task, //task ที่เรา find ขึ้นมาอันเดียว
                                            'tasks'=>$tasks, //tasks ที่ดึงข้อมูลมาทั้งหมด
                                            ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validaton = $request->validate([
            'year' =>'required',
            'subject' => 'required'
        ]);
    
        Task::find($id)->update($request->all());
        return redirect()->back()->with('success', 'Edited Successfully !!');
        // return $request->all();
    }

    public function updateStatus(Task $task){
        $task->update(request()->all());
        return back();
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
