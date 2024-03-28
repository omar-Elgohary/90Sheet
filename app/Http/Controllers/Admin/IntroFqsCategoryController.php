<?php

namespace App\Http\Controllers\Admin;

use App\Traits\ReportTrait;
use Illuminate\Http\Request;
use App\Models\IntroFqsCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\IntroFqsCategories\Store;

class IntroFqsCategoryController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $categories = IntroFqsCategory::search($request)->paginate(30);
            $html = view('admin.introfqscategories.table' ,compact('categories'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.introfqscategories.index');
    }

    public function create()
    {
        return view('admin.introfqscategories.create');
    }
    public function store(Store $request)
    {
        IntroFqsCategory::create($request->validated()) ;
        ReportTrait::addToLog('  اضافه قسم للاسئلة الشائعه الخاصه بالموقع التعريفي') ;
        return response()->json(['status'=>'success', 'msg'=>__('admin.added_successfully'),'url' => route('admin.introfqscategories.index')]);
    }

    public function edit($id)
    {
        $category = IntroFqsCategory::findOrFail($id);
        return view('admin.introfqscategories.edit' , ['category' => $category]);
    }

    public function update(Store $request, $id)
    {
        IntroFqsCategory::findOrFail($id)->update($request->validated());
        ReportTrait::addToLog('  تعديل قسم للاسئلة الشائعه الخاصه بالموقع التعريفي') ;
        return response()->json(['status'=>'success', 'msg'=>__('admin.update_successfully'),'url' => route('admin.introfqscategories.index')]);
    }
    public function show($id)
    {
        $category = IntroFqsCategory::findOrFail($id);
        return view('admin.introfqscategories.show' , ['category' => $category]);
    }

    public function destroy($id)
    {
        IntroFqsCategory::findOrFail($id)->delete();
        ReportTrait::addToLog('  حذف قسم للاسئلة الشائعه الخاصه بالموقع التعريفي') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (IntroFqsCategory::whereIn('id' , $ids)->delete()) {
            ReportTrait::addToLog('  حذف العديد من الاقسام للاسئلة الشائعه الخاصه بالموقع التعريفي') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
