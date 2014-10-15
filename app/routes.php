<?php

use Symfony\Component\HttpFoundation\Request;

// Home page
$app->get('/', function () use ($app) {
    return $app['twig']->render('layout.html.twig');
});

// Details for a concert
$app->get('/concerts/{id}', function($id) use ($app) {
    $concert = $app['dao.concert']->find($id);
    return $app['twig']->render('concert.html.twig', array('concert' => $concert));
});
// List of all concerts
$app->get('/concerts/', function() use ($app) {
    $concerts = $app['dao.concert']->findAll();
    return $app['twig']->render('concerts.html.twig', array('concerts' => $concerts));
});
// Search form for concerts
$app->get('/concerts/search/', function() use ($app) {
   $genres = $app['dao.genre']->findAll();
    return $app['twig']->render('concerts_search.html.twig', array('genres' => $genres));
});
// Results page for concerts
$app->post('/concerts/results/', function(Request $request) use ($app) {
    $genreId = $request->request->get('genre');
    $concerts = $app['dao.concert']->findAllByGenre($genreId);
    return $app['twig']->render('concerts_results.html.twig', array('concerts' => $concerts));
});