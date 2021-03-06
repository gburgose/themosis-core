<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $publish = "publish";
    protected $primaryKey = 'ID';
    protected $table = 'posts';
    protected $postType = "services";

    public function newQuery()
    {
        $query = (parent::newQuery())->where('post_type', $this->postType);
        return $query->where('post_status', $this->publish);
    }
}
