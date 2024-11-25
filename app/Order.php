<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
	
	 protected $fillable = ['cust_id', 'address','city','state','zip','phn_no','items'];
}
