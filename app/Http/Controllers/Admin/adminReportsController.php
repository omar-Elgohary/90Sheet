<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\adminreports\Store;
use App\Http\Requests\Admin\adminreports\Update;
use App\Models\Admin;
use App\Models\adminReports ;
use App\Traits\ReportTrait;


class adminReportsController extends Controller
{
    public function AdminFinancial(){
        $superAdmin = Admin::find(1) ;
        $transactions = $superAdmin->transactions()->paginate(10); 
        return view('admin.adminreports.table' , compact('transactions')) ;
    }
    // public function index(Request $request)
    // {
    //     if (request()->ajax()) {
    //         $adminreports = adminReports::search($request)->paginate(4);
    //         $html = view('admin.adminreports.table' ,compact('adminreports'))->render() ;
    //         return response()->json(['html' => $html]);
    //     }
    //     return view('admin.adminreports.index');
    // }

    // public function create()
    // {
    //     return view('admin.adminreports.create');
    // }


    // public function store(Store $request)
    // {
    //     adminReports::create($request->validated());
    //     Report::addToLog('  اضافه تقرير') ;
    //     return response()->json(['url' => route('admin.adminreports.index')]);
    // }
    // public function edit($id)
    // {
    //     $adminreports = adminReports::findOrFail($id);
    //     return view('admin.adminreports.edit' , ['adminreports' => $adminreports]);
    // }

    // public function update(Update $request, $id)
    // {
    //     $adminreports = adminReports::findOrFail($id)->update($request->validated());
    //     Report::addToLog('  تعديل تقرير') ;
    //     return response()->json(['url' => route('admin.adminreports.index')]);
    // }

    // public function show($id)
    // {
    //     $adminreports = adminReports::findOrFail($id);
    //     return view('admin.adminreports.show' , ['adminreports' => $adminreports]);
    // }
    // public function destroy($id)
    // {
    //     $adminreports = adminReports::findOrFail($id)->delete();
    //     Report::addToLog('  حذف تقرير') ;
    //     return response()->json(['id' =>$id]);
    // }

    // public function destroyAll(Request $request)
    // {
    //     $requestIds = json_decode($request->data);
        
    //     foreach ($requestIds as $id) {
    //         $ids[] = $id->id;
    //     }
    //     if (adminReports::WhereIn('id',$ids)->get()->each->delete()) {
    //         Report::addToLog('  حذف العديد من التقارير') ;
    //         return response()->json('success');
    //     } else {
    //         return response()->json('failed');
    //     }
    // }
}
