<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\produits;

class ProduitsSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name' => 'Switch Cisco Catalyst 24 ports',
                'description' => 'Switch manageable 24 ports Gigabit Ethernet avec 4 ports SFP uplink. Idéal pour les PME et administrations. Support PoE+ pour alimenter les téléphones IP et caméras.',
                'image' => '',
            ],
            [
                'name' => 'Caméra IP Hikvision 4MP',
                'description' => 'Caméra dôme 4 mégapixels avec vision nocturne 30m, compression H.265+, résistance aux intempéries IP67. Compatible avec tous les NVR Hikvision.',
                'image' => '',
            ],
            [
                'name' => 'Serveur Dell PowerEdge T40',
                'description' => 'Serveur tour entrée de gamme, Intel Xeon E-2224G, 8 Go RAM DDR4 ECC, 1 To HDD. Parfait pour les petites structures souhaitant un serveur de fichiers ou d\'applications.',
                'image' => '',
            ],
            [
                'name' => 'Téléphone IP Cisco 7821',
                'description' => 'Téléphone IP 2 lignes avec écran couleur 3,2 pouces, compatible SIP et SCCP, qualité audio HD. Adapté aux environnements professionnels exigeants.',
                'image' => '',
            ],
            [
                'name' => 'Onduleur APC Smart-UPS 1500VA',
                'description' => 'Onduleur 1500 VA / 1000 W avec 8 prises IEC, protection contre les surtensions, gestion via logiciel PowerChute. Autonomie jusqu\'à 11 minutes en pleine charge.',
                'image' => '',
            ],
            [
                'name' => 'Pare-feu Fortinet FortiGate 60F',
                'description' => 'Pare-feu nouvelle génération avec débit 10 Gbps, VPN SSL/IPsec, filtrage URL, protection contre les intrusions (IPS). Idéal pour les PME et succursales.',
                'image' => '',
            ],
        ];

        foreach ($data as $item) {
            produits::firstOrCreate(['name' => $item['name']], $item);
        }
    }
}
