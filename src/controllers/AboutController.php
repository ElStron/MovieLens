<?php
namespace App\Controllers;

use App\Core\Controller;

class AboutController extends Controller
{
    public function index(): void
    {
        $this->view('about', ['title' => 'Acerca de']);
    }
}
