<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'sifir_putra' => 'integer',
        'sifir_putri' => 'integer',
        'created_at' => 'datetime',
    ];

    protected $fillable = [
        'tahun','username','pjgt_nama','pjgt_id','nama_madrasah','nama_pesantren','negara','provinsi','kabupaten','kecamatan','desa','jalan_dusun','kode_pos','rt','rw','telepon','email',
        'pengasuh','pengasuh_hp','ketua_yayasan','ketua_yayasan_hp','sekretaris_yayasan','sekretaris_yayasan_hp','kepala_madrasah','kepala_madrasah_hp','tata_usaha','tata_usaha_hp','pjgt','pjgt_hp',
        'situasi_madrasah','komunikasi_bahasa','komunikasi_lainnya','mapel_aqidah','mapel_fiqh','mapel_ilmu_alat','mapel_quran','mapel_akhlaq','kbm_bahasa','kbm_lainnya','guru_laki','guru_perempuan',
        'sifir_putra','sifir_putri','ibtidaiyah_1_putra','ibtidaiyah_1_putri','ibtidaiyah_2_putra','ibtidaiyah_2_putri','ibtidaiyah_3_putra','ibtidaiyah_3_putri','ibtidaiyah_4_putra','ibtidaiyah_4_putri','ibtidaiyah_5_putra','ibtidaiyah_5_putri','ibtidaiyah_6_putra','ibtidaiyah_6_putri','tsanawiyah_1_putra','tsanawiyah_1_putri','tsanawiyah_2_putra','tsanawiyah_2_putri','tsanawiyah_3_putra','tsanawiyah_3_putri','mukim_putra','mukim_putri','tidak_mukim_putra','tidak_mukim_putri',
        'wil','status','butuh_gt','rapot','alamat_lengkap','dokumen_path'
    ];
}
