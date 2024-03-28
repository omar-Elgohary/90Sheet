<?php

namespace App\Http\Controllers\Admin;

use App\Traits\ReportTrait;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.settings.index');
    }

    public function update(Request $request)
    {
        $request                  = $request->except(['_method', '_token']);
        $request['is_production'] = isset($request['is_production']) ? 1 : 0;
        Cache::forget('settings');
        foreach ($request as $key => $val) {
            if ($val != NULL) {
                $setting = SiteSetting::where('key', $key)->first();

                if (!$setting) {
                    SiteSetting::create(['key' => $key, 'value' => $val]);
                } else {
                    $setting->update(['value' => $val]);
                }
            }
        }
        ReportTrait::addToLog('تعديل الاعدادت');
        return back()->with('success', 'تم الحفظ');
    }


    public function messageAll(Request $request, $type)
    {

        $this->userRepo->messageAll($request->all(), $type);
        return back()->with('success', 'تم الارسال');
    }

    public function messageOne(Request $request, $type)
    {

        $this->userRepo->messageOne($request->all(), $type);
        return back()->with('success', 'تم الارسال');
    }

    public function sendEmail(Request $request)
    {

        $this->settingRepo->sendEmail($request->all());
        return back()->with('success', 'تم الارسال');
    }
}
