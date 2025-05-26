<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Jadwal;
use App\Models\Pengikut; // Import model Pengikut
use Filament\Forms\Get;

class PengikutJadwalOverlap implements ValidationRule
{
    protected ?int $currentPengikutId = null; // Untuk mengabaikan ID pengikut saat update PengikutRelationManager
    protected int $targetJadwalId; // ID jadwal yang sedang diinput pengikutnya
    protected string $tanggalMulaiTargetJadwal;
    protected string $tanggalSelesaiTargetJadwal;


    /**
     * Set the dates of the target jadwal that this pengikut is being added to.
     *
     * @param string $tanggalMulai
     * @param string $tanggalSelesai
     * @return $this
     */
    public function forJadwalDates(string $tanggalMulai, string $tanggalSelesai): self
    {
        $this->tanggalMulaiTargetJadwal = $tanggalMulai;
        $this->tanggalSelesaiTargetJadwal = $tanggalSelesai;
        return $this;
    }

    /**
     * Set the Pengikut ID to ignore (for update operations on PengikutRelationManager).
     *
     * @param int|null $id
     * @return $this
     */
    public function ignorePengikut(?int $id): self
    {
        $this->currentPengikutId = $id;
        return $this;
    }

    /**
     * Set the target Jadwal ID when validating for Pengikut.
     *
     * @param int $jadwalId
     * @return $this
     */
    public function inJadwal(int $jadwalId): self
    {
        $this->targetJadwalId = $jadwalId;
        return $this;
    }

    /**
     * Run the validation rule.
     *
     * @param  string $attribute
     * @param  mixed $value The pegawai_id being validated
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $pegawaiId = $value;

        if (!isset($this->tanggalMulaiTargetJadwal) || !isset($this->tanggalSelesaiTargetJadwal)) {
            $fail('Validasi tanggal tumpang tindih pengikut tidak lengkap. Tanggal jadwal tidak tersedia.');
            return;
        }

        // --- Cek tumpang tindih sebagai Penanggung Jawab (di tabel jadwals) ---
        $jadwalAsPjOverlapQuery = Jadwal::where('pegawai_id', $pegawaiId)
            ->where(function ($q) {
                $q->where(function ($subQ) {
                    $subQ->where('tanggal_mulai', '<=', $this->tanggalSelesaiTargetJadwal)
                         ->where('tanggal_selesai', '>=', $this->tanggalMulaiTargetJadwal);
                });
            });

        if ($jadwalAsPjOverlapQuery->exists()) {
            $fail('Pegawai ini sudah memiliki jadwal lain pada tanggal yang sama, ganti dengan pegawai lain.');
            return;
        }

        // --- Cek tumpang tindih sebagai Pengikut (di tabel pengikuts) ---
        // Cari pengikut lain untuk pegawai yang sama, yang jadwalnya tumpang tindih
        $pengikutOverlapQuery = Pengikut::where('pegawai_id', $pegawaiId)
            ->whereHas('jadwal', function ($query) {
                // Abaikan jadwal yang sedang diinput pengikutnya, karena itu adalah target kita
                $query->where('jadwals.id', '!=', $this->targetJadwalId)
                      // Pastikan tanggal jadwal pengikut lain tumpang tindih
                      ->where('tanggal_mulai', '<=', $this->tanggalSelesaiTargetJadwal)
                      ->where('tanggal_selesai', '>=', $this->tanggalMulaiTargetJadwal);
            });

        // Saat update pengikut, kita harus mengabaikan entri pengikut itu sendiri
        if ($this->currentPengikutId) {
            $pengikutOverlapQuery->where('id', '!=', $this->currentPengikutId);
        }

        if ($pengikutOverlapQuery->exists()) {
            $fail('Pegawai ini sudah menjadi pengikut di jadwal lain yang tumpang tindih pada tanggal yang sama.');
        }
    }
}
