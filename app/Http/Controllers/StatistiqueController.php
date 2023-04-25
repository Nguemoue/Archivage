<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\SousTypeDocument;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Faker\Factory;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;

class StatistiqueController extends Controller
{
	public function index()
	{
		return $this->filter();
	}

	public function filter()
	{
		$sousTypes = SousTypeDocument::all();
		return view("statistique.filter", [
			'sousTypes' => $sousTypes
		]);
	}

	public function home(Request $request)
	{
		$request->validate([
			'champ' => 'required',
			'sousType' => 'required',
			'periode' => 'required',
			'type' => 'required'
		]);
		$operateur = $request->input("type") == "int" ? 'sum' : 'count';
		$periode = $request->input("periode");
		$gp = $this->getGp($periode);
		$champ = $request->input("champ");
		#je selectionne en function de
		$data = Document::query()->selectRaw("$gp(created_at) as date")
			->addSelect("data->{$champ} as field")
			->groupByRaw("$gp(created_at),data")
			->get();

		$data = $data->groupBy('date');
		$data = $data->map(function ($elt) use ($operateur) {
			$sum = 0;

			foreach ($elt as $e) {
				if ($operateur == 'sum') {
					$sum += (int)$e->field;
				} else {
					$sum += 1;
				}
			}
			return $sum;
		});
		$faker = Factory::create('fr');
		$lineChart = (new ColumnChartModel())
			->setTitle('Statistique de << ' . $champ . " >> Par " . $periode);
		$pieChart = (new PieChartModel())
			->setTitle('Statistique de << ' . $champ . " >> Par " . $periode);
		$histogrameChart = (new LineChartModel())
			->setTitle('Statistique de << ' . $champ . " >> Par " . $periode);

		foreach ($data as $k => $v) {
			$color = $faker->unique()->hexColor();
			$lineChart->addColumn($periode . ' ' . $k, $v, $color);
			$pieChart->addSlice($periode . ' ' . $k, $v, $color);
			$histogrameChart->addPoint($periode . ' ' . $k, $v, $color);
		}
		$sousType = (int) $request->input("sousType");
		$documents = Document::query()
						->where("sous_type_document_id","=",$sousType)
						->get();
		$champTab = $request->input("champTab");

		return view("statistique.home",
			compact("lineChart", "histogrameChart", "pieChart","documents","champTab"
			,"champ","operateur")
		);
	}

	private function getGp($gp)
	{
		if ($gp == "jour") {
			return "day";
		} else if ($gp == "annee") {
			return "year";
		} else {
			return 'month';
		}
	}
}
