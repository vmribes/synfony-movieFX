<?php

namespace App\Service;

class DBTest
{
    private array $movies = [
        ["id"=>"2", "title" => "Ava", "tagline" => "Kill. Or be killed",
            "release_date" => 12, "poster" => "movie2.png"],
        ["id" => "3", "title" => "Bill &Ted Face the Music",
            "tagline" => "The future awaits", "release_date" => "2020-09-24", "poster" => "movie3.png"],
        ["id" => "4", "title" => "Hard Kill",
            "tagline" => "Take on a madman. Save the world.", "release_date" => "2020-09-14", "poster" => "movie4.png"],
        ["id" => "5", "title" => "The Owners", "tagline" => "",
            "release_date" => "2020-05-10", "poster" => "movie5.png"],
        ["id" => "6", "title" => "The New Mutants",
            "tagline" => "It's time to face your demons.", "release_date" => "2020-04-20", "poster" => "movie6.png"],
    ];

    /**
     * @return array|\string[][]
     */
    public function getMovies(): array
    {
        return $this->movies;
    }
}