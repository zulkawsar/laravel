<?php

namespace App;

class Post extends Model
{
	public function Comments()
	{
		return $this->hasMany(PostComment::class);
	}
    
    public function addComment($comment)
    {
        // dd($Aasd);
        $user_id = auth()->user()->id;
    	$this->Comments()->create(compact('comment','user_id'));
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, $filters)
    {
        if( $month = $filters['month'])
        {
            $query->whereMonth('created_at', \Carbon\Carbon::parse($month)->month );
        }

        if( $year = $filters['year'])
        {
            $query->whereYear('created_at', $year);
        }
    }

    public static function archives()
    {
        return static:: selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }
}
