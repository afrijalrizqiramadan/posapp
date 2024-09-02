<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function groupPermissionPerMenu()
    {
        $menus = [
            'dashboard' => [
                'dashboard.santri',
                'dashboard.guru',
                'dashboard.keuangan',
                'dashboard.tabungan',
                'dashboard.inventaris',
            ],
            'santri' => [
                'kesantrian.santri.view',
                'kesantrian.tahfidz.view',
                'kesantrian.kesehatan.view',
                'kesantrian.perizinan.view',
                'kesantrian.pelanggaran.view'
            ],
            'pegawai' => [
                'kepegawaian.guru.view',
                'kepegawaian.jabatan.view',
                'kepegawaian.penunjukan.view',
                'kepegawaian.pengguna.view',
                'kepegawaian.hak_akses.view'
            ],
            'administrasisurat' => [
                'administrasisurat.surat_masuk.view',
                'administrasisurat.surat_keluar.view',
                'administrasisurat.administrasi_surat.view',
            ],
            'akademik' => [
                'akademik.unit_sekolah.view',
                'akademik.asrama.view',
                'akademik.kamar.view',
                'akademik.konsulat.view',
                'akademik.madin.view',
                'akademik.kelas_alquran.view',
                'akademik.tahun_ajaran.view',
                'akademik.kelas.view',
                'akademik.pindah_kelas.view',
                'akademik.ubah_status_santri.view',
                'akademik.kelulusan.view',
                'akademik.mata_pelajaran.view',
                'akademik.jadwal_pelajaran.view',
                'akademik.penilaian.view',
            ],
            'master' => [
                'master.kategori_perizinan.view',
                'master.kategori_penghasilan.view',
                'master.kategori_pekerjaan.view',
                'master.kategori_status_mukim.view',
                'master.kategori_program_pesantren.view',
                'master.kategori_mata_pelajaran.view',
                'master.status_penanganan_kesehatan.view',
                'master.kategori_pendidikan.view',
                'master.kategori_hubungan_wali.view',
                'master.kategori_status_anak.view',
                'master.kategori_status_pernikahan.view',
                'master.kategori_status_rumah.view',
                'master.penindakan_pelanggaran.view',
                'master.kategori_penghargaan.view',
                'master.kategori_tahfidz.view',
                'master.hafalan_aurad.view',
                'master.jadwal_makan.view',
                'master.jadwal_sholat.view',
                'master.jadwal_jam_mata_pelajaran.view',
                'master.administrasi_surat.view'
            ],
            'master_kesantrian' => [
                'master.kategori_perizinan.view',
                'master.kategori_penghasilan.view',
                'master.kategori_pekerjaan.view',
                'master.status_penanganan_kesehatan.view',
                'master.kategori_status_rumah.view',
                'master.penindakan_pelanggaran.view',
                'master.kategori_pendidikan.view',
                'master.kategori_hubungan_wali.view',
                'master.kategori_status_anak.view',
            ],
            'master_kepegawaian' => [
                'master.kategori_status_pernikahan.view'
            ],
            'master_akademik' =>  [
                'master.kategori_status_mukim.view',
                'master.kategori_program_pesantren.view',
                'master.kategori_mata_pelajaran.view',
            ],
            'tahfidz' => [
                'master.kategori_tahfidz.view',
                'master.hafalan_aurad.view',
            ],
            'jadwal' => [
                'master.jadwal_makan.view',
                'master.jadwal_sholat.view',
                'master.jadwal_jam_mata_pelajaran.view',
            ], 'presensi' => [
                'presensi.absensi_pegawai.view',
                'presensi.absensi_makan_santri.view',
                'presensi.absensi_kelas_perjam.view',
                'presensi.absensi_kelas_perhari.view',
                'presensi.absensi_sholat_berjamaah.view',
                'presensi.kunjungan_wali_santri.view',
            ],
            'cetak' => [
                'cetak.kartu_santri.view',
                'cetak.kartu_kesehatan.view',
                'cetak.kartu_wali_santri.view',
                'cetak.buku_induk_santri.view',
                'cetak.biodata_pegawai.view',
                'cetak.kartu_pegawai.view',
            ],
            'informasi' => [
                'informasi.berita.view',
                'informasi.broadcast_pesan.view',
                'informasi.broadcast_tagihan_pembayaran.view'
            ],
            'pengaturan' => [
                'pengaturan.general.view',
                'pengaturan.general_setting.view',
                'pengaturan.pengguna.view',
                'pengaturan.data_instansi.view',
                'pengaturan.template_kartu.view',
                'pengaturan.administrasi_surat.view',
            ],
            'tabungan' => [
                'tabungan.transaksi_tabungan.view',
                'tabungan.data_titipan_khusus.view',
                'tabungan.transaksi_titipan_khusus.view',
                'tabungan.limit_transaksi_cashless.view',
                'tabungan.kondisi_kas_tab.view',
            ],
            'keuangan' => [
                'keuangan.pembayaran_santri.view',
                'keuangan.pembayaran_transfer.view',
                'keuangan.akun_biaya.view',
                'keuangan.pos_bayar.view',
                'keuangan.jenis_bayar.view',
                'keuangan.pajak.view',
                'keuangan.kas_bank.view',
                'keuangan.setting_penggajian.view',
                'keuangan.slip_gaji.view',
                'keuangan.kas_masuk.view',
                'keuangan.kas_keluar.view',
                'keuangan.transfer_kas.view',
                'keuangan.pos_hutang.view',
                'keuangan.setting_hutang.view',
                'keuangan.bayar_hutang.view',
                'keuangan.pos_piutang.view',
                'keuangan.setting_piutang.view',
                'keuangan.bayar_piutang.view',
                'keuangan.laporan_tagihan.view',
                'keuangan.laporan_jurnal_umum.view'
            ],
            'keuangan_setting_pembayaran' => [
                'keuangan.akun_biaya.view',
                'keuangan.pos_bayar.view',
                'keuangan.jenis_bayar.view',
                'keuangan.pajak.view',
                'keuangan.kas_bank.view',
            ],
            'keuangan_penggajian' => [
                'keuangan.setting_penggajian.view',
                'keuangan.slip_gaji.view',
            ],
            'keuangan_transaksi_kas' => [
                'keuangan.kas_masuk.view',
                'keuangan.kas_keluar.view',
                'keuangan.transfer_kas.view',
            ],
            'keuangan_hutang' => [
                'keuangan.pos_hutang.view',
                'keuangan.setting_hutang.view',
                'keuangan.bayar_hutang.view',
            ],
            'keuangan_piutang' => [
                'keuangan.pos_piutang.view',
                'keuangan.setting_piutang.view',
                'keuangan.bayar_piutang.view',
            ],
            'keuangan_laporan' => [
                'keuangan.laporan_tagihan.view',
                'keuangan.laporan_jurnal_umum.view'
            ]
        ];

        return $menus;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $permissionsPerMenu = $this->groupPermissionPerMenu();
        return view('components.navbar', [
            'permissions_per_menu' => $permissionsPerMenu
        ]);
    }
}
