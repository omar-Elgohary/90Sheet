<?php

namespace App\Http\Controllers\Admin;

use App\Traits\ReportTrait;
use App\Models\IntroSocial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\IntroSocials\Store;

class IntroSocialController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $socials = IntroSocial::search($request)->paginate(30);
            $html = view('admin.introsocials.table' ,compact('socials'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.introsocials.index');
    }
  

    public function create()
    {
        return view('admin.introsocials.create');
    }

    public function store(Store $request)
    {
        IntroSocial::create($request->validated());
        ReportTrait::addToLog('  اضافه وسيلة تواصل لقسم وسائل التواصل الخاصة بالموقع التعريفي') ;
        return response()->json(['status'=>'success', 'msg'=>__('admin.added_successfully'), 'url' => route('admin.introsocials.index')]);
    }

    public function edit($id)
    {
        $social = IntroSocial::findOrFail($id);
        return view('admin.introsocials.edit' , ['social' => $social]);
    }

    public function update(Store $request, $id)
    {
        IntroSocial::findOrFail($id)->update($request->validated());
        ReportTrait::addToLog('  تعديل وسيلة تواصل  في قسم وسائل التواصل الخاصة بالموقع التعريفي') ;
        return response()->json(['status'=>'success', 'msg'=>__('admin.update_successfully'), 'url' => route('admin.introsocials.index')]);
    }

    public function show($id)
    {
        $social = IntroSocial::findOrFail($id);
        return view('admin.introsocials.show' , ['social' => $social]);
    }
    public function destroy($id)
    {
        IntroSocial::findOrFail($id)->delete();
        ReportTrait::addToLog('  حذف وسيلة تواصل  من قسم وسائل التواصل الخاصة بالموقع التعريفي') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (IntroSocial::whereIn('id' , $ids)->get()->each->delete()) {
            ReportTrait::addToLog('  حذف محموعه من وسائل التواصل  من قسم وسائل التواصل الخاصة بالموقع التعريفي') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
