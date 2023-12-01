<?php
namespace App\Http\Controllers;

use App\Models\Eskul;
use Illuminate\Http\Request;
use App\Models\Jurusan;
use Session;
use App\Http\Requests\StoreJurusanRequest;
use App\Http\Requests\UpdateJurusanRequest;


class JurusanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $jurusan = Jurusan::where('nama_jurusan', 'like', '%' . $search . '%')->get();
        $eskul = Eskul::all();
        return view('admin/jurusan', compact('jurusan','eskul'));
    }

    public function create()
    {
        return view('admin/jurusan-add');
    }

    public function store(StoreJurusanRequest $request)
    {
    
        $jurusan = Jurusan::create($request->all());
        
        return redirect()->route('jurusan.index')
            ->with('success', 'Jurusan berhasil ditambahkan.');
    }
    public function delete($id)
    {
        $jurusan = Jurusan::find($id);
        $jurusan->delete();
        
        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil dihapus.');
    }
    public function edit($id)
{
    $jurusan = Jurusan::find($id);

    return view('admin/jurusan-edit', compact('jurusan'));
}
public function update(UpdateJurusanRequest $request, $id)
{
    $jurusan = Jurusan::find($id);
    $jurusan->update($request->all());

    return redirect()->route('jurusan.index')->with('successedit', 'Jurusan berhasil edit.');
}

}
?>
