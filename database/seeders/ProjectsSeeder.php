<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\projects;
use App\Models\services;

class ProjectsSeeder extends Seeder
{
    public function run(): void
    {
        $serviceIds = services::pluck('id', 'name');

        $data = [
            [
                'name' => 'Réseau LAN Ministère de la Santé',
                'description' => 'Déploiement d\'une infrastructure réseau LAN complète pour le Ministère de la Santé de Brazzaville, couvrant 3 bâtiments et plus de 200 postes.',
                'details' => 'Installation de switches Cisco, câblage structuré Cat6, configuration VLAN, mise en place d\'un pare-feu et d\'un serveur DHCP/DNS centralisé.',
                'image' => '',
                'service_id' => $serviceIds['Systèmes réseaux'] ?? null,
            ],
            [
                'name' => 'Site web TOTAL Congo',
                'description' => 'Conception et développement du site vitrine institutionnel de TOTAL Congo avec espace presse et intégration de flux d\'actualités.',
                'details' => 'Site développé sous Laravel avec back-office d\'administration, référencement SEO optimisé et hébergement sécurisé.',
                'image' => '',
                'service_id' => $serviceIds['Développement web'] ?? null,
            ],
            [
                'name' => 'Vidéosurveillance Hôtel Olympic',
                'description' => 'Installation d\'un système de vidéosurveillance complet avec 48 caméras IP HD et enregistrement centralisé pour l\'Hôtel Olympic de Brazzaville.',
                'details' => 'Caméras Hikvision 4K, NVR 32 canaux, accès à distance sécurisé via VPN, formation du personnel de sécurité.',
                'image' => '',
                'service_id' => $serviceIds['Sécurité & contrôle'] ?? null,
            ],
            [
                'name' => 'Application de gestion RH — SNPC',
                'description' => 'Développement d\'un logiciel de gestion des ressources humaines sur mesure pour la Société Nationale des Pétroles du Congo.',
                'details' => 'Modules : gestion du personnel, paie, congés, évaluations, reporting. Déploiement sur serveur interne avec accès multi-sites.',
                'image' => '',
                'service_id' => $serviceIds['Logiciel métier'] ?? null,
            ],
            [
                'name' => 'Téléphonie IP — Groupe Cofipa',
                'description' => 'Mise en place d\'une solution de téléphonie IP unifiant les 5 agences du Groupe Cofipa en Congo et en RDC.',
                'details' => 'Serveur Asterisk, 120 postes IP Cisco, conférences audio/vidéo, messagerie vocale unifiée, réduction de 60% des coûts téléphoniques.',
                'image' => '',
                'service_id' => $serviceIds['Téléphonie IP'] ?? null,
            ],
            [
                'name' => 'Maintenance parc informatique — Mairie de Brazzaville',
                'description' => 'Contrat de maintenance annuel couvrant l\'ensemble du parc informatique de la Mairie de Brazzaville (150 postes).',
                'details' => 'Maintenance préventive trimestrielle, support helpdesk, remplacement de matériel défaillant, mises à jour système.',
                'image' => '',
                'service_id' => $serviceIds['Maintenance informatique'] ?? null,
            ],
        ];

        foreach ($data as $item) {
            projects::firstOrCreate(['name' => $item['name']], $item);
        }
    }
}
