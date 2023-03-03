<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Repositories\SpikerlarRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateSpikerlarRequest;
use App\Http\Requests\UpdateSpikerlarRequest;
use App\Models\Spikerlar;

class SpikerlarController extends AppBaseController
{
    /** @var  SpikerlarRepository */
    private $spikerlarRepository;

    public function __construct(SpikerlarRepository $spikerlarRepo)
    {
        $this->spikerlarRepository = $spikerlarRepo;
    }

    /**
     * Display a listing of the Spikerlar.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $spikerlars = $this->spikerlarRepository->all();

        return view('spikerlars.index')
            ->with('spikerlars', $spikerlars);
    }

    /**
     * Show the form for creating a new Spikerlar.
     *
     * @return Response
     */
    public function create()
    {
        return view('spikerlars.create');
    }

    /**
     * Store a newly created Spikerlar in storage.
     *
     * @param CreateSpikerlarRequest $request
     *
     * @return Response
     */
    public function store(CreateSpikerlarRequest $request)
    {
      
        $input = $request->all();

        if ($image = $request->file('img')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['img'] = "$profileImage";
        }
             
        Spikerlar::create($input);

        Flash::success('Spiker saqlandi!');

        return redirect(route('spikerlars.index'));
    }

    /**
     * Display the specified Spikerlar.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $spikerlar = $this->spikerlarRepository->find($id);

        if (empty($spikerlar)) {
            Flash::error("Spiker haqida ma'lumotlar topilmadi!");

            return redirect(route('spikerlars.index'));
        }

        return view('spikerlars.show')->with('spikerlar', $spikerlar);
    }

    /**
     * Show the form for editing the specified Spikerlar.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $spikerlar = $this->spikerlarRepository->find($id);

        if (empty($spikerlar)) {
            Flash::error("Spiker haqida ma'lumotlar topilmadi!");

            return redirect(route('spikerlars.index'));
        }

        return view('spikerlars.edit')->with('spikerlar', $spikerlar);
    }

    /**
     * Update the specified Spikerlar in storage.
     *
     * @param int $id
     * @param UpdateSpikerlarRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSpikerlarRequest $request)
    {

        // $news = $this->newsRepository->find($id);
        $data = $request->all();
        
        $data = request()->except(['_token']);
        $data = request()->except(['_method']);
        if ($image = $request->file('img')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $img = "$profileImage";
            $data['img'] = $img;
        }
       
        if (empty($data)) {
            Flash::error('Spiker topilmadi!');

            return redirect(route('spikerlars.index'));
        }
      
        Spikerlar::where('id',$id)->update($data);

        Flash::success("Spiker ma'lumotlari yangilandi!");

        return redirect(route('spikerlars.index'));
    }

    /**
     * Remove the specified Spikerlar from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $spikerlar = $this->spikerlarRepository->find($id);

        if (empty($spikerlar)) {
            Flash::error("Spiker haqida ma'lumotlar topilmadi!");

            return redirect(route('spikerlars.index'));
        }

        $this->spikerlarRepository->delete($id);

        Flash::success("Spiker ma'lumotlari o'chirib yuborildi!");

        return redirect(route('spikerlars.index'));
    }
}
