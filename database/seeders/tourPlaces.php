<?php

namespace Database\Seeders;

use App\Models\TourPlace;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tourPlaces extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $place = new TourPlace;
        $arr = [
            ['name' => 'Taj Mahal'],
            ['name' => 'Great Wall of China'],
            ['name' => 'Machu Picchu'],
            ['name' => 'Eiffel Tower'],
            ['name' => 'Pyramids of Giza'],
            ['name' => 'Statue of Liberty'],
            ['name' => 'Colosseum'],
            ['name' => 'Santorini, Greece'],
            ['name' => 'Grand Canyon'],
            ['name' => 'Venice, Italy'],
            ['name' => 'Niagara Falls'],
            ['name' => 'Stonehenge'],
            ['name' => 'The Louvre'],
            ['name' => 'Petra, Jordan'],
            ['name' => 'Angkor Wat'],
            ['name' => 'Sistine Chapel'],
            ['name' => 'The Vatican'],
            ['name' => 'Mona Lisa'],
            ['name' => 'Museum of Modern Art, New York'],
            ['name' => 'Alhambra, Spain'],
            ['name' => 'Mount Everest'],
            ['name' => 'Marrakech, Morocco'],
            ['name' => 'Red Square, Moscow'],
            ['name' => 'The Great Barrier Reef'],
            ['name' => 'Ayers Rock (Uluru), Australia'],
            ['name' => 'Amazon Rainforest'],
            ['name' => 'Bora Bora, French Polynesia'],
            ['name' => 'Antelope Canyon, Arizona'],
            ['name' => 'The Acropolis, Athens'],
            ['name' => 'Banff National Park, Canada'],
            ['name' => 'Iguazu Falls, Argentina/Brazil'],
            ['name' => 'Chichen Itza, Mexico'],
            ['name' => 'The Palace Museum (Forbidden City), Beijing'],
            ['name' => 'Dubai, United Arab Emirates'],
            ['name' => 'Galapagos Islands, Ecuador'],
            ['name' => 'The Golden Gate Bridge, San Francisco'],
            ['name' => 'Victoria Falls, Zambia/Zimbabwe'],
            ['name' => 'Kilimanjaro, Tanzania'],
            ['name' => 'Santorini, Greece'],
            ['name' => 'The Amazon River'],
            ['name' => 'Mesa Verde National Park, Colorado'],
            ['name' => 'Mount Fuji, Japan'],
            ['name' => 'Yellowstone National Park, Wyoming'],
            ['name' => 'The Louvre, Paris'],
            ['name' => 'The Alhambra, Spain'],
            ['name' => 'Angkor Wat, Cambodia'],
            ['name' => 'Easter Island, Chile'],
            ['name' => 'The Grand Tetons, Wyoming'],
            ['name' => 'Meteora, Greece'],
            ['name' => 'The Serengeti, Tanzania'],
            ['name' => 'Bali, Indonesia'],
            ['name' => 'The Dead Sea, Israel/Jordan'],
            ['name' => 'The Galapagos Islands, Ecuador'],
            ['name' => 'The Great Wall of China'],
            ['name' => 'Halong Bay, Vietnam'],
            ['name' => 'Antelope Canyon, Arizona'],
            ['name' => 'The Colosseum, Rome'],
            ['name' => 'Machu Picchu, Peru'],
            ['name' => 'The Parthenon, Athens'],
            ['name' => 'The Pyramids of Giza, Egypt'],
            ['name' => 'The Taj Mahal, India'],
            ['name' => 'Chichen Itza, Mexico'],
            ['name' => 'The Great Barrier Reef, Australia'],
            ['name' => 'The Inca Trail, Peru'],
            ['name' => 'The Moai Statues of Easter Island'],
            ['name' => 'The Palace of Versailles, France'],
            ['name' => 'The Petra, Jordan'],
            ['name' => 'The Red Square, Moscow'],
            ['name' => 'The Serengeti, Tanzania'],
            ['name' => 'The Stonehenge, England'],
            ['name' => 'The Sydney Opera House, Australia'],
            ['name' => 'The Venice, Italy'],
            ['name' => 'The Victoria Falls, Zambia/Zimbabwe'],
            ['name' => 'The Yellowstone National Park, Wyoming'],
            ['name' => 'The Mount Everest, Nepal'],
            ['name' => 'The Marrakech, Morocco'],
            ['name' => 'The Amazon Rainforest'],
            ['name' => 'The Bora Bora, French Polynesia'],
            ['name' => 'The Dubai, United Arab Emirates'],
            ['name' => 'The Galapagos Islands, Ecuador'],
            ['name' => 'The Golden Gate Bridge, San Francisco'],
            ['name' => 'The Kilimanjaro, Tanzania'],
            ['name' => 'The Santorini, Greece'],
            ['name' => 'The Amazon River'],
            ['name' => 'The Mesa Verde National Park, Colorado'],
            ['name' => 'The Mount Fuji, Japan'],
            ['name' => 'The Yellowstone National Park, Wyoming'],
            ['name' => 'The Louvre, Paris'],
            ['name' => 'The Alhambra, Spain'],
            ['name' => 'The Angkor Wat, Cambodia'],
            ['name' => 'The Easter Island, Chile'],
            ['name' => 'The Grand Tetons, Wyoming'],
            ['name' => 'The Meteora, Greece'],
            ['name' => 'The Serengeti, Tanzania'],
            ['name' => 'The Bali, Indonesia'],
            ['name' => 'The Dead Sea, Israel/Jordan'],
        ];
        for ($i = 0; $i < count($arr); $i++) {
            $place->create($arr);
        }
    }
}