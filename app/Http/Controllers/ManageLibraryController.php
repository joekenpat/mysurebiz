<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Library;
use Illuminate\Support\Facades\Storage;

class ManageLibraryController extends Controller
{
    public function Delete(Request $request)
    {
        $material = Library::where('id', $request->id)->first();
        Storage::disk('local')->delete($material->file);
        $material->delete();
    }
}
