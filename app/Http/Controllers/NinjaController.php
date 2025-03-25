<?php

namespace App\Http\Controllers;

use App\Models\Ninja;
use App\Util\NinjaStats;
use App\Validators\NinjaValidator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NinjaController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Ninjas';

        return view('ninja.index')->with('viewData', $viewData);

    }

    public function list(): View
    {
        $viewData = [];
        $viewData['title'] = 'Lista de Ninjas';
        $viewData['ninjas'] = Ninja::all();

        return view('ninja.list')->with('viewData', $viewData);
    }

    public function create(): View
    {

        $viewData = []; // to be sent to the view
        $viewData['title'] = 'Crear Ninjas';

        return view('ninja.create')->with('viewData', $viewData);

    }

    public function save(Request $request): RedirectResponse
    {

        $request->validate(NinjaValidator::$rules);
        Ninja::create($request->only(['nombre', 'aldea', 'chakra']));

        return redirect()->route('ninja.index')->with('Ninja Registrado!');
    }

    public function stats(): View
    {
        $stats = NinjaStats::getStats();

        return view('ninja.stats', ['stats' => $stats['stats'], 'totalChakra' => $stats['totalChakra']]);
    }
}
