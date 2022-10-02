<?php

namespace App\Http\Controllers;


use GuzzleHttp\Client;

class DetectionController {

    public function detection() {
        $client  = new Client();
        $request = $client->request('GET', 'https://resultados.tse.jus.br/oficial/ele2022/544/dados-simplificados/br/br-c0001-e000544-r.json');
        $content = json_decode($request->getBody()->getContents());

        $item = [];
        $item['information']['date']             = $content->dg;
        $item['information']['hour']             = $content->hg;
        $item['information']['percentage_total'] = $content->pst;
        foreach ($content->cand as $key => $candidate) {
            $item['candidates'][$key]['name']                  = $candidate->nm;
            $item['candidates'][$key]['part_number']           = $candidate->n;
            $item['candidates'][$key]['part_name']             = $this->getFormatedPartName($candidate->cc);
            $item['candidates'][$key]['votes_counted']         = $candidate->vap;
            $item['candidates'][$key]['calculated_percentage'] = $candidate->pvap;
        }

        return view('home', compact('item'));
    }

    public function getFormatedPartName(string $partName): string {
        $partName = explode(" ", $partName);

        return $partName[0];
    }
}
