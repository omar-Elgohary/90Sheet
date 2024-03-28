<?php

namespace App\Http\Controllers\Admin;

use App\Traits\ReportTrait;
use App\Models\Category ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Admin\categories\Store;
use App\Http\Requests\Admin\categories\Update;

class CategoryController extends Controller
{
    public function index(Request $request, $id = null)
    {
        if (request()->ajax()) {
            $categories = Category::where('parent_id' , $id)->search($request)->paginate(30);
            $html = view('admin.categories.table' ,compact('categories'))->render() ;
            return response()->json(['html' => $html]);
        }
        $categories = Category::latest()->get();
        return view('admin.categories.index' ,compact('categories' , 'id'));
    }

    public function export() 
    {
        return Excel::download(new CategoryExport, 'users.xlsx');
    }

    public function create($id = null)
    {
        $categories = Category::latest()->get();
        return view('admin.categories.create' , compact('categories' , 'id'));
    }

    public function store(Store $request)
    {
        Category::create($request->validated() );
        ReportTrait::addToLog('  اضافه قسم') ;
        return response()->json(['status'=>'success', 'msg'=>__('admin.added_successfully'),'url' => route('admin.categories.index')]);
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::latest()->get();
        return view('admin.categories.edit' , ['category' => $category , 'categories' => $categories]);
    }

    public function update(Update $request, $id)
    {
        $category = Category::findOrFail($id)->update($request->validated());
        ReportTrait::addToLog('  تعديل قسم') ;
        return response()->json(['status'=>'success', 'msg'=>__('admin.update_successfully'),'url' => route('admin.categories.index')]);
    }
    
     public function show($id)
     {
         $category = Category::findOrFail($id);
         $categories = Category::get();
         return view('admin.categories.show' , ['category' => $category , 'categories' => $categories]);
     }

    public function destroy($id)
    {
        $category = Category::findOrFail($id)->delete();
        ReportTrait::addToLog('  حذف قسم') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Category::WhereIn('id',$ids)->get()->each->delete()) {
            ReportTrait::addToLog('  حذف العديد من الاقسام') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
