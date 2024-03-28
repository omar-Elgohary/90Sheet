<?php

namespace App\Http\Controllers\Admin;

use App\Models\Seo;
use App\Traits\ReportTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Seo\Create;

class SeoController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $seos = Seo::search($request)->paginate(30);
            $html = view('admin.seos.table' ,compact('seos'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.seos.index');
    }
  
    public function create()
    {
        return view('admin.seos.create');
    }

    public function store(Create $request)
    {
        Seo::create($request->validated());
        ReportTrait::addToLog('اضافه seo') ;
        return response()->json(['status'=>'success', 'msg'=>__('admin.added_successfully'),'url' => route('admin.seos.index')]);
    }

    public function edit($id)
    {
        $seo = Seo::findOrFail($id);
        return view('admin.seos.edit' , ['seo' => $seo]);
    }

    public function show($id)
    {
        $seo = Seo::findOrFail($id);
        return view('admin.seos.show' , ['seo' => $seo]);
    }
    public function update(Create $request, $id)
    {
        Seo::findOrFail($id)->update($request->validated());
        ReportTrait::addToLog('تعديل seo') ;
        return response()->json(['status'=>'success', 'msg'=>__('admin.update_successfully'),'url' => route('admin.seos.index')]);
    }

    public function destroy($id)
    {
        $admin = Seo::findOrFail($id)->delete();
        ReportTrait::addToLog('حذف seo') ;
        return response()->json(['id' =>$id]);
    }


    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Seo::whereIn('id' , $ids)->get()->each->delete()) {
            ReportTrait::addToLog('حذف مجموعه من ال seo') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }

}
