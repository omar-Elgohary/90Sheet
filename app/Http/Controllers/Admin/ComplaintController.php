<?php

namespace App\Http\Controllers\Admin;

use App\Models\Complaint;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ReportTrait;

class ComplaintController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $complaints = Complaint::search($request)->paginate(30);
            $html       = view('admin.complaints.table', compact('complaints'))->render();
            return response()->json(['html' => $html]);
        }
        return view('admin.complaints.index');
    }

    public function show($id)
    {
        $complaint = Complaint::findOrFail($id);
        return view('admin.complaints.show', compact('complaint'));
    }

    public function replay(Request $request, $id)
    {
        $complaint = Complaint::findOrFail($id);
        auth('admin')->user()->replays()->create(['replay' => $request->replay, 'complaint_id' => $id]);
        return response()->json(['url' => route('admin.all_complaints')]);
    }

    public function destroy($id)
    {
        $complaint = Complaint::findOrFail($id)->delete();
        ReportTrait::addToLog('  حذف شكوي');
        return response()->json(['id' => $id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);

        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Complaint::whereIn('id', $ids)->get()->each->delete()) {
            ReportTrait::addToLog('  حذف العديد من الشكاوي والمقترحات');
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
