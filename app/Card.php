<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model {

	protected $table= 'cards';
    protected $fillable = ['name','list_id','description', 'priority'];


    public function xlist()
    {
    	return $this->belongsTo(Lists::class, 'lists_id');
    }

}
