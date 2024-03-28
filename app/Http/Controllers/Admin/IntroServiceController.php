<?php

namespace App\Http\Controllers\Admin;

use App\Traits\ReportTrait;
use App\Models\IntroService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\IntroServices\Store;

class IntroServiceController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $services = IntroService::search($request)->paginate(30);
            $html = view('admin.introservices.table' ,compact('services'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.introservices.index');
    }
  

    public function create()
    {
        return view('admin.introservices.create');
    }
    public function store(Store $request)
    {
        IntroService::create($request->validated());
        ReportTrait::addToLog('  اضافه خدمة الي قسم خدماتنا بالموقع التعريفي') ;
        return response()->json(['status'=>'success', 'msg'=>__('admin.added_successfully'), 'url' => route('admin.introservices.index')]);
    }

    public function edit($id)
    {
        $service = IntroService::findOrFail($id);
        return view('admin.introservices.edit' , ['service' => $service]);
    }

    public function update(Store $request, $id)
    {
        IntroService::findOrFail($id)->update($request->validated());
        ReportTrait::addToLog('  تعديل خدمة في قسم خدماتنا بالموقع التعريفي') ;
        return response()->json(['status'=>'success', 'msg'=>__('admin.update_successfully'), 'url' => route('admin.introservices.index')]);
    }


    public function show($id)
    {
        $service = IntroService::findOrFail($id);
        return view('admin.introservices.show' , ['service' => $service]);
    }

    public function destroy($id)
    {
        IntroService::findOrFail($id)->delete();
        ReportTrait::addToLog('  حذف خدمة من قسم خدماتنا بالموقع التعريفي') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (IntroService::whereIn('id' , $ids)->get()->each->delete()) {
            ReportTrait::addToLog('  حذف مجموعه من الخدمات من قسم خدماتنا بالموقع التعريفي') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
