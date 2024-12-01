<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ApplicantModel;
use App\Models\AgentModel;
use App\Models\ClientModel;
use App\Controllers\NotifController;
use App\Models\AdminModel;

class MapController extends BaseController
{
    private $applicants;
    private $agents;
    private $clients;
    private $notifcont;
    private $admin;
    public function __construct()
    {
        $this->applicants = new ApplicantModel();
        $this->agents = new AgentModel();
        $this->clients = new ClientModel();
        $this->notifcont = new NotifController();
        $this->admin = new AdminModel();
    }
    // public function map()
    // {
    //     $data['applicants'] = $this->applicants->findAll();
    //     $data['clients'] = $this->clients->findAll();
    //     $data['agents'] = $this->agents->findAll();
    //     return view('Admin/map', $data);
    // }
    public function map()
    {
        // Gather data from your models
        $applicants = $this->applicants->findAll();
        $clients = $this->clients->findAll();
        $agents = $this->agents->findAll();

        // Define the coordinates for the cities
        $cities = [
            'Puerto Princesa City (Capital)' => ['lat' => 9.7392, 'lng' => 118.7353],
            // 'Calapan' => ['lat' => 13.4117, 'lng' => 121.1806],
            'Coron' => ['lat' => 12.0042, 'lng' => 120.1993],
            'Rizal' => ['lat' => 9.4988, 'lng' => 118.4412],
            'Busuanga' => ['lat' => 12.1653, 'lng' => 120.0788],
            'Paluan' => ['lat' => 13.4194, 'lng' => 120.4608],
            'Santa Cruz' => ['lat' => 13.4689, 'lng' => 120.7989],
            'Naujan' => ['lat' => 13.3261, 'lng' => 121.1931],
            'San Jose' => ['lat' => 12.3517, 'lng' => 121.0679],
            'Puerto Galera' => ['lat' => 13.5006, 'lng' => 120.9568],
            'Odiongan' => ['lat' => 12.4011, 'lng' => 121.9900],
            'Mamburao (Capital)' => ['lat' => 13.2291, 'lng' => 120.5972],
            'El Nido' => ['lat' => 11.2014, 'lng' => 119.4288],
            'Brooke\'s Point' => ['lat' => 8.7807, 'lng' => 117.8276],
            'Boac (Capital)' => ['lat' => 13.4434, 'lng' => 121.8416],
            'Mansalay' => ['lat' => 12.5226, 'lng' => 121.4545],
            'Aborlan' => ['lat' => 9.4380, 'lng' => 118.5478],
            'Ferrol' => ['lat' => 12.3631, 'lng' => 121.8672],
            'Calintaan' => ['lat' => 12.5643, 'lng' => 121.0633],
            'Looc' => ['lat' => 13.0434, 'lng' => 120.9802],
            'Magsaysay' => ['lat' => 9.8946, 'lng' => 123.4660],
            'Bulalacao (San Pedro)' => ['lat' => 12.3271, 'lng' => 121.3566],
            'Gloria' => ['lat' => 12.5943, 'lng' => 121.4258],
            'Cajidiocan' => ['lat' => 12.3644, 'lng' => 122.3961],
            'Municipality of Concepcion' => ['lat' => 11.9925, 'lng' => 121.9216],
            'Municipality of Corcuera' => ['lat' => 12.9242, 'lng' => 122.1211],
            'Magdiwang' => ['lat' => 12.3833, 'lng' => 122.5167],
            'Buenavista' => ['lat' => 10.6948, 'lng' => 122.4189],
            'Gasan' => ['lat' => 13.3261, 'lng' => 121.9183],
            'Mogpog' => ['lat' => 13.4722, 'lng' => 121.8564],
            'Torrijos' => ['lat' => 13.3131, 'lng' => 122.0847],
            'Lubang' => ['lat' => 13.8583, 'lng' => 120.1262],
            'Abra De Ilog' => ['lat' => 13.4419, 'lng' => 120.7336],
            'Sablayan' => ['lat' => 12.8348, 'lng' => 120.7886],
            'Pola' => ['lat' => 13.0625, 'lng' => 121.3806],
            'Bataraza' => ['lat' => 8.4594, 'lng' => 117.2604],
            'Agutaya' => ['lat' => 11.1500, 'lng' => 120.9992],
            'Cagayancillo' => ['lat' => 9.5833, 'lng' => 121.2256],
            'Cuyo' => ['lat' => 10.8495, 'lng' => 121.0182],
            'Baco' => ['lat' => 13.3981, 'lng' => 121.0983],
            'Banton' => ['lat' => 12.9333, 'lng' => 122.0667],
            'Araceli' => ['lat' => 10.5667, 'lng' => 119.8667],
            'City Of Calapan (Capital)' => ['lat' => 13.4117, 'lng' => 121.1806],
            'Santa Maria (Imelda)' => ['lat' => 12.4000, 'lng' => 122.0500],
            'Romblon (Capital)' => ['lat' => 12.5703, 'lng' => 122.2870],

            // Region I (Ilocos Region)
            'Laoag City, Ilocos Norte' => ['lat' => 18.1972, 'lng' => 120.5926],
            'Batac, Ilocos Norte' => ['lat' => 18.0556, 'lng' => 120.5657],
            'San Nicolas, Ilocos Norte' => ['lat' => 18.1798, 'lng' => 120.6194],
            'Vigan City, Ilocos Sur' => ['lat' => 17.5745, 'lng' => 120.3869],
            'Candon, Ilocos Sur' => ['lat' => 17.1943, 'lng' => 120.4506],
            'San Fernando, La Union' => ['lat' => 16.6158, 'lng' => 120.3191],
            'Agoo, La Union' => ['lat' => 16.3191, 'lng' => 120.3678],
            'Alaminos City, Pangasinan' => ['lat' => 16.1554, 'lng' => 119.9801],
            'Dagupan City, Pangasinan' => ['lat' => 16.0432, 'lng' => 120.3336],
            'Urdaneta City, Pangasinan' => ['lat' => 15.9761, 'lng' => 120.5714],

            // Region II (Cagayan Valley)
            'Tuguegarao City, Cagayan' => ['lat' => 17.6131, 'lng' => 121.7269],
            'Aparri, Cagayan' => ['lat' => 18.3521, 'lng' => 121.6406],
            'Ilagan City, Isabela' => ['lat' => 17.1448, 'lng' => 121.8611],
            'Cauayan City, Isabela' => ['lat' => 16.9349, 'lng' => 121.7690],
            'Bayombong, Nueva Vizcaya' => ['lat' => 16.4817, 'lng' => 121.1488],
            'Solano, Nueva Vizcaya' => ['lat' => 16.5235, 'lng' => 121.1835],
            'Basco, Batanes' => ['lat' => 20.4487, 'lng' => 121.9702],

            // Region III (Central Luzon)
            'Angeles City, Pampanga' => ['lat' => 15.1473, 'lng' => 120.5840],
            'San Fernando, Pampanga' => ['lat' => 15.0286, 'lng' => 120.6908],
            'Olongapo City, Zambales' => ['lat' => 14.8370, 'lng' => 120.2864],
            'Balanga City, Bataan' => ['lat' => 14.6760, 'lng' => 120.5367],
            'Malolos City, Bulacan' => ['lat' => 14.8443, 'lng' => 120.8106],
            'Meycauayan, Bulacan' => ['lat' => 14.7366, 'lng' => 120.9605],
            'Cabanatuan City, Nueva Ecija' => ['lat' => 15.4862, 'lng' => 120.9674],
            'Gapan City, Nueva Ecija' => ['lat' => 15.3079, 'lng' => 120.9450],

            // Region IV-A (CALABARZON)
            'Batangas City, Batangas' => ['lat' => 13.7565, 'lng' => 121.0583],
            'Lipa City, Batangas' => ['lat' => 13.9417, 'lng' => 121.1635],
            'Lucena City, Quezon' => ['lat' => 13.9374, 'lng' => 121.6179],
            'Antipolo City, Rizal' => ['lat' => 14.6255, 'lng' => 121.1245],
            'Calamba City, Laguna' => ['lat' => 14.1876, 'lng' => 121.1251],
            'Santa Rosa, Laguna' => ['lat' => 14.3122, 'lng' => 121.1111],
            'Trece Martires, Cavite' => ['lat' => 14.2811, 'lng' => 120.8497],
            'Tagaytay City, Cavite' => ['lat' => 14.1154, 'lng' => 120.9687],

            // Cordillera Administrative Region (CAR)
            'Baguio City, Benguet' => ['lat' => 16.4023, 'lng' => 120.5960],
            'Tabuk City, Kalinga' => ['lat' => 17.4767, 'lng' => 121.4583],
            'Bontoc, Mountain Province' => ['lat' => 17.0909, 'lng' => 120.9783],
            'La Trinidad, Benguet' => ['lat' => 16.4554, 'lng' => 120.5879],

            // National Capital Region (NCR)
            'Manila' => ['lat' => 14.5995, 'lng' => 120.9842],
            'Quezon City' => ['lat' => 14.6760, 'lng' => 121.0437],
            'Makati' => ['lat' => 14.5547, 'lng' => 121.0244],
            'Pasig' => ['lat' => 14.5764, 'lng' => 121.0851],
            'Taguig' => ['lat' => 14.5176, 'lng' => 121.0509],
            'Las Piñas' => ['lat' => 14.4445, 'lng' => 120.9939],
            'Caloocan' => ['lat' => 14.7566, 'lng' => 120.9943],
            'Valenzuela' => ['lat' => 14.7011, 'lng' => 120.9830],
        ];

        // Initialize city counts
        $applicantCounts = [];
        $clientCounts = [];
        $agentCounts = [];
        foreach ($cities as $city => $coords) {
            $applicantCounts[$city] = [
                'count' => 0,
                'lat' => $coords['lat'],
                'lng' => $coords['lng'],
            ];
            $clientCounts[$city] = [
                'count' => 0,
                'lat' => $coords['lat'],
                'lng' => $coords['lng'],
            ];
            $agentCounts[$city] = [
                'count' => 0,
                'lat' => $coords['lat'],
                'lng' => $coords['lng'],
            ];
        }

        // Count applicants in each city
        foreach ($applicants as $applicant) {
            if (isset($applicantCounts[$applicant['city']])) {
                $applicantCounts[$applicant['city']]['count']++;
                $applicant['role']="Applicant";
            }
        }

        // Count clients in each city
        foreach ($clients as $client) {
            if (isset($clientCounts[$client['city']])) {
                $clientCounts[$client['city']]['count']++;
            }
        }

        // Count agents in each city
        foreach ($agents as $agent) {
            if (isset($agentCounts[$agent['city']])) {
                $agentCounts[$agent['city']]['count']++;
            }
        }
        $data = $this->notifcont->notification();
        $data = array_merge($this->notifcont->notification(), $this->getDataAd());
        $data['applicantCounts'] = $applicantCounts;
        $data['clientCounts'] = $clientCounts;
        $data['agentCounts'] = $agentCounts;
        return view('Admin/map', $data);
    }
    public function getDataAd()
    {
        $session = session();
        $userId = $session->get('id');
        $data['admin'] = $this->admin->where('admin_id', $userId)
            ->orderBy('id', 'desc')
            ->first();
        return $data;
    }
}
