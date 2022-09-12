<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDoList;
use Yajra\Datatables\Datatables;

class ToDoListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function NewTask(Request $request)
    {

        ToDoList::create([
            'Subject' => $request->Sub,
            'Description' => $request->Des
        ]);

        return response()->json([
            'message' => $request->all(),
            'alert' => 'success'
        ]);
    }

    public function EditTask(Request $request)
    {
        $ToDoList = ToDoList::find($request->id);
        $ToDoList->Subject = $request->Sub;
        $ToDoList->Description = $request->Des;
        $ToDoList->save();

        return response()->json([
            'message' => $request->all(),
            'alert' => 'success'
        ]);
    }

    public function DoneTask(Request $request)
    {
        $ToDoList = ToDoList::find($request->id);
        $ToDoList->Status = 'Done';
        $ToDoList->save();

        return response()->json([
            'message' => $request->all(),
            'alert' => 'success'
        ]);
    }

    public function DeleteTask(Request $request)
    {
        $ToDoList = ToDoList::find($request->id);
        $ToDoList->delete();

        return response()->json([
            'message' => $request->all(),
            'alert' => 'success'
        ]);
    }

    public function GetListTask(Request $request)
    {
        if($request->ajax()){

            $ToDoList = ToDoList::all();

                    return Datatables::of($ToDoList)
                        ->addIndexColumn()
                        ->addColumn('Task', function($ToDoList){
                            $Subject = $ToDoList->Subject;
                            // return $NamaIpt;
                            return 
                            '<h5 style="white-space:nowrap; color:black;">'.$ToDoList->Subject.'</h5>'.
                            '<h7 style="white-space:nowrap;">'.nl2br($ToDoList->Description).'</h7>';
                        })
                        ->addColumn('Status', function($ToDoList){
                            if ($ToDoList->Status == 'In Process') {
                                return
                                '<div class="text-center">'.
                                '<span style="border: 2px solid blueviolet; border-radius: 5px; background-color: blueviolet;">'.
                                '<label style=" color: white;">&ensp;'.$ToDoList->Status.'&ensp;</label>'.
                                '</span>'.
                                '</div>';
                            }else{
                                return
                                '<div class="text-center">'.
                                '<span style="border: 2px solid mediumaquamarine; border-radius: 5px; background-color: mediumaquamarine;">'.
                                '<label style=" color: white;">&ensp;'.$ToDoList->Status.'&ensp;</label>'.
                                '</span>'.
                                '</div>';
                            }
                        })
                        ->addColumn('Action', function($ToDoList){
                            if ($ToDoList->Status == 'In Process') {
                                return
                                '<div class="text-center">'.
                                '<span data-toggle="modal" data-idtask="'.$ToDoList->id.'" data-target="#doneModal">'.
                                '<button class="btn btn-sm btn-done" data-toggle="tooltip" data-placement="top" title="Done">'.
                                '<i class="fas fa-check"></i>'.
                                '</button>'.
                                '</span>'.
                                '&nbsp;'.
                                '<span data-toggle="modal" data-sub="'.$ToDoList->Subject.'" data-des="'.$ToDoList->Description.'" data-idtask="'.$ToDoList->id.'" data-target="#editModal">'.
                                '<button class="btn btn-sm btn-edit" data-toggle="tooltip" data-placement="top" title="Edit">'.
                                '<i class="fas fa-pen"></i>'.
                                '</button>'.
                                '</span>'.
                                '&nbsp;'.
                                '<span data-toggle="modal" data-idtask="'.$ToDoList->id.'" data-target="#deleteModal">'.
                                '<button class="btn btn-sm btn-delete" data-toggle="tooltip" data-placement="top" title="Delete">'.
                                '<i class="far fa-trash-alt"></i>'.
                                '</button>'.
                                '</span>'.
                                '</div>';
                            }else{
                                return
                                '<div class="text-center">'.
                                '<span data-toggle="modal" data-idtask="'.$ToDoList->id.'" data-target="#deleteModal">'.
                                '<button class="btn btn-sm btn-delete" data-toggle="tooltip" data-placement="top" title="Delete">'.
                                '<i class="far fa-trash-alt"></i>'.
                                '</button>'.
                                '</span>'.
                                '</div>';
                            }
                        })
                        ->rawColumns(['Action', 'Task', 'Status'])
                        ->make(true);
                }
    }
}
