<?php
class TokoSepatu extends CI_Controller
{
    public function __construct()
    {
        parent ::__construct();
        $this->load->model('ModelTokoSepatu');
    }
    public function index()
    {
        $this->load->view('input_tokosepatu');
    }

    public function cetak()
    {
        $this->form_validation->set_rules('nama', 'Nama Pembeli',
        'required|min_length[3]',[
            'required' => 'Nama Pembeli Harus diisi'
        ]);
        $this->form_validation->set_rules('nohp', 'Nomor HP',
        'required|min_length[3]',[
            'required' => 'Nomor HP Harus diisi'
        ]);
        if ($this->form_validation->run() != true){
            $this->load->view('input_tokosepatu');
        }else{


        $data = [
            'nama' => $this->input->post('nama'),
            'nohp' => $this->input->post('nohp'),
            'merk' => $this->input->post('merk'),
            'ukuran' => $this->input->post('ukuran'),
            'harga' => $this->ModelTokoSepatu->proses($this->input->post('merk'))
        ];

        $this->load->view('output_tokosepatu', $data);
        } 
    }
}