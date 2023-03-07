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
        $modulMazmunis = $this->modulMazmuniRepository->all();

        return view('modul_mazmunis.index')
            ->with('modulMazmunis', $modulMazmunis);
    }

    public function category($categories = null)
    {

       
        $cats = explode('/', $categories);       
        $cat_slug = implode('/', $cats);     
        $mavzular = array_pop($cats);


       
        $modulMazmunis = ModulMazmuni::where('category', '=', $mavzular)->get();

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
        $request['user_id'] = Auth::user()->id;
        if ($request['category'] == 'shaxsiy_hujjatlar') {
            $is_public = 1;
        } else {
            $is_public = 0;
        }

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
        $modulMazmuni = $this->modulMazmuniRepository->find($id);
        if ($request['category'] == 'shaxsiy_hujjatlar') {
            $is_public = 1;
        } else {
            $is_public = 0;
        }

        $request['is_private'] = $is_public;

        if (empty($modulMazmuni)) {
            Flash::error("Modul mazmuni topilmadi!");

            return redirect(route('modulMazmunis.index'));
        }

        $modulMazmuni = $this->modulMazmuniRepository->update($request->all(), $id);

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
