<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $url = $this->getUrl('post');
        $mime = $this->getMime($url);

        return [
            'url' => $url,
            'mime' => $mime,
            'mediable_id' => \App\Models\Post::factory(),
            'mediable_type' => function (array $attributes) {
                return \App\Models\Post::find($attributes['mediable_id'])->getMorphClass();
            }
        ];
    }

    public function getUrl($type = 'post'): string
    {
        switch ($type) {
            case 'post':
                $urls = [
                    'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4',
                    'https://images.pexels.com/photos/12586696/pexels-photo-12586696.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load',
                    'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4',
                    'https://images.pexels.com/photos/19808068/pexels-photo-19808068/free-photo-of-a-red-door-with-a-shadow-on-the-wall.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load',
                    'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerBlazes.mp4',
                    'https://images.pexels.com/photos/20064362/pexels-photo-20064362/free-photo-of-a-train-moving-through-a-subway-station-at-night.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load',
                    'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4',
                    'https://images.pexels.com/photos/19976822/pexels-photo-19976822/free-photo-of-woman-looking-at-flock-of-birds-in-sky.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load',
                    'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerFun.mp4',
                    'https://images.pexels.com/photos/2159543/pexels-photo-2159543.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load'
                ];
                return $this->faker->randomElement($urls);
                break;

            case 'reel':
                $urls = [
                    'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerJoyrides.mp4',
                    'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerMeltdowns.mp4',
                    'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/Sintel.mp4',
                    'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/SubaruOutbackOnStreetAndDirt.mp4',
                    'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/TearsOfSteel.mp4'
                ];
                return $this->faker->randomElement($urls);
                break;

            default:
                # code...
                break;
        }
    }

    public function getMime($url)
    {
        if (str()->contains($url, 'gtv-videos-bucket')) {
            return 'video';
        }

        if (str()->contains($url, 'images.pexels.com')) {
            return 'image';
        }
    }

    // chainable methods to Media Factory
    public function post(): Factory
    {
        $url = $this->getUrl('post');
        $mime = $this->getMime($url);

        return $this->state(function (array $attributes) use ($url, $mime) {
            return [
                'url' => $url,
                'mime' => $mime,
            ];
        });
    }

    public function reel(): Factory
    {
        $url = $this->getUrl('reel');
        $mime = $this->getMime($url);

        return $this->state(function (array $attributes) use ($url, $mime) {
            return [
                'url' => $url,
                'mime' => $mime,
            ];
        });
    }
}
