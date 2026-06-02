<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\actuality;

class ActualitiesSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'title' => 'TOP INFO remporte le contrat réseau du Ministère de la Santé',
                'description' => 'Après un appel d\'offres compétitif, TOP INFO a été sélectionné pour déployer l\'infrastructure réseau du Ministère de la Santé.',
                'content' => 'TOP INFO a remporté le marché de déploiement de l\'infrastructure réseau du Ministère de la Santé de Brazzaville. Ce projet d\'envergure couvre 3 bâtiments et plus de 200 postes de travail. Les travaux débuteront au premier trimestre 2026 et s\'étendront sur 4 mois. Cette victoire consolide notre position de leader des solutions IT en République du Congo.',
                'publication_date' => '2026-05-20',
                'is_published' => true,
            ],
            [
                'title' => 'Nouveau service : Cybersécurité et audit de sécurité',
                'description' => 'TOP INFO étend son offre avec un nouveau service dédié à la cybersécurité et à l\'audit des systèmes d\'information.',
                'content' => 'Face à la recrudescence des cyberattaques sur le continent africain, TOP INFO lance son pôle cybersécurité. Nous proposons désormais des audits de sécurité, des tests d\'intrusion, la mise en conformité RGPD et la formation de vos équipes aux bonnes pratiques de sécurité informatique. Contactez-nous pour un diagnostic gratuit.',
                'publication_date' => '2026-05-10',
                'is_published' => true,
            ],
            [
                'title' => 'Partenariat stratégique avec Cisco Systems',
                'description' => 'TOP INFO devient partenaire officiel Cisco, renforçant notre capacité à déployer des solutions réseau de classe entreprise.',
                'content' => 'Nous sommes fiers d\'annoncer notre partenariat avec Cisco Systems, leader mondial des technologies réseau. Ce statut de partenaire certifié nous permet d\'accéder aux dernières technologies Cisco, de bénéficier d\'un support technique dédié et d\'offrir à nos clients des garanties constructeur sur l\'ensemble des équipements déployés.',
                'publication_date' => '2026-04-15',
                'is_published' => true,
            ],
        ];

        foreach ($data as $item) {
            actuality::firstOrCreate(['title' => $item['title']], $item);
        }
    }
}
