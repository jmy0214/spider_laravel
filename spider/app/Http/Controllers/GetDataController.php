<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Person;

class GetDataController extends Controller
{
    public function GetData()
    {
        $client = new Client();
        for ($page = 1; $page <= 9849; $page++) {
            $response = $client->request('GET', 'http://202.117.24.229/api/users?page=' . $page);
            $data = json_decode((string)$response->getBody(), true);

            foreach ($data['data']['list'] as $tmp) {
                $person = [];
                $person['user_id'] = $tmp['id'];
                $person['name'] = $tmp['name'];
                $person['department'] = $tmp['deptName'];
                Person::create($person);
            }
            sleep(1);
        }
    }

}
