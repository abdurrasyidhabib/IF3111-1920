<?php
class M_comment extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function addComment()
  {
    $data = [
      'comm_id' => '',
      'timestamp' => date('d M Y | H:i:s'),
      'comm_title' => $this->input->post('comm_title'),
      'comm' => $this->input->post('comment'),
      'aspek' => $this->input->post('aspect'),
      'lampiran' => $this->fileUpload(),
      'user_id' => $this->session->userdata('id')
    ];
    $this->db->insert('comment', $data);
  }

  public function showAllComments()
  {
    $data = $this->db->query("select * from user natural join comment natural join user_role")->result_array();
    return $data;
  }
  public function showCommDetail($comm_id)
  {
    $data = $this->db->query("select * from user natural join comment natural join user_role where comm_id=$comm_id")->result_array()[0];
    return $data;
  }

  public function fileUpload()
  {
    $config = [
      'upload_path' => './assets/doc',
      'allowed_types' => "gif|jpg|png|jpeg|pdf",
      'overwrite' => TRUE,
      'max_size' => "2048000",
      'max_height' => "768",
      'max_width' => "1024",
      'file_name' => $this->session->userdata('id') . "-" . date('dmY-His')
    ];

    $this->load->library('upload', $config);
    $this->upload->do_upload('lampiran');
    print_r($this->upload->display_errors());

    return $this->upload->data('file_name');
  }

  public function myLapor()
  {
    $id = $this->session->userdata('id');
    $data = $this->db->query("select * from comment natural join user where user_id=$id")->result_array();
    return $data;
  }
}
