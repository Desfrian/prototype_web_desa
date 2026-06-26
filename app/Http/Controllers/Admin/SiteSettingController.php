<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::all()->pluck('value', 'key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name'       => 'required|string|max:100',
            'address'         => 'required|string',
            'phone'           => 'required|string|max:20',
            'email'           => 'required|email',
            'whatsapp_number' => 'required|string|max:20',
            'office_hours'    => 'required|string|max:100',
            'maps_embed_url'  => 'nullable|string',
        ]);

        $fields = [
            'site_name', 'site_tagline', 'address', 'phone',
            'email', 'whatsapp_number', 'office_hours', 'maps_embed_url',
        ];

        foreach ($fields as $key) {
            SiteSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $request->input($key, '')]
            );
        }

        return redirect()->route('admin.settings.index')
                         ->with('success', 'Pengaturan berhasil disimpan!');
    }
}