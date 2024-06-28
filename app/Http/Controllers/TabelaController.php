<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Str;

class TabelaController extends Controller
{
    public function tabela_brasileiro()
    {
        $rows = $this->getTabelaBrasileirao();
        return view('welcome', compact('rows'));
    }

    public function selecionarTime(Request $request)
    {
        $teamIndex = $request->input('team');
        $teamName = $request->input('teamName');
        return response()->json(['message' => 'Time selecionado com sucesso!', 'team' => $teamIndex, 'teamName' => $teamName]);
    }

    public function showTeam($teamName)
    {
        $teamName = str_replace('_', ' ', $teamName);
        $rows = $this->getTabelaBrasileirao();
        return view('welcome', compact('rows', 'teamName'));
    }

    public function corrigirPalavra($palavra)
    {
        return Str::ascii($palavra);
    }

    public function getTabelaBrasileirao()
    {
        $client = new Client(['verify' => false]);
        $response = $client->get('https://www.gazetaesportiva.com/campeonatos/brasileiro-serie-a/');
        $html = (string) $response->getBody();
        $crawler = new Crawler($html);
        $rows = [];

        $crawler->filter('table tr')->each(function ($row) use (&$rows) {
            $rowData = [];
            $row->filter('td')->each(function ($cell) use (&$rowData) {
                $rowData[] = $this->corrigirPalavra($cell->text());
            });
            $rows[] = $rowData;
        });

        return $rows;
    }
}

