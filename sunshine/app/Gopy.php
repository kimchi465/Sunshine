<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gopy extends Model
{
    public    $timestamps   = false;
    protected $table        = 'cusc_gopy';
    protected $fillable     = ['gy_thoiGian', 'gy_noiDung', 'km_ma', 'sp_ma', 'kh_trangThai'];
    protected $guarded      = ['gy_ma'];
    protected $primaryKey   = 'gy_ma';
    protected $dates        = ['gy_thoiGian'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
