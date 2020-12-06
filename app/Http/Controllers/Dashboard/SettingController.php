<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Setting\UpdateRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting::first();
    }

    public function index()
    {
        return view('dashboard.settings.index', [
            'title' => trans('site.setting'),
            'setting'   => $this->setting

        ]);
    }

    public function update(UpdateRequest $request)
    {
         $data = array_filter($request->all());

         if ($request->hasFile('dashboard_logo'))
         {
             Storage::disk('public')->delete($this->setting->dashboard_logo);
             $data['dashboard_logo'] = $request->dashboard_logo->store('setting', 'public');
         }

        if ($request->hasFile('admin_image'))
        {
            Storage::disk('public')->delete($this->setting->admin_image);
            $data['admin_image'] = $request->admin_image->store('setting', 'public');
        }

        $this->setting->update($data);
        toastSuccess(trans('site.setting_updated_successfully'));
        return redirect()->back();


    }
}
