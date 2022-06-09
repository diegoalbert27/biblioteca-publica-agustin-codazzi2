<?php

class controllerHome extends controllerBase {

    public function __construct () {
        parent::__construct();
    }

    public function index () {
        $libro = new libroModel;       
        $allLibros = $libro->get();

        $events = new eventsModel;
        $allEvents = $events->get();

        $news = new newsModel;
        $allNews = $news->get();

        $blog = new blogModel;
        $allBlog = $blog->get();

        $this->view('homeView/landing', array(
            '$allLibros' => $allLibros,
            '$allEvents' => $allEvents,
            '$allNews' => $allNews,
            '$allBlog' => $allBlog, 
            'title' => 'Home'
        ));
    }

    public function about () {
        $this->view('homeView/landing', array(
            'title' => 'Nosotros'
        ));
    }

    public function book() {
        $libro = new libroModel;
        $allLibros = $libro->get();
        $this->view('homeView/landing', array(
            '$allLibros' => $allLibros,
            'title' => 'Libros'
        ));
    }

    public function event() {
        $events = new eventsModel;
        $allEvents = $events->get();

        $allEvents = $this->filterValue($allEvents, 'state_event', 'Pendiente');

        $this->view('homeView/landing', array(
            '$allEvents' => $allEvents,
            'title' => 'Eventos'
        ));
    }

    public function viewevent() {
        if (isset($_GET['id']))
        {
            $id = $_GET['id'];

            $events = new eventsModel;
            
            $allEvents = $events->get();

            $allEvents = $this->filterValue($allEvents, 'id_event', $id);

            $this->view('homeView/landing', array(
                '$allEvents' => $allEvents,
                'title' => $allEvents[0]['title_event']
            ));
        }
    }

    public function new() {
        $news = new newsModel;
        $allNews = $news->get();
        $this->view('homeView/landing', array(
            '$allNews' => $allNews,
            'title' => 'Noticias'
        ));
    }

    public function blog() {
        $blog = new blogModel;
        $allBlog = $blog->get();
        $this->view('homeView/landing', array(
            '$allBlog' => $allBlog, 
            'title' => 'Blog'
        ));
    }
}