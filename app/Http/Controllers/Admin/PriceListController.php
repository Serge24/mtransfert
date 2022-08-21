<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\ChangeRate;
use Illuminate\Http\Request;

class PriceListController extends Controller
{
    public function index(Request $request)
    {
        $pricelistTogo = ChangeRate::whereForTogo(1)->get();
        $pricelistIntl = ChangeRate::whereForTogo(0)->get();

        return view('backend/pages/pricelist/index', compact("pricelistIntl", "pricelistTogo"));
    }

    public function create(Request $request)
    {
        return view('backend/pages/pricelist/create');
    }

    public function store(Request $request)
    {

        $start = $request->input('start', 0);
        $end = $request->input('end', 0);
        $change = $request->input('change', 0);
        $for_togo = $request->input("for_togo", 0);

        if ($start >= $end) {
            session()->flash('error', "Veuillez vérifier les bornes maximale et minimale de la grille. L'intervale n'est pas valide [$start, $end]");
            return back();
        }

        $change1 =  ChangeRate::whereForTogo($for_togo)->where('start', '=', $start)->orWhere('end', '=', $start)->first();

        $change2 =  ChangeRate::whereForTogo($for_togo)->where('start', '<', $start)->where('end', '>=', $start)->first();

        $changes = collect()->concat([$change1, $change2])->filter();


        if ($changes && count($changes) > 0) {
            session()->flash('error', "Intervalle en collision avec l'intervale [" . $changes[0]->start . "," . $changes[0]->end . "] qui vaut " . $changes[0]->change);
            return back();
        }

        ChangeRate::create([
            "start" => $start,
            "end" => $end,
            "change" => $change,
            "for_togo" => $for_togo,
        ]);
        session()->flash('message', 'Grille modifiée avec succès');
        return redirect()->route('admin_pricelist.index');
    }

    public function show(Request $request, $pricelist_item_id)
    {
    }

    public function edit(Request $request, $pricelist_item_id)
    {
        $pricelistItem =  ChangeRate::find($pricelist_item_id);

        if (!$pricelistItem) {
            session()->flash('error', 'Référence de la ligne non trouvée');
            return  redirect()->route('admin_pricelist.index');
        }

        return view('backend/pages/pricelist/edit', compact("pricelistItem"));
    }

    public function update(Request $request, $pricelist_item_id)
    {
        $pricelistItem =  ChangeRate::find($pricelist_item_id);

        $start = $request->input('start', 0);
        $end = $request->input('end', 0);
        $change = $request->input('change', 0);
        $for_togo = $request->input("for_togo", 0);

        if ($start >= $end) {
            session()->flash('error', "Veuillez vérifier les bornes maximale et minimale de la grille. L'intervale n'est pas valide [$start, $end]");
            return back();
        }


        if (!$pricelistItem) {
            session()->flash('error', 'Référence de la ligne non trouvée');
            return redirect()->route('admin_pricelist.index');
        }

        $change1 = ChangeRate::whereForTogo($for_togo)->where('start', '=', $start)->orWhere('end', '=', $start)->first();

        $change2 = ChangeRate::whereForTogo($for_togo)->where('start', '<', $start)->where('end', '>=', $start)->first();

        $changes = collect([$change1, $change2])->filter(function ($change) use ($pricelistItem) {
            return ($change !== null && $pricelistItem->id !== $change->id);
        });


        if ($changes && count($changes) > 0) {
            session()->flash('error', "Intervalle en collision avec l'intervale [" . $changes[0]->start . "," . $changes[0]->end . "] qui vaut " . $changes[0]->change);
            return back();
        }

        $pricelistItem->update([
            "start" => $start,
            "end" => $end,
            "change" => $change,
            "for_togo" => $for_togo,
        ]);
        session()->flash('message', 'Grille modifiée avec succès');
        return redirect()->route('admin_pricelist.index');
    }

    public function destroy(Request $request, $pricelist_item_id)
    {
        $changeRate = ChangeRate::find($pricelist_item_id);

        if (!$changeRate) {
            session()->flash('error', 'Référence de la ligne non trouvée');
            return redirect()->route('admin_pricelist.index');
        }

        $changeRate->delete();
        session()->flash('message', 'Ligne de la grille supprimée avec succès');
        return redirect()->route('admin_pricelist.index');
    }
}
