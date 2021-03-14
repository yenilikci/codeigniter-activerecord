<?php
class Personel extends CI_Controller
{
    public function index()
    {
        $rows = $this->db->get("personel")->result();
        /*
            $viewData = array(
                "rows" => $rows
            ); böyle de olur
         */

        $viewData = new stdClass();
        $viewData->rows = $rows;

        $this->load->view("listeleme",$viewData);
    }

    public function updatePage()
    {
        $id = $this->uri->segment(3);

        $row = $this->db
            ->where("id",$id)
            ->get("personel")->row();

        $viewData = new stdClass();
        $viewData->row = $row;

        $this->load->view("duzenle",$viewData);
    }

    public function update($id)
    {
        echo $id;
        $title = $this->input->post("title");
        $detail = $this->input->post("detail");

        $data = array(
            "title" => $title,
            "detail" => $detail
        );

        $update = $this->db
            ->where("id",$id)
            ->update("personel",$data);

        if ($update)
        {
            redirect(base_url("personel"));
        }
        else
        {
            echo "Düzenleme işlemi sırasında bir problem oluştu!";
        }
    }

    public function insertPage()
    {
        $this->load->view("ekle");
    }

    public function insert()
    {
        $title = $this->input->post("title");
        $detail = $this->input->post("detail");
        
        $data = array(
            "title" => $title,
            "detail" => $detail
        );
        $insert = $this->db->insert("personel",$data);
        
        if($insert)
        {
            redirect(base_url("personel"));
        }
        else {
            echo "kayıt eklenemedi";
        }
    }

    public function delete($id)
    {
        $delete = $this->db->where("id",$id)->delete("personel");
        if ($delete)
        {
            redirect(base_url("personel"));
        }
        else
        {
            echo "silme işlemi sırasında bir problem oluştu!";
        }
    }

    public function model()
    {
        //önce kullanacağın modeli load et
        $this->load->model("personelModel");
        //sonra o modeli kullan!
        $results = $this->personelModel->get();

        $delete = $this->personelModel->delete(9);

        echo $delete;
    }

    public function modelUsage()
    {
        $this->load->model("personelModel");


        //vericek
       // $result = $this->personelModel->get(array("id" => "8"));
       // $result = $this->personelModel->getAll(array("id>" => "8"));


        //verisil
       //  $delete = $this->personelModel->delete(array("id"=>10));


        /*veriekle
        $data = array(
            "title" => "melos",
            "detail" => "bir numaraaa"
        );
        $insert = $this->personelModel->insert($data);
        */
        

        /*veri güncelleme
        $data = array(
            "title" => "melos",
            "detail" => "bir numaraaa"
        );
        $where = array(
            "id" =>20
        );
        $update = $this->personelModel->update($where,$data);
        */

        /*custom query
        $query = $this->personelModel->query("SELECT * from personel LIMIT 1");
        print_r($query);
        */

        /*last insert id
         echo $this->personelModel->getLastId();
        */

    }

}

