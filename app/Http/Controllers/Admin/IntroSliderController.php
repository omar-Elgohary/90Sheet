<?php

namespace App\Http\Controllers\Admin;

use App\Traits\ReportTrait;
use App\Models\IntroSlider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\IntroSliders\Store;
use App\Http\Requests\Admin\IntroSliders\Update;

class IntroSliderController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $sliders = IntroSlider::search($request)->paginate(30);
            $html = view('admin.introsliders.table' ,compact('sliders'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.introsliders.index');
    }
  

    public function create()
    {
        return view('admin.introsliders.create');
    }

    public function store(Store $request)
    {
        IntroSlider::create($request->validated());
        ReportTrait::addToLog('اضافة صورة لقسم البنرات الخاص بالموقع التعريفي') ;
        return response()->json(['status'=>'success', 'msg'=>__('admin.added_successfully'), 'url' => route('admin.introsliders.index')]);
    }

    public function edit($id)
    {
        $slider = IntroSlider::findOrFail($id);
        return view('admin.introsliders.edit' , ['slider' => $slider]);
    }

    public function update(Update $request, $id)
    {
        IntroSlider::findOrFail($id)->update($request->validated());
        ReportTrait::addToLog('تعديل صورة في قسم البنرات الخاص بالموقع التعريفي') ;
        return response()->json(['status'=>'success', 'msg'=>__('admin.update_successfully'), 'url' => route('admin.introsliders.index')]);
    }

    public function show($id)
    {
        $slider = IntroSlider::findOrFail($id);
        return view('admin.introsliders.show' , ['slider' => $slider]);
    }

    public function destroy($id)
    {
        IntroSlider::findOrFail($id)->delete();
        ReportTrait::addToLog('حذف صورة من قسم البنرات الخاص بالموقع التعريفي') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (IntroSlider::whereIn('id' , $ids)->get()->each->delete($ids)) {
            ReportTrait::addToLog('حذف مجموعه من الصور في قسم البنرات الخاص بالموقع التعريفي') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
