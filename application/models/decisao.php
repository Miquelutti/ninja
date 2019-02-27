<?php 
class Decisao extends CI_Model{

    function __construct(){
      parent::__construct(); // construct the Model class
      $this->load->database(); // construct the Model class
    }


    public function BuscaSites(){
        return $this->db->query("SELECT nome,id_site FROM sites")->result_array();

    }

    public function buscarIdSite($id) {
        return $this->db->query("SELECT * FROM checklist c INNER JOIN sites s ON c.id_site = s.id_site WHERE c.id_site = $id")->result_array();
    }
    public function BuscaTudo(){
        return $this->db->query("SELECT passo, categoria FROM checklist")->result_array();
    }

    public function adicionar($dado) {
        $this->db->insert('sites', $dado);
        $id_fk = $this->db->insert_id();

        $passos = array ('DOCTYPE', 'Charset', 'Title', 'Meta Title', 'Meta Description', 'Alternate attribute', 'CSS', 'Social Medias', 'Headers', 'Section', 'Footer', 'Aside', 'Article', 
            'Google My business', 'Google Disavow', 'Google Webmaster Tools', 'Google Adwords', 
            'Brand Social Media (Facebook, Twitter & Google+))', 'Social Bookmarking', 'BLOG/Fórum',
            'Domínio único', 'Robots', 'Tags H (h1,h2..)', 'Fixar links quebrados', 'BreadCrumbs (navbar)', 'TLD Extension', 'Sitemap XML/HTML', 'Responsividade', 'SEO - Localidade',
            'GMetrix', 'CDN', 'Redirecionamento 301', 'Tags Canônicas', 'Redução Pop-ups e anúncios', 'Criptografia SSL', 'SEO Wordpress Plugin');

        $categoria = array ('Head', 'Head', 'Head', 'Head', 'Head', 'Head', 'Head', 'Head', 'HTML5', 'HTML5', 'HTML5', 'HTML5', 'HTML5', 'offpage', 'offpage', 'offpage', 'offpage', 'offpage', 'offpage', 'offpage', 'onpage', 'onpage', 'onpage', 'onpage', 'onpage', 'onpage', 'onpage', 'onpage', 'onpage', 'onpage', 'onpage', 'onpage', 'onpage', 'onpage','onpage', 'onpage');
        
        $estado = array ('0x30', '0x30', '0x30', '0x30', '0x30', '0x30', '0x30', '0x30', '0x30', '0x30', '0x30', '0x30', '0x30', '0x30', '0x30', '0x30', '0x30', '0x30', '0x30', '0x30', '0x30', '0x30', '0x30', '0x30', '0x30', '0x30', '0x30', '0x30', '0x30', '0x30', '0x30', '0x30', '0x30', '0x30', '0x30', '0x30');

        $result = count($estado);
        for ($i=0; $i < $result; $i++) { 
            $teste = array ('passo'=> $passos[$i], 'categoria'=> $categoria[$i], 'estado'=> $estado[$i],'id_site'  =>$id_fk, 'deletado' => 0);
            $this->db->insert('checklist', $teste);
        }
    }
}