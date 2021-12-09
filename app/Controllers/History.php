<?php

namespace App\Controllers;
use App\Models\PostModel;
class History extends BaseController
{
    public function index()
    {
        $post = new PostModel();
        $data['posts'] = $post->findAll();
        return view('history',$data);
    }
}
