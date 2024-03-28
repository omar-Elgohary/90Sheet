<?php

namespace App\Http\Controllers\Admin;

use App\Models\Intro ;
use App\Traits\ReportTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\intros\Store;
use App\Http\Requests\Admin\intros\Update;


class IntroController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $intros = Intro::search($request)->paginate(30);
            $html = view('admin.intros.table' ,compact('intros'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.intros.index');
    }
    
    public function create()
    {
        return view('admin.intros.create');
    }


    public function store(Store $request)
    {
        Intro::create($request->validated() );
        ReportTrait::addToLog('  اضافه صفحة تعريفية') ;
        return response()->json(['status'=>'success', 'msg'=>__('admin.added_successfully'), 'url' => route('admin.intros.index')]);
    }
    public function edit($id)
    {
        $intro = Intro::findOrFail($id);
        return view('admin.intros.edit' , ['intro' => $intro]);
    }

    public function update(Update $request, $id)
    {
        $intro = Intro::findOrFail($id)->update($request->validated() );
        ReportTrait::addToLog('  تعديل صفحة تعريفية') ;
		return response()->json(['status'=>'success', 'msg'=>__('admin.update_successfully'), 'url' => route('admin.intros.index')]);
    }

    public function show($id)
    {
        $intro = Intro::findOrFail($id);
        return view('admin.intros.show' , ['intro' => $intro]);
    }

    public function destroy($id)
    {
        $intro = Intro::findOrFail($id)->delete();
        ReportTrait::addToLog('  حذف صفحة تعريفية') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Intro::WhereIn('id',$ids)->get()->each->delete()) {
            ReportTrait::addToLog('  حذف العديد من الصفحات التعريفية') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
