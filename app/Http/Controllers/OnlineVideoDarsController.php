<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\OnlineVideolar;
use Illuminate\Support\Carbon;
use App\Models\OnlineVideoDars;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\AppBaseController;
use App\Repositories\OnlineVideoDarsRepository;
use App\Http\Requests\CreateOnlineVideoDarsRequest;
use App\Http\Requests\UpdateOnlineVideoDarsRequest;
use PhpParser\Node\Stmt\If_;

class OnlineVideoDarsController extends AppBaseController
{
    /** @var  OnlineVideoDarsRepository */
    private $onlineVideoDarsRepository;

    public function __construct(OnlineVideoDarsRepository $onlineVideoDarsRepo)
    {
        $this->onlineVideoDarsRepository = $onlineVideoDarsRepo;
    }

    /**
     * Display a listing of the OnlineVideoDars.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $onlineVideoDars = $this->onlineVideoDarsRepository->paginate(15);
        
        return view('online_video_dars.index')
            ->with('onlineVideoDars', $onlineVideoDars);
           
    }

    
    /**
     * Moderatsiya uchun
     *
     */

     public function moderatsiya(){
        $videoKurs = OnlineVideoDars::orderBy('created_at', 'DESC')->where('moderatsiya', '=', '0')->paginate(15);
    
        return view('online_video_dars.moderatsiya')
            ->with('videoKurs', $videoKurs);
         
    }

    /**
     * Men yaratgan yangiliklarni jadvalini ko'rish
     *
     */

     public function menYaratgan(){
        $videoKurs = OnlineVideoDars::orderBy('created_at', 'DESC')->where('user_id', '=', Auth::user()->id)->paginate(15);
      
        return view('online_video_dars.men_yaratgan')
            ->with('videoKurs', $videoKurs);
         
    }

    // Kurslarga a'zo bo'lish uchun

    public function azoBolish(Request $request){
        // dd($request);
        DB::table('online_kurs_user')->insert([
            'user_id' => $request->user_id,
            'kurs_id' => $request->kurs_id
        ]);
        Flash::success("Video kursga a'zo bo'ldingiz!");

        return Redirect::back();
    }

    // Kurslarga a'zolikni olib tashlash uchun

    public function azoOlibtashlash(Request $request){
        // dd($request);
        DB::table('online_kurs_user')
        ->where('user_id', $request['user_id'])
        ->where('kurs_id', $request['kurs_id'])
        ->delete();

        Flash::success("Video kursdan a'zoligizni olib tashladingiz!");
        
        return Redirect::back();
    }

    // Men a'zo bo'lgan kurslar

    public function menAzoBolgan(Request $request){
        $user_id = Auth::user()->id;

        // Foydalanuvchi tomonidan olingan barcha kurslar
        $kurslar = DB::table('online_kurs_user')
                    ->where('user_id', $user_id)
                    ->pluck('kurs_id');
        
        // Foydalanuvchining kurslari bo'yicha video darslari
        $videoKurs = OnlineVideoDars::whereIn('id', $kurslar)
                ->orderBy('created_at', 'DESC')
                ->paginate(15);

        // dd($videoKurs);
     
        return view('online_video_dars.men_azo_bolgan')->with('videoKurs', $videoKurs);
    }

     /**
     * Qidirish funksiyasi
     *
     */
    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
      
        // Search in the title and body columns from the posts table
        $onlineVideoDars = OnlineVideoDars::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('content', 'LIKE', "%{$search}%")
            ->paginate(15);
    
        // Return the search view with the resluts compacted
        return view('online_video_dars.search', compact('onlineVideoDars'));
    }


    
    
    /**
     * Show the form for creating a new OnlineVideoDars.
     *
     * @return Response
     */
    public function create()
    {
        return view('online_video_dars.create');
    }

    /**
     * Store a newly created OnlineVideoDars in storage.
     *
     * @param CreateOnlineVideoDarsRequest $request
     *
     * @return Response
     */
    public function store(CreateOnlineVideoDarsRequest $request)
    {
        $test = $request['qachon_boladi'];
        $time = Carbon::parse($test)->format('d-m-y');
        $request['qachon_boladi'] = $time;
        $request['slug'] = date('His').'-'.Str::slug($request->title);       
        $request['user_id'] = Auth::user()->id;
        $jit = "https://meet.jit.si/". $request['slug'];
        $request['jit_meet_url'] = $jit;  
        
        $input = $request->all();
        
        if ($image = $request->file('img')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['img'] = "$profileImage";
        }  

       
        
        OnlineVideoDars::create($input);


        Flash::success('Online video darslar saytga joylandi!');

        return redirect(route('onlineVideoDars.index'));
    }

    /**
     * Display the specified OnlineVideoDars.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user_id = Auth::user()->id;
        $qatnashgan = DB::table('online_kurs_user')
                  ->where('user_id', $user_id)
                  ->where('kurs_id', $id)
                  ->exists();

        if ($qatnashgan) {
            $qatnashgan = true;
        } else {
            $qatnashgan = false;
        }



       $videolar = OnlineVideolar::where('videokurs_id', '=', $id)->get();
      
        $onlineVideoDars = $this->onlineVideoDarsRepository->find($id);

        if (empty($onlineVideoDars)) {
            Flash::error('Online video darslar topilmadi');

            return redirect(route('onlineVideoDars.index'));
        }

        return view('online_video_dars.show')
        ->with('onlineVideoDars', $onlineVideoDars)
        ->with('qatnashgan', $qatnashgan)
        ->with('videolar', $videolar);


    }

    /**
     * Show the form for editing the specified OnlineVideoDars.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $onlineVideoDars = $this->onlineVideoDarsRepository->find($id);
        $id = $onlineVideoDars->id;
        
        $videolar = OnlineVideolar::where("videokurs_id", $id)->count();
        $edit = true;

      

        $onlineVideolars = OnlineVideolar::where("videokurs_id", $id)->get();


        if (empty($onlineVideoDars)) {
            Flash::error('Online video darslar topilmadi');

            return redirect(route('onlineVideoDars.index'));
        }

        return view('online_video_dars.edit')
        ->with('onlineVideoDars', $onlineVideoDars)
        ->with('edit', $edit)
        ->with('videolar', $videolar)
        ->with('onlineVideolars', $onlineVideolars);

    }

    /**
     * Update the specified OnlineVideoDars in storage.
     *
     * @param int $id
     * @param UpdateOnlineVideoDarsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOnlineVideoDarsRequest $request)
    {
        $test = $request['qachon_boladi'];
        $time = Carbon::parse($test)->format('d-m-y');
        $request['qachon_boladi'] = $time;
        $request['slug'] = date('His').'-'.Str::slug($request->title);       
        $request['user_id'] = Auth::user()->id;
        $jit = "https://meet.jit.si/". $request['slug'];
        $request['jit_meet_url'] = $jit;  
        $input = request()->except(['_token']);
        $input = request()->except(['_method']);
        $input = $request->all();
        
        if ($image = $request->file('img')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['img'] = "$profileImage";
        }  

        if (empty($input)) {
            Flash::error('Online video darslar topilmadi');

            return redirect(route('onlineVideoDars.index'));
        }

        OnlineVideoDars::where('id',$id)->update($input);

        Flash::success('Onlayn video darslar yangilandi!');

        return redirect(route('onlineVideoDars.index'));
    }

    /**
     * Remove the specified OnlineVideoDars from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $onlineVideoDars = $this->onlineVideoDarsRepository->find($id);

        if (empty($onlineVideoDars)) {
            Flash::error('Online video darslar topilmadi');

            return redirect(route('onlineVideoDars.index'));
        }

        $this->onlineVideoDarsRepository->delete($id);

        Flash::success("Video dars o'chiriladi");

        return redirect(route('onlineVideoDars.index'));
    }
}
