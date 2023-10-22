<?php

class About extends Controller {
    public function Page($nama = 'user') 
    {
        $data['nama'] = $nama;
        $this->view('templates/header');
        $this->view('about/page', $data);
        $this->view('templates/footer');

    }

    public function index ($nama = 'user')
    {
        $data['nama'] = $nama; 
        //tambahkan yang lain

 
        $this->view('templates/header');
        $this->view('about/index', $data);
        $this->view('templates/footer');

    }
}

