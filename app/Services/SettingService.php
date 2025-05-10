<?php

namespace App\Services;

use App\Models\setting;
use App\Repositories\Setting\SettingRepository;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;


class SettingService extends BaseService
{
    protected $settingRepository;

    public function __construct(SettingRepository $settingRepository)
    {
        parent::__construct();
        $this->settingRepository = $settingRepository;
    }

    public function loadViewData()
    {
        $settingGroups = $this->settingRepository->getDataTableQuery();

        $setting = [];
        foreach ($settingGroups as $value) {
            $setting[] = $this->settingRepository->getSetting($value);
        }

        $this->otherData([
            'settingGroups' => $settingGroups,
            'setting' => $setting,
        ]);

        return $this->retunData;
    }

    public function update($request)
    {
        DB::beginTransaction();
        try {

            $data = $request->all();

            $settingTable = Setting::get(['name', 'input_type']);

            foreach ($settingTable as $key => $value) {

                switch ($value->input_type) {
                    case 'image':
                        $validator = \Validator::make($request->all(), [
                            $value->name => 'nullable|image',
                        ]);
                        if (!$validator->fails() && $request->file($value->name)) {

                            if ($request->file('site_logo')) {
                                $path = $request->file('site_logo');
                                $name_gen = hexdec(uniqid()) . '.' . $path->getClientOriginalExtension();
                                Image::make($path)->resize(230, 70)->save('upload/setting/' . $name_gen);
                                $save_url = 'upload/setting/' . $name_gen;
                                if ($path) {
                                    Setting::where(['name' => $value->name])->where('is_visible', 'yes')->update(['value' => $save_url]);
                                }
                            } elseif ($request->file('image_about')) {
                                $path = $request->file('image_about');
                                $name_gen = hexdec(uniqid()) . '.' . $path->getClientOriginalExtension();
                                Image::make($path)->resize(470, 470)->save('upload/setting/' . $name_gen);
                                $save_url = 'upload/setting/' . $name_gen;
                                if ($path) {
                                    Setting::where(['name' => $value->name])->where('is_visible', 'yes')->update(['value' => $save_url]);
                                }
                            } elseif ($request->file('logo')) {
                                $path = $request->file('logo');
                                $name_gen = hexdec(uniqid()) . '.' . $path->getClientOriginalExtension();
                                Image::make($path)->save('upload/setting/' . $name_gen);
                                $save_url = 'upload/setting/' . $name_gen;
                                if ($path) {
                                    Setting::where(['name' => $value->name])->where('is_visible', 'yes')->update(['value' => $save_url]);
                                }
                            }
                            elseif ($request->file('video_image')) {
                                $path = $request->file('video_image');
                                $name_gen = hexdec(uniqid()) . '.' . $path->getClientOriginalExtension();
                                Image::make($path)->resize(623, 384)->save('upload/setting/' . $name_gen);
                                $save_url = 'upload/setting/' . $name_gen;
                                if ($path) {
                                    Setting::where(['name' => $value->name])->where('is_visible', 'yes')->update(['value' => $save_url]);
                                }
                            }
                        }
                        break;

                    case 'file':
                        $validator = \Validator::make($request->all(), [
                            $value->name => 'nullable|mimes:pdf|max:51200', // Max 5MB
                        ]);

                        if (!$validator->fails()) {
                            if ($request->hasFile($value->name)) {
                                $file = $request->file($value->name);
                                $filename = time() . '_' . $file->getClientOriginalName();
                                $path = $file->storeAs('uploads/pdfs', $filename, 'public');

                                $oldPath = Setting::where('name', $value->name)->value('value');
                                if ($oldPath && \Storage::disk('public')->exists($oldPath)) {
                                    \Storage::disk('public')->delete($oldPath);
                                }

                                Setting::where(['name' => $value->name])
                                    ->where('is_visible', 'yes')
                                    ->update(['value' => $path]);
                            }
                        }
                        break;

                    default:
                        if (isset($data[$value->name])) {
                            $valueToUpdate = $data[$value->name];
                            if (is_array($valueToUpdate)) {
                                $valueToUpdate = @serialize($valueToUpdate);
                            }
                            Setting::where(['name' => $value->name])->where('is_visible', 'yes')->update(['value' => $valueToUpdate]);
                        } else {
                            Setting::where(['name' => $value->name])->where('is_visible', 'yes')->update(['value' => '']);
                        }
                        break;
                }

            }

            DB::commit();
            return ['status' => true];
        }catch (\Exception $e) {
            DB::rollback();
            errorLog($e->getMessage());
            return false;
        }
    }


}
