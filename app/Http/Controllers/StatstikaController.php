<?php

namespace App\Http\Controllers;

use App\Models\ModulMazmuni;
use App\Models\News;
use Illuminate\Http\Request;

class StatstikaController extends Controller
{
    public function index(){
        // Yangiliklar statistikasi uchun countlar
        $yangiliklar = News::get()->count();
        $yangiliklar_is_active_true = News::where("is_active", 1)->count();
        $yangiliklar_is_active_false = News::where("is_active", 0)->count();
        $yangiliklar_is_moderate_true = News::where("is_ready", 1)->count();
        $yangiliklar_is_moderate_false = News::where("is_ready", 0)->count();

        // Modul mazmuni uchun countlar
        $modul = ModulMazmuni::get()->count();
        $modul_is_active_true = ModulMazmuni::where("is_active", 1)->count();
        $modul_is_active_false = ModulMazmuni::where("is_active", 0)->count();
        $modul_is_moderate_true = ModulMazmuni::where("is_moderate", 1)->count();
        $modul_is_moderate_false = ModulMazmuni::where("is_moderate", 0)->count();    

        return view('statistikalar', compact(
            'yangiliklar',
            'yangiliklar_is_active_true',
            'yangiliklar_is_active_false',
            'yangiliklar_is_moderate_true',
            'yangiliklar_is_moderate_false',
            'modul',
            'modul_is_active_true',
            'modul_is_active_false',
            'modul_is_moderate_true',
            'modul_is_moderate_false'
        ));
    }
}
