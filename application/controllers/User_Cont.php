<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Cont extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('nama_user', 'Nama User', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat User', 'required');
        $this->form_validation->set_rules('id_level', 'Pilih Level User', 'required');
        $this->form_validation->set_rules('id_bidang', 'Pilih Bidang User', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telp User', 'required');
        
        if($this->session->userdata('username')==FALSE){
            $this->session->set_flashdata('pesan',' <div class="alert alert-danger alert-dismissible fade show" role="alert">
           Anda Belum login
            <button type="button" class="close" data-dismiss="alert" area-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>');
        redirect('signin/index');
        }
    }
    public function index() {
        $data['title']='Data User';
        $data['user']=$this->db->get('user')->result();
        $data['bidang']=$this->db->get('bidang')->result();
        $data['level']=$this->db->get('level')->result();
        
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/user/index',$data);
        $this->load->view('admin/footer');
    }
    public function add() {

        // Atur rules validasi
        

        $nama_user=$this->input->post('nama_user');
        $alamat=$this->input->post('alamat');
        $id_level=$this->input->post('id_level');
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $id_bidang=$this->input->post('id_bidang');
        $no_telp=$this->input->post('no_telp');
        $data=array(
            'nama_user'     =>$nama_user,
            'alamat'        =>$alamat,
            'id_level'      =>$id_level,
            'id_bidang'     =>$id_bidang,
            'username'      =>$username,
            'password'      =>md5($password),
            'no_telp'       =>$no_telp,
        );
        $this->db->insert('user',$data);
        redirect('user_Cont/index');
    }
    public function update($id) {
        $nama_user  =$this->input->post('nama_user');
        $alamat     =$this->input->post('alamat');
        $id_level   =$this->input->post('id_level');
        $username   =$this->input->post('username');
        $password   =$this->input->post('password');
        $id_bidang  =$this->input->post('id_bidang');
        $no_telp    =$this->input->post('no_telp');
        $where=array('id_user'=>$id);
        $data=array(
            'nama_user'     =>$nama_user,
            'alamat'        =>$alamat,
            'id_level'      =>$id_level,
            'id_bidang'     =>$id_bidang,
            'username'      =>$username,
            'password'      =>md5($password),
            'no_telp'       =>$no_telp,
        );
        $this->db->where($where);
        $this->db->update('user',$data);
        redirect('user_Cont/index');
    }

    public function delete($id)
    {
        $nama=$this->input->post('nama');
        $this->db->where('id_user',$id);
        $this->db->delete('user');
        $this->session->set_flashdata('hapus', $nama);
        redirect('user_Cont/index');
    }
    public function profile($id)
    {
        $data['title']='Profile';
        $data['profile']=$this->db->get_where('user',array('id_user'=>$id))->row();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/profil/index',$data);
        $this->load->view('admin/footer');
    }
}