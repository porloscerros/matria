<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Media;
use App\Models\Post;
use App\Models\User;
use Illuminate\View\View;

class ShowDashboard extends Controller
{
    /**
     * Show the application admin dashboard.
     */
    public function __invoke(): View
    {
        return view('admin.dashboard.index', [
            'media' => Media::lastWeek()->get(),
            'posts' => Post::lastWeek()->get(),
            'users' => User::lastWeek()->get(),
            'contacts' => Contact::lastWeek()->get(),
        ]);
    }
}
