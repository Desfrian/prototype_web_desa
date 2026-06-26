<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\ComplaintCategory;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function create()
    {
        $categories = ComplaintCategory::all();
        return view('frontend.complaint.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sender_name'             => 'required|string|max:100',
            'sender_phone'            => 'required|string|max:20',
            'sender_address'          => 'nullable|string|max:200',
            'complaint_category_id'   => 'required|exists:complaint_categories,id',
            'content'                 => 'required|string|min:20',
        ]);

        // Simpan ke database
        $complaint = Complaint::create($validated);

        // Ambil nama kategori
        $categoryName = ComplaintCategory::find($validated['complaint_category_id'])->name;

        // Ambil nomor WA admin dari settings
        $waNumber = SiteSetting::get('whatsapp_number', '62895634707159');

        // Buat pesan WhatsApp
        $message = "Halo Admin Desa Amanah 👋\n\n";
        $message .= "Saya ingin menyampaikan pengaduan:\n";
        $message .= "━━━━━━━━━━━━━━━━━━\n";
        $message .= "👤 Nama     : {$validated['sender_name']}\n";
        $message .= "📱 No HP    : {$validated['sender_phone']}\n";
        $message .= "🏠 Alamat   : " . ($validated['sender_address'] ?? '-') . "\n";
        $message .= "📋 Kategori : {$categoryName}\n";
        $message .= "━━━━━━━━━━━━━━━━━━\n";
        $message .= "📝 Isi Pengaduan:\n{$validated['content']}\n\n";
        $message .= "Mohon tindak lanjutnya. Terima kasih 🙏";

        $encodedMessage = urlencode($message);
        $waUrl = "https://wa.me/{$waNumber}?text={$encodedMessage}";

        return redirect($waUrl);
    }
}