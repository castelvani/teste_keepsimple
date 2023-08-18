<?php

namespace App\Http\Controllers;

use App\Http\Services\FindCepsAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class RetrieveCeps extends Controller
{
    public function find(Request $request)
    {
        $cep = $request->cep;

        $cep = explode(';', $cep);

        $cepsInfo = FindCepsAPI::findCEPs($cep);
        // dd($cepsInfo);
        return view('welcome', ['cepsInfo' => $cepsInfo]);
    }

    public function exportCsv(Request $request)
    {
        $ceps = json_decode($request->cepsInfo);

        $ceps = array_map(function ($item) {
            return (array) $item;
        }, $ceps);

        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=ceps.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $output = fopen("php://output", "w");

        fputcsv($output, array_keys($ceps[0]));

        foreach ($ceps as $row) {
            fputcsv($output, $row);
        }

        fclose($output);

        return Response::make("", 200, $headers);
    }
}
