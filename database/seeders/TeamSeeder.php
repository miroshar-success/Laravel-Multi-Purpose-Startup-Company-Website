<?php

namespace Database\Seeders;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Facades\MetaBox;
use Botble\Base\Supports\BaseSeeder;
use Botble\Team\Models\Team;

class TeamSeeder extends BaseSeeder
{
    public function run(): void
    {
        $this->uploadFiles('teams');

        $teams = [
            [
                'name' => 'Devon Lane',
                'title' => 'CEO',
                'location' => 'USA',
            ],
            [
                'name' => 'Jennie Tho',
                'title' => 'Finance Manager',
                'location' => 'Qatar',
            ],
            [
                'name' => 'Symon Lesin',
                'title' => 'Technology Manager',
                'location' => 'India',
            ],
            [
                'name' => 'Xao Shin',
                'title' => 'Developer Fullstack',
                'location' => 'China',
            ],
            [
                'name' => 'Peter Cop',
                'title' => 'Designer',
                'location' => 'Russia',
            ],
            [
                'name' => 'Darrell Steward',
                'title' => 'Product Designer',
                'location' => 'USA',
            ],
            [
                'name' => 'Guy Hawkins',
                'title' => 'Computer Programmer',
                'location' => 'Denmark',
            ],
            [
                'name' => 'Ronald Richards',
                'title' => 'Data scientist',
                'location' => 'Sweden',
            ],
            [
                'name' => 'Kathryn Murphy',
                'title' => 'Network administrator',
                'location' => 'Finland',
            ],
            [
                'name' => 'Floyd Miles',
                'title' => 'Computer analyst',
                'location' => 'Latvia',
            ],
            [
                'name' => 'Devon Lane',
                'title' => 'Computer scientist',
                'location' => 'Iceland',
            ],
            [
                'name' => 'Cameron Williamson',
                'title' => 'Product Designer',
                'location' => 'Estonia',
            ],
        ];

        Team::query()->truncate();

        $fake = $this->fake();

        foreach ($teams as $index => $item) {
            $item['photo'] = 'teams/' . (($index > 4 ? $this->random(1, 4) : $index) + 1) . '.png';
            $item['socials'] = json_encode([
                'facebook' => 'fb.com',
                'twitter' => 'twitter.com',
                'instagram' => 'instagram.com',
            ]);

            $item['status'] = BaseStatusEnum::PUBLISHED;

            $team = Team::query()->create($item);

            MetaBox::saveMetaBoxData($team, 'description', $fake->paragraph(1));
        }
    }
}
