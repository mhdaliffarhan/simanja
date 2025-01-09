<?php

namespace App\Livewire;

use App\Exports\TemplateExport;

use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use App\Models\Produk;
use App\Models\Penyedia;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class ImportData extends Component
{
    use WithFileUploads;

    public $file;
    public function downloadTemplate(){
        return Excel::download(new TemplateExport, 'template.xlsx');
    }


    public function import(){
        // try {
            $this->validate([
                'file' => 'required|mimes:xlsx'
            ]);

            $file = $this->file;
            $data = Excel::toArray(new TemplateExport, $file);
            $dataproduk = $data[0];
            foreach ($dataproduk as $key => $item) {
                // Buang Header
                if ($key == 0) {
                    continue;
                }
                // Pastikan dulu bawha kode produk telah ada atau belum pada database, jika kode produk telah ada maka lakukan update data, jika belum maka tambahkan
                $produk = Produk::where('kode', $item[0])->first();
                if ($produk) {
                    $produk->update([
                        'nama' => $item[1],
                        'satuan' => $item[2],
                    ]);
                    continue;
                } else {
                    $produk = new Produk();
                    $produk->kode = $item[0];
                    $produk->nama = $item[1];
                    $produk->satuan = $item[2];
                    $produk->save();
                }
            }
            $datapenyedia = $data[1];
            foreach ($datapenyedia as $key => $item) {
                // Buang Header
                if ($key == 0) {
                    continue;
                }
                // lewati header, lakukan sama seperti produk
                // dd($item);
                // Validasi dan konversi tanggal
                $tanggal = $this->validateAndConvertDate($item[12]); // Format tanggal pada kolom 12
                $penyedia = Penyedia::where('nama', $item[1])->first();
                if ($penyedia) {
                    $penyedia->update([
                        'status' => $item[2],
                        'alamat' => $item[3],
                        'tahun_berdiri' => $item[4],
                        'nohp' => $item[5],
                        'email' => $item[6],
                        'jenis_usaha' => $item[7],
                        'no_identitas' => $item[8],
                        'pengurus' => $item[9],
                        'jabatan' => $item[10],
                        'no_akta' => $item[11],
                        'tanggal' => $tanggal,
                        'notaris' => $item[13],
                        'no_tgl' => $item[14],
                        'masa_berlaku' => $item[15],
                        'instansi_pemberi' => $item[16],
                        'npwp' => $item[17],
                        'nama_narahubung' => $item[18],
                        'nohp_narahubung' => $item[19],
                        'jabatan_narahubung' => $item[20],
                    ]);
                } else {
                    $penyedia = new Penyedia();
                    $penyedia->nama = $item[1];
                    $penyedia->status = $item[2];
                    $penyedia->alamat = $item[3];
                    $penyedia->tahun_berdiri = $item[4];
                    $penyedia->nohp = $item[5];
                    $penyedia->email = $item[6];
                    $penyedia->jenis_usaha = $item[7];
                    $penyedia->no_identitas = $item[8];
                    $penyedia->pengurus = $item[9];
                    $penyedia->jabatan = $item[10];
                    $penyedia->no_akta = $item[11];
                    $penyedia->tanggal = $tanggal;
                    $penyedia->notaris = $item[13];
                    $penyedia->no_tgl = $item[14];
                    $penyedia->masa_berlaku = $item[15];
                    $penyedia->instansi_pemberi = $item[16];
                    $penyedia->npwp = $item[17];
                    $penyedia->nama_narahubung = $item[18];
                    $penyedia->nohp_narahubung = $item[19];
                    $penyedia->jabatan_narahubung = $item[20];
                    $penyedia->save();
                }
            }
            Alert::success('Berhasil', 'Berhasil Import Data');
            return redirect()->route('import-data');
        // } catch (\Throwable $th) {
        //     Alert::Error('Gagal', $th->getMessage());
        //     return redirect()->route('import-data');
        // }
    }

    private function validateAndConvertDate($date)
{
    try {
        // Jika nilai adalah angka serial Excel, ubah menjadi objek tanggal
        if (is_numeric($date)) {
            $date = Date::excelToDateTimeObject($date);
        }
        // Pastikan bahwa $date sudah menjadi objek DateTime sebelum diteruskan ke Carbon
        if ($date instanceof \DateTimeInterface) {
            // Mengonversi tanggal ke format MySQL yang diterima (YYYY-MM-DD)
            return Carbon::instance($date)->format('Y-m-d');
        } else {
            // Jika $date bukan objek DateTimeInterface, kembalikan null atau string kosong
            return null;
    }
    } catch (\Exception $e) {
        // Jika gagal, kembalikan null atau string kosong jika format tidak valid
        return null;
    }
}

    public function render()
    {

        return view('livewire.import-data')->layout('layouts.app');
    }
}
