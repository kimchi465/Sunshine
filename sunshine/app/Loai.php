<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loai extends Model
{
    const CREATED_AT    ='l_taoMoi'; //created_at
    const UPDATED_AT    ='l_capNhat'; //updated_at
    protected $table    = 'cusc_loai';
    protected $fillable = ['l_ten', 'l_taoMoi', 'l_capNhat', 'l_trangThai'];
    protected $guarded  = ['l_ma'];

    protected $primaryKey   = 'l_ma';

    protected $dates    = ['l_taoMoi', 'l_capNhat']; //Carbon
    protected $dateFormat   = 'Y-m-d H:i:s';
}
