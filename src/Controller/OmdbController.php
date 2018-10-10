<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class OmdbController extends AbstractController
{
    /**
     * @Route("/query", name="query")
     */
    public function query()
    {


        return $this->render('omdb/index.html.twig', [
            'controller_name' => 'OmdbController',
            'title' =>"coucou",
            'description' =>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt quasi non, libero nobis atque earum.",
            'list' => array(
            	'option1' =>'hello',
            	'option2' =>'world',
            	'option3' =>'twig',
            	'option4' =>'sql'
       		)
        ]);
    }



/**
     * @Route("/movie", name="movie")
     */
	public function affichageFilm(){

		$apiKey = '746ad38e';
    	$query = "wars";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://www.omdbapi.com/?s='. $query .'&apikey=' . $apiKey);
        curl_setopt($ch,  CURLOPT_RETURNTRANSFER, true);

        $result_curl = curl_exec($ch);

        // On transforme le résultat de Curl en un objet JSON utilisable
        $json = json_decode($result_curl);
        // var_dump($json);

        // Rendu
    	return $this->render('omdb/film.html.twig', [
            'query' => $query,
            'movies' => $json->Search

        ]);

	}

/**
     * @Route("/film_param/{query}", name="film avec parametre")
     */
	public function filmParam($query){

		$apiKey = '746ad38e';
   

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://www.omdbapi.com/?s='. $query .'&apikey=' . $apiKey);
        curl_setopt($ch,  CURLOPT_RETURNTRANSFER, true);

        $result_curl = curl_exec($ch);

        // On transforme le résultat de Curl en un objet JSON utilisable
        $json = json_decode($result_curl);
        // var_dump($json);

        // Rendu
    	return $this->render('omdb/film.html.twig', [
            'query' => $query,
            'movies' => $json->Search

        ]);



	}


}