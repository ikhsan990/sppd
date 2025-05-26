<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Jadwal; // Import model Jadwal
use App\Models\Pengikut;
use Filament\Forms\Get; // Penting: Untuk mendapatkan nilai field lain dari form

class PegawaiJadwalOverlap implements ValidationRule
{
    protected ?int $ignoreJadwalId = null; // Untuk mengabaikan ID jadwal saat update
    protected string $tanggalMulai;
    protected string $tanggalSelesai;

    /**
     * Set the start and end dates to validate against.
     *
     * @param string $tanggalMulai
     * @param string $tanggalSelesai
     * @return $this
     */
    public function forDates(string $tanggalMulai, string $tanggalSelesai): self
    {
        $this->tanggalMulai = $tanggalMulai;
        $this->tanggalSelesai = $tanggalSelesai;
        return $this;
    }

    /**
     * Set the Jadwal ID to ignore (for update operations).
     *
     * @param int|null $id
     * @return $this
     */
    public function ignore(?int $id): self
    {
        $this->ignoreJadwalId = $id;
        return $this;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // $value adalah nilai 'pegawai_id' yang sedang divalidasi
        $pegawaiId = $value;

        // Pastikan tanggal_mulai dan tanggal_selesai sudah diset
        if (!isset($this->tanggalMulai) || !isset($this->tanggalSelesai)) {
            $fail('Validasi tanggal tumpang tindih tidak lengkap. Tanggal mulai atau selesai tidak tersedia.');
            return;
        }

        // Logika untuk mendeteksi tumpang tindih jadwal:
        // Cek apakah ada jadwal lain untuk pegawai_id yang sama
        // di mana rentang tanggalnya tumpang tindih dengan rentang tanggal yang sedang divalidasi.
        $query = Jadwal::where('pegawai_id', $pegawaiId)
            ->where(function ($q) {
                $q->where(function ($subQ) {
                    // Existing jadwal starts within new jadwal's range
                    $subQ->where('tanggal_mulai', '<=', $this->tanggalSelesai)
                         ->where('tanggal_selesai', '>=', $this->tanggalMulai);
                });
            });

        // Jika ini adalah operasi update, abaikan record jadwal yang sedang diedit
        if ($this->ignoreJadwalId) {
            $query->where('id', '!=', $this->ignoreJadwalId);
        }

        if ($query->exists()) {
            $fail('Pegawai ini sudah memiliki jadwal lain yang tumpang tindih pada tanggal yang sama.');
        }
    }
}
