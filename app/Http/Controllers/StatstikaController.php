<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use App\Models\ModulMazmuni;
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
        
        // Bo'limlari countlari
        $modul_mavzular = ModulMazmuni::where("category", 'mavular')->count();  
        $modul_tagdimotlar = ModulMazmuni::where("category", 'tagdimotlar')->count();  
        $modul_video_darslar = ModulMazmuni::where("category", 'video_darslar')->count();  
        $modul_oqish_uchun_tafsiya = ModulMazmuni::where("category", 'oqish_uchun_tafsiya')->count();  
        $modul_maqola_va_tezislar = ModulMazmuni::where("category", 'maqola_va_tezislar')->count(); 
        $modul_ilmiy_ishlar = ModulMazmuni::where("category", 'ilmiy_ishlar')->count();  
        $modul_meyoriy_hujjatlar = ModulMazmuni::where("category", 'meyoriy_hujjatlar')->count();  
        $modul_shaxsiy_hujjatlar = ModulMazmuni::where("category", 'shaxsiy_hujjatlar')->count(); 

        // Foydalanuvchilar statistikasi countlari
        $users = User::get()->count();
        $users_teachers = User::where("ticher_or_student", 'ticher')->count(); 
        $users_students = User::where("ticher_or_student", 'student')->count(); 




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
            'modul_is_moderate_false',
            'modul_mavzular',
            'modul_tagdimotlar',
            'modul_video_darslar',
            'modul_oqish_uchun_tafsiya',
            'modul_maqola_va_tezislar',
            'modul_ilmiy_ishlar',
            'modul_meyoriy_hujjatlar',
            'modul_shaxsiy_hujjatlar',
            'users',
            'users_teachers',
            'users_students'
         

        ));
    }
}
