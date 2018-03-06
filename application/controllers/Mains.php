<?php
class Mains extends CI_Controller
{

    function __construct() {
        parent::__construct();

        
        $this->load->helper('form');
        $this->load->database();
    }
    public function index() {
        $data=[];
        $data['title']="Peoria";
        $this->load->view("main/header", $data); 


        $this->load->view('main/home');

        $this->load->view("main/footer");
    }
    public function contact()
    {
        $data=[];
        $data['title'] = 'Peoria :: Contact us';
        $this->load->view("main/header", $data);

        $data2['contact'] = '';
        $this->load->view('main/page', $data2);

        $this->load->view('main/footer');
    }
    public function gallery()
    {
        $data=[];
        $data['title'] = 'Peoria :: Gallery';
        $this->load->view("main/header", $data);

        $data2['gallery'] = '';
        $this->load->view('main/page', $data2);

        $this->load->view('main/footer');
    }
    public function concern()
    {
        $data=[];
        $data['title'] = 'Peoria :: Concern';
        $this->load->view("main/header", $data);

        $data2['concern'] = '';
        $this->load->view('main/page', $data2);

        $this->load->view('main/footer');
    }
    public function export()
    {
        $data=[];
        $data['title'] = 'Peoria :: Export';
        $this->load->view("main/header", $data);

        $data2['export'] = '';
        $this->load->view('main/page', $data2);

        $this->load->view('main/footer');
    }
    public function product($productid)
    {
        $data=[];
        $data['title'] = 'Peoria :: Product';
        $this->load->view("main/header", $data);

        $data2['productid'] = $productid;
        $this->load->view('main/product', $data2);

        $this->load->view('main/footer');
    }
    public function modal_show()
    {
        $pid = $this->input->post('id');
       // echo $id;

    ?>


    <div class="row">
        <?php 
        $this->db->where("id", $pid);
        $products_info=$this->db->get("products");
        foreach ($products_info->result_array() as $products_all) {
            $id = $products_all['id'];
            $title = $products_all['title'];
            $body = $products_all['body'];
            $proid = $products_all['proid'];
        ?>
        <div class="row">
            <div class="col-md-6">
                <h2 style="padding-left: 15px"><?php echo $title; ?></h2>
            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="col-md-5">
            <img src="<?php echo base_url() ?>assest/images/products/<?php echo $id; ?>_big.jpg" onerror="this.src='<?php echo base_url(); ?>assest/images/products/alt.jpg'">
        </div>
        <div class="col-md-7">
            <div class="modal-product">
               <?php echo $body; ?>
            </div>  
        </div>
        <?php } ?>
    </div>

    <div class="row modal-product">
        <div class="col-md-12">
            <h3>Related Products</h3>
        </div>
    </div>

    <div class="row text-center">
        <?php 
        $this->db->where("proid", $proid);
        $this->db->order_by("id", "desc");
        $this->db->limit("4");
        $product_info=$this->db->get("products");
        foreach ($product_info->result_array() as $product_all) {
            $ids = $product_all['id'];
        ?>
        <div class="col-md-3">
            <a href="<?php echo base_url().'mains/productdetails/'.$ids; ?>">
                <img src="<?php echo base_url() ?>assest/images/products/<?php echo $ids; ?>_thumb.jpg" onerror="this.src='<?php echo base_url(); ?>assest/images/products/alt.jpg'">
            </a>
        </div>
        <?php } ?>

    </div>


<?php 
    }
    public function productdetails($ids)
    {
        $data=[];
        $data['title'] = 'Peoria :: Product Details';
        $this->load->view("main/header", $data);

        $data2['proid'] = $ids;
        $this->load->view('main/productdetails', $data2);

        $this->load->view('main/footer');
    }
    public function company()
    {
        $data=[];
        $data['title'] = 'Company :: Peoria';
        $this->load->view("main/header", $data);

        $data2['company'] = '';
        $this->load->view('main/page', $data2);

        $this->load->view('main/footer');
    }
    
    
    public function company_about()
    {
        $data=[];
        $data['title'] = 'Company :: Peoria';
        $this->load->view("main/header", $data);

        $data2['company_about'] = '';
        $this->load->view('main/page', $data2);

        $this->load->view('main/footer');
    }
    public function company_directors()
    {
        $data=[];
        $data['title'] = 'Company :: Peoria';
        $this->load->view("main/header", $data);

        $data2['company_directors'] = '';
        $this->load->view('main/page', $data2);

        $this->load->view('main/footer');
    }
    public function company_chairman_message()
    {
        $data=[];
        $data['title'] = 'Company :: Peoria';
        $this->load->view("main/header", $data);

        $data2['company_chairman_message'] = '';
        $this->load->view('main/page', $data2);

        $this->load->view('main/footer');
    }
    public function company_md_message()
    {
        $data=[];
        $data['title'] = 'Company :: Peoria';
        $this->load->view("main/header", $data);

        $data2['company_md_message'] = '';
        $this->load->view('main/page', $data2);

        $this->load->view('main/footer');
    }
    public function company_testimonials()
    {
        $data=[];
        $data['title'] = 'Company :: Peoria';
        $this->load->view("main/header", $data);

        $data2['company_testimonials'] = '';
        $this->load->view('main/page', $data2);

        $this->load->view('main/footer');
    }
    public function company_certification()
    {
        $data=[];
        $data['title'] = 'Company :: Peoria';
        $this->load->view("main/header", $data);

        $data2['company_certification'] = '';
        $this->load->view('main/page', $data2);

        $this->load->view('main/footer');
    }
    public function company_social_responsibility()
    {
        $data=[];
        $data['title'] = 'Company social responsibility :: Peoria';
        $this->load->view("main/header", $data);

        $data2['company_social_responsibility'] = '';
        $this->load->view('main/page', $data2);

        $this->load->view('main/footer');
    }

}
?>