<?php
namespace App\Models;
use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'kegiatan';
    protected $allowedFields = ['u_code', 'judul', 'slug', 'lokasi', 'tanggal', 'deskripsi', 'foto'];
    protected $useTimestamps = true;

    public function getPost($segment = false) {
        if (! $segment)
            return $this->orderBy('created_at', 'desc')->findAll();

        // ex: $segment = nama-judul-dk8Hj2Q
        $slug = explode('-', $segment);
        // $slug = ['nama', 'judul', 'dk8Hj2Q']
        $code = array_pop($slug);
        // $code = dk8Hj2Q
        return $this->where(['u_code' => $code, 'slug' => implode('-', $slug)])->first();
    }
}