<?php

namespace App\Http\Controllers\Admin;

use App\Traits\ReportTrait;
use Illuminate\Http\Request;
use App\Models\IntroMessages;
use App\Http\Controllers\Controller;

class IntroMessagesController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $messages = IntroMessages::search($request)->paginate(30);
            $html = view('admin.intromessages.table' ,compact('messages'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.intromessages.index');
    }

    public function show($id)
    {
        $message = IntroMessages::findOrFail($id);
        return view('admin.intromessages.show', compact('message'));
    }

    public function destroy($id)
    {
        IntroMessages::findOrFail($id)->delete();
        ReportTrait::addToLog('حذف رسالة خاصه من الرسائل المرسلة للموقع التعريفي') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (IntroMessages::whereIn('id' , $ids)->get()->each->delete()) {
            ReportTrait::addToLog('حذف العديد من الرسائل الخاصه من الرسائل المرسلة للموقع التعريفي') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
