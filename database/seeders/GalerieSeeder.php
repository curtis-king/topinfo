<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Galerie;

class GalerieSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['title' => 'Déploiement réseau Ministère de la Santé', 'description' => 'Installation du câblage structuré Cat6 dans les 3 bâtiments du Ministère.', 'cover_image' => 'galerie/photo_1.jpg'],
            ['title' => 'Salle serveurs SNPC', 'description' => 'Baie de serveurs et équipements réseau déployés pour la SNPC.', 'cover_image' => 'galerie/photo_2.jpg'],
            ['title' => 'Installation vidéosurveillance Hôtel Olympic', 'description' => 'Pose des caméras Hikvision 4K dans le hall principal de l\'hôtel.', 'cover_image' => 'galerie/photo_3.jpg'],
            ['title' => 'Formation équipe Cofipa', 'description' => 'Session de formation des utilisateurs sur le nouveau système de téléphonie IP.', 'cover_image' => 'galerie/photo_4.jpg'],
            ['title' => 'Configuration pare-feu FortiGate', 'description' => 'Mise en place de la politique de sécurité réseau chez un client.', 'cover_image' => 'galerie/photo_5.jpg'],
            ['title' => 'Inauguration bureau TOP INFO', 'description' => 'Ouverture de notre nouvelle agence au rond-point Koulounda, Brazzaville.', 'cover_image' => 'galerie/photo_6.jpg'],
            ['title' => 'Atelier maintenance préventive', 'description' => 'Intervention trimestrielle sur le parc informatique de la Mairie de Brazzaville.', 'cover_image' => 'galerie/photo_7.jpg'],
            ['title' => 'Livraison serveur Dell PowerEdge', 'description' => 'Installation et configuration d\'un serveur tour pour un client du secteur bancaire.', 'cover_image' => 'galerie/photo_8.jpg'],
            ['title' => 'Réunion partenariat Cisco', 'description' => 'Signature du contrat de partenariat officiel avec Cisco Systems.', 'cover_image' => 'galerie/photo_9.jpg'],
            ['title' => 'Équipe TOP INFO', 'description' => 'Notre équipe de techniciens certifiés, prêts à vous accompagner.', 'cover_image' => 'galerie/photo_10.jpg'],
        ];

        foreach ($data as $item) {
            Galerie::firstOrCreate(['title' => $item['title']], $item);
        }
    }
}
