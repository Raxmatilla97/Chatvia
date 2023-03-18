<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ModulMazmuniRepository;
use App\Http\Requests\CreateModulMazmuniRequest;
use App\Http\Requests\UpdateModulMazmuniRequest;
use App\Models\ModulMazmuni;

class ModulMazmuniController extends AppBaseController
{
    /** @var  ModulMazmuniRepository */
    private $modulMazmuniRepository;

    public function __construct(ModulMazmuniRepository $modulMazmuniRepo)
    {
        $this->modulMazmuniRepository = $modulMazmuniRepo;
    }

    /**
     * Display a listing of the ModulMazmuni.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $modulMazmunis = $this->modulMazmuniRepository->paginate(15);

        return view('modul_mazmunis.index')
            ->with('modulMazmunis', $modulMazmunis);
    }

    /**
     * Men yaratgan resurslar sahifasi uchun
     *
     */

    public function menYaratgan()
    {
        $modulMazmunis =  ModulMazmuni::orderBy('created_at', 'DESC')->where('user_id', '=', Auth::user()->id)->paginate(15);

        return view('modul_mazmunis.men_yaratgan')
            ->with('modulMazmunis', $modulMazmunis);
    }

    
    /**
     * Qidirish funksiyasi
     *
     */
    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
    
        // Search in the title and body columns from the posts table
        $modulMazmunis = ModulMazmuni::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('content', 'LIKE', "%{$search}%")
            ->paginate(15);
    
        // Return the search view with the resluts compacted
        return view('modul_mazmunis.search', compact('modulMazmunis'));
    }


  
    /**
     * Moderatsiya uchun
     *
     */

     public function moderatsiya(){
        $modulMazmunis = ModulMazmuni::orderBy('created_at', 'DESC')->where('is_moderate', '=', '0')->paginate(15);
        
        return view('modul_mazmunis.moderatsiya')
            ->with('modulMazmunis', $modulMazmunis);
    }

    

    public function category($categories = null)
    {

       
        $cats = explode('/', $categories);       
        $cat_slug = implode('/', $cats);     
        $mavzular = array_pop($cats);


       
        $modulMazmunis = ModulMazmuni::where('category', '=', $mavzular)->paginate(15);

        return view('modul_mazmunis.index')
            ->with('modulMazmunis', $modulMazmunis);
    }

    /**
     * Show the form for creating a new ModulMazmuni.
     *
     * @return Response
     */
    public function create()
    {
        return view('modul_mazmunis.create');
    }

    /**
     * Store a newly created ModulMazmuni in storage.
     *
     * @param CreateModulMazmuniRequest $request
     *
     * @return Response
     */
    public function store(CreateModulMazmuniRequest $request)
    {
        $request['slug'] = date('His').'-'.Str::slug($request->title);
        if ($request['is_moderate'] == null ) {
            $request['is_moderate'] = '0';
        }
        $request['user_id'] = Auth::user()->id;
        if ($request['category'] == 'shaxsiy_hujjatlar') {
            $is_public = 1;
        } else {
            $is_public = 0;
        }

        $request['is_private'] = $is_public;
        $input = request()->except(['_token']);
        $input = request()->except(['_method']);
        $input = $request->all();
        
        if ($image = $request->file('img')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['img'] = "$profileImage";
        }

        if ($file = $request->file('file')) {
            $destinationPath = 'files/';
            $profileFile = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $profileFile);
            $input['file'] = "$profileFile";
        }
    
    
        ModulMazmuni::create($input);

        Flash::success("Informatsiya saqlandi!");

        return redirect(route('modulMazmunis.index'));
    }

    /**
     * Display the specified ModulMazmuni.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $modulMazmuni = $this->modulMazmuniRepository->find($id);

    //    preg_match(
    //         '/[\\?\\&]v=([^\\?\\&]+)/',
    //         $modulMazmuni['url_content'],
    //         $matches
    //     );

    //     $modulMazmuni['url_content'] = $matches['1'];
     
        if (empty($modulMazmuni)) {
            Flash::error("Modul mazmuni topilmadi!");

            return redirect(route('modulMazmunis.index'));
        }

        return view('modul_mazmunis.show')->with('modulMazmuni', $modulMazmuni);
    }

    /**
     * Show the form for editing the specified ModulMazmuni.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $modulMazmuni = $this->modulMazmuniRepository->find($id);

        if (empty($modulMazmuni)) {
            Flash::error("Modul mazmuni topilmadi!");

            return redirect(route('modulMazmunis.index'));
        }

        return view('modul_mazmunis.edit')->with('modulMazmuni', $modulMazmuni);
    }

    /**
     * Update the specified ModulMazmuni in storage.
     *
     * @param int $id
     * @param UpdateModulMazmuniRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateModulMazmuniRequest $request)
    {
           
        $request['slug'] = date('His').'-'.Str::slug($request->title);
        if ($request['is_moderate'] == null ) {
            $request['is_moderate'] = '0';
        }
        $request['user_id'] = Auth::user()->id;
        if ($request['category'] == 'shaxsiy_hujjatlar') {
            $is_public = 1;
        } else {
            $is_public = 0;
        }
        $input = request()->except(['_token']);
        $input = request()->except(['_method']); 
        $request['is_private'] = $is_public;   
        $input = $request->all();
        
        if ($image = $request->file('img')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['img'] = "$profileImage";
        }

        if ($file = $request->file('file')) {
            $destinationPath = 'files/';
            $profileFile = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $profileFile);
            $input['file'] = "$profileFile";
        }
        
        if (empty($input)) {
            Flash::error("Modul mazmuni topilmadi!");

            return redirect(route('modulMazmunis.index'));
        }
        ModulMazmuni::where('id',$id)->update($input);
        // $modulMazmuni = $this->modulMazmuniRepository->update($request->all(), $id);

        Flash::success("Informatsiya yangilandi!");

        return redirect(route('modulMazmunis.index'));
    }

    /**
     * Remove the specified ModulMazmuni from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $modulMazmuni = $this->modulMazmuniRepository->find($id);

        if (empty($modulMazmuni)) {
            Flash::error("Modul mazmuni topilmadi!");

            return redirect(route('modulMazmunis.index'));
        }

        $this->modulMazmuniRepository->delete($id);

        Flash::success("Informatsiya bazadan o'chirildi!");

        return redirect(route('modulMazmunis.index'));
    }
}
