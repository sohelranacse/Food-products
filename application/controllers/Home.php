<?php
class Home extends CI_Controller
{

    function __construct() {
        parent::__construct();

        $this->load->library('session');
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->library("pagination");


        $admin_user = $this->session->userdata('username');
        if(empty($admin_user))
        {   
            redirect('login');
        }


        $this->load->model('Header_model', 'header');


    } 

    

    public function index() {
        $data=[];
        $data['title']="Admin Panel";
        $data['menuList'] = $this->header->selectMenuheader();
        $data['userlistAll'] = $this->header->userlistAll();
        $this->load->view("header", $data); 


        $this->load->view('home'); //important

        $this->load->view("footer");
    }
    
    function logout(){
        $this->session->unset_userdata('username');
        redirect('login');      
    }

    //login and logout session control

    public function PasswordChange1(){
        echo '
            <div class="input-group">
                <span class="input-group-addon"><i class="icofont icofont-lock"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Enter old Password" onblur="return PasswordChange2(this)">
            </div>
            <input type="hidden" value="'.$this->session->userdata('id').'" id="hiddenSessionId">
            <div id="password2Result"></div>
        ';
    }
    public function loginPassword2(){
        $passwordIn = md5($this->input->post('passwordIn'));
        $hiddenSessionId = $this->input->post('hiddenSessionId');
        $result = $this->header->changePassword2($passwordIn ,$hiddenSessionId);
        if ($result) {
            echo '
            <div class="passInputGroup">
                <div class="input-group">
                    <span class="input-group-addon"><i class="icofont icofont-ui-unlock"></i></span>
                    <input type="password" class="form-control" id="passwordNew" placeholder="Enter new Password">
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icofont icofont-ui-unlock"></i></span>
                    <input type="password" class="form-control" id="passwordNewCon" placeholder="Enter confirm Password" onblur="return passwordNewCon3()">
                </div>
                <div id="password3Result"></div>
                <div id="password4Result"></div>
            </div>
            ';
        }else{
            echo '<span style="margin-top:9px;font-size:12px;color:red;display: block">password does not exist.</span>';
        }
    }

    public function loginPassword3(){
        $id = $this->session->userdata('id');
        $passwordNewCon = md5($this->input->post('passwordNewCon'));
        $result = $this->header->changePassword3($passwordNewCon, $id);
        if ($result) {
            echo '
                <div class="alert alert-success" style="margin-top:10px">Password Successfully Changed.</div>
                <a class="btn btn-info btn-block" href="'.base_url().'home/logout">Login Now</div>
            ';
        }else{
            echo '<span style="margin-top:9px;font-size:12px;color:red;display: block">Present password can not be changed</span>';
        }

    }


   
    public function menu(){
        $data=[];
        $data['title']="Menu || Admin Panel";
        $data['menuList'] = $this->header->selectMenuheader();
        $data['userlistAll'] = $this->header->userlistAll();
        $this->load->view("header", $data); //100% need

        $selectMenu['selectMenu'] = $this->header->selectMenu();
        $this->load->view('menu', $selectMenu); //important

        $this->load->view("footer");
    }

    public function menuCreate(){
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('menu','menu','trim|required');
        $this->form_validation->set_rules('icon','icon','trim|required');
        $this->form_validation->set_rules('menuid','menuid','trim|required');
        $this->form_validation->set_rules('submenu','submenu','trim|required');
        $this->form_validation->set_rules('sub_link','sub_link','trim|required');
        if ($this->form_validation->run()==false) {
            $this->menu();
        }else{
            $menus=array(
                'menu' => $this->input->post('menu'),
                'icon' => $this->input->post('icon'),
                'menuid' => $this->input->post('menuid'),
                'submenu' => $this->input->post('submenu'),
                'sub_link' => $this->input->post('sub_link')
            );
            $result = $this->header->menuCreate($menus);
            redirect('home/menu');
        }
    }

    public function subMenuCreate(){
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('menu','menu','trim|required');
        $this->form_validation->set_rules('icon','icon','trim|required');
        $this->form_validation->set_rules('menuid','menuid','trim|required');
        $this->form_validation->set_rules('submenu','submenu','trim|required');
        $this->form_validation->set_rules('sub_link','sub_link','trim|required');

        if ($this->form_validation->run()==false) {
            $this->menu();
        }else{
            $menus=array(
                'menu' => $this->input->post('menu'),
                'icon' => $this->input->post('icon'),
                'menuid' => $this->input->post('menuid'),
                'submenu' => $this->input->post('submenu'),
                'sub_link' => $this->input->post('sub_link')
            );
            $result = $this->header->subMenuCreate($menus);
            redirect('home/menu');
        }
    }



    public function New_User(){
        $data=[];
        $data['title']="New User || Admin Panel";
        $data['menuList'] = $this->header->selectMenuheader();
        $data['userlistAll'] = $this->header->userlistAll();
        $this->load->view("header", $data); 

        $this->load->view("New_User");

        $this->load->view("footer");
    }


    public function user_access(){
        $id = $this->input->post('id');
        $result = $this->header->selectMenu();
        if ($result) {
            echo '
                <div class="well components2">
                    <h4 class="alert alert-success"><i class="icofont icofont-ui-settings"></i> Settings</h4>
                    <ul class="sidebar_ul2">
                    
            ';
           foreach ($result as $value) {
                $id = $value->id;
                $icon = $value->icon;
                $menu = $value->menu;
                
                if (!$menu==0) {
                    echo '                    
                        <li><input type="checkbox" id="'.$id.'c" value="'.$id.':0" onclick="ttt('.$id.')"> <i class="icofont icofont-'.$icon.'"></i>  '.$menu.'</li>
                        <div class="col-xs-12 bac" id="'.$id.'p"></div>
                    ';
                }
           }
           echo '
                    </ul>
                </div>
            ';
        }

    }

    public function user_access_sub_menu(){
        $id = $this->input->post('id');
        $result = $this->header->selectMenuheader2($id);
        if ($result) {
            echo '
                <ul class="lsitul">
            ';
            foreach ($result as $sub) {
                $subId = $sub->id;
                $submenu = $sub->submenu;

                echo '<li class="listCheck"><input type="checkbox" value="'.$id.':'.$subId.'" name="menu_sub[]" checked> '.$submenu.'</li>';

            }
            echo '
                </ul>
            ';
        }
    }


    public function userSubmit(){
        $menu_sub = $this->input->post('menu_sub');

        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username','username','trim|required');
        $this->form_validation->set_rules('password','password','trim|required');
        $this->form_validation->set_rules('role','role','trim|required');
        $this->form_validation->set_rules('status','status','trim|required');

        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $role = $this->input->post('role');
        $status = $this->input->post('status');

        
        if ($this->form_validation->run()==false) {
            $this->New_User();
        }else{

            $userData=array(
                'username' => $username,
                'password' => $password,
                'role' => $role,
                'status' => $status
            );

            $insertuser = $this->db->insert('users',$userData);

            if ($insertuser) {

                $resulss = $this->header->selectlastuser();
                if ($resulss) {
                    foreach ($resulss as $lastid) {
                        $id = $lastid->id;


                        foreach ($menu_sub as $value) {

                            $sohel = explode(':',$value);
                            $menuid = $sohel[0];
                            $submenuid = $sohel[1];

                            $menus=array(
                                'userId' => $id,
                                'menuid' => $menuid,
                                'submenuid' => $submenuid
                            );

                            $this->db->insert('role',$menus);
                        }


                        redirect('home/User_List');
                    }
                }
            }

        } 
        
    } //end add user



    public function User_List(){
        $data=[];
        $data['title']="User List || Admin Panel";
        $data['menuList'] = $this->header->selectMenuheader();
        $data['userlistAll'] = $this->header->userlistAll();
        $this->load->view("header", $data); 

        
        $this->load->view("User_List");

        $this->load->view("footer");
    }
    public function gallery(){
        $data=[];
        $data['title']="Gallery || Admin Panel";
        $data['menuList'] = $this->header->selectMenuheader();
        $data['userlistAll'] = $this->header->userlistAll();
        $this->load->view("header", $data); 

        
        $this->load->view("gallery");

        $this->load->view("footer");
    }
    public function galleryadded(){
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title','title','trim|required');

        $title = $this->input->post('title');
        if ($this->form_validation->run()==false) {
            $this->galleryadded();
        }else{

            $gallerys=array(
                'title' => $title
            );
            $this->db->insert('gallery',$gallerys);

            

            $config['upload_path'] = './assest/images/gallery/';

            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '200000';
            $config['max_width'] = '1524000';
            $config['max_height'] = '1000000';

            $this->load->library('upload', $config);
            $this->load->library('image_lib');
                        
            $upload = $this->upload->do_upload('userfile');


            if($upload == true){

                $data1 = array('upload_data' => $this->upload->data());
                $image= $data1['upload_data']['file_name'];

                $configBig = array();
                $configBig['image_library'] = 'gd2';
                $configBig['source_image'] = './assest/images/gallery/'.$image;
                        
                        
                $configBig['create_thumb'] = TRUE;
                $configBig['maintain_ratio'] = FALSE;
                $configBig['width'] = 450;
                $configBig['height'] = 450;
                $configBig['thumb_marker'] = "_big";
                $this->image_lib->initialize($configBig);
                $this->image_lib->resize();
                $this->image_lib->clear();
                unset($configBig);

                $filename1 = $data1['upload_data']['raw_name'].'_big'.$data1['upload_data']['file_ext'];

                $this->db->limit(1);
                $this->db->order_by("id", 'desc'); 
                $query = $this->db->get("gallery");     
                $row = $query->row();
                $lastid=$row->id;

                $rename = $this->input->post('pho').$lastid.".jpg";

                rename('./assest/images/gallery/' .$filename1, './assest/images/gallery/' .$rename);

                unlink('./assest/images/gallery/'.$image);

                redirect('home/all_gallery');
            }


        }
    }
    public function all_gallery(){
        $data=[];
        $data['title']="Gallery All || Admin Panel";
        $data['menuList'] = $this->header->selectMenuheader();
        $data['userlistAll'] = $this->header->userlistAll();
        $this->load->view("header", $data); 

        
        $this->load->view("all_gallery");

        $this->load->view("footer");
    }
    public function add_product(){
        $data=[];
        $data['title']="Add Product || Admin Panel";
        $data['menuList'] = $this->header->selectMenuheader();
        $data['userlistAll'] = $this->header->userlistAll();
        $this->load->view("header", $data); 

        
        $this->load->view("add_product");

        $this->load->view("footer");
    }
    public function productadded(){
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('proid','proid','trim|required');
        $this->form_validation->set_rules('title','title','trim|required');

        $proid = $this->input->post('proid');
        $title = $this->input->post('title');
        $body = $this->input->post('body');

        if ($this->form_validation->run()==false) {
            $this->productadded();
        }else{

            $productss=array(
                'proid' => $proid,
                'title' => $title,
                'body' => $body
            );
            $this->db->insert('products',$productss);

            

            $config['upload_path'] = './assest/images/products/';

            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '200000';
            $config['max_width'] = '1524000';
            $config['max_height'] = '1000000';

            $this->load->library('upload', $config);
            $this->load->library('image_lib');
                        
            $upload = $this->upload->do_upload('userfile');


            if($upload == true){

                $data1 = array('upload_data' => $this->upload->data());
                $image= $data1['upload_data']['file_name'];

                $configBig = array();
                $configBig['image_library'] = 'gd2';
                $configBig['source_image'] = './assest/images/products/'.$image;
                        
                        
                $configBig['create_thumb'] = TRUE;
                $configBig['maintain_ratio'] = FALSE;
                $configBig['width'] = 450;
                $configBig['height'] = 430;
                $configBig['thumb_marker'] = "_big";
                $this->image_lib->initialize($configBig);
                $this->image_lib->resize();
                $this->image_lib->clear();
                unset($configBig);



                $configBig = array();
                $configBig['image_library'] = 'gd2';
                $configBig['source_image'] = './assest/images/products/'.$image;
                $configBig['create_thumb'] = TRUE;
                $configBig['maintain_ratio'] = FALSE;
                $configBig['width'] = 120;
                $configBig['height'] = 100;
                $configBig['thumb_marker'] = "_thumb";
                $this->image_lib->initialize($configBig);
                $this->image_lib->resize();
                $this->image_lib->clear();
                unset($configBig);



                $filename1 = $data1['upload_data']['raw_name'].'_big'.$data1['upload_data']['file_ext'];
                $filename2 = $data1['upload_data']['raw_name'].'_thumb'.$data1['upload_data']['file_ext'];

                $this->db->limit(1);
                $this->db->order_by("id", 'desc'); 
                $query = $this->db->get("products");     
                $row = $query->row();
                $lastid=$row->id;

                $rename = $lastid."_big.jpg";
                $rename_thumb = $lastid."_thumb.jpg";

                rename('./assest/images/products/' .$filename1, './assest/images/products/' .$rename);
                rename('./assest/images/products/' .$filename2, './assest/images/products/' .$rename_thumb);

                unlink('./assest/images/products/'.$image);

                
            }

            redirect('home/all_product');



        }
    }

        public function all_product(){
        $data=[];
        $data['title']="All Product || Admin Panel";
        $data['menuList'] = $this->header->selectMenuheader();
        $data['userlistAll'] = $this->header->userlistAll();
        $this->load->view("header", $data); 


        //pagination start
        $config = array();
        $config["base_url"] = base_url() . "home/all_product";
        $config["total_rows"] = $this->header->record_count();
        $config["per_page"] = 8;
        $config["uri_segment"] = 3;
        $config['use_page_numbers'] = TRUE;
        $config['first_link'] = 'FIRST';
        $config["uri_segment"] = 3;
        $config['last_link'] = 'LAST';
        $config['next_link'] = '...NEXT';
        $config['prev_link'] = 'PREV...';

        $config['full_tag_open'] = '<div class="paginations">';
        $config['full_tag_close'] = '</div>';
        $config['anchor_class'] = 'class="number" ';
        $config['use_page_numbers'] = TRUE;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data1["results"] = $this->header->fetch_products($config["per_page"], $page);
        $data1["links"] = $this->pagination->create_links();
        //pagination end

        
        $this->load->view("all_product", $data1);
        $this->load->view("footer");
    }
    public function searchproducts(){
        $proid = $this->input->post('proid');


    ?>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Thumb</th>
                    <th width="30%">Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $this->db->join('product', 'products.proid = product.proid');
                $this->db->where("products.proid",$proid);
                $this->db->order_by("products.id",'desc');
                $query = $this->db->get("products");
                $i=1;
                foreach ($query->result_array() as $gallery_all) {
                    $id = $gallery_all['id'];
                    $title = $gallery_all['title'];
                    $category = $gallery_all['name'];
                    $body = substr($gallery_all['body'],0,100).'...';
            ?>
                <tr id="delp<?php echo $id; ?>">
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $title ?></td>
                    <td><?php echo $category ?></td>
                    <td>
                        <img src="<?php echo base_url() ?>assest/images/products/<?php echo $id; ?>_big.jpg" width="100" onerror="this.src='<?php echo base_url(); ?>assest/images/products/alt.jpg'";>
                    </td>
                    <td>
                        <img src="<?php echo base_url() ?>assest/images/products/<?php echo $id; ?>_thumb.jpg" width="80" onerror="this.src='<?php echo base_url(); ?>assest/images/products/alt.jpg'";>
                    </td>

                    <td><?php echo $body ?></td>

                    <td>
                        <button value="<?php echo $id; ?>" class="btn btn-sm btn-info" onclick="editproduct(this)" class="btn btn-sm btn-info" data-toggle="modal" data-target="#editmodalp"><i class="icofont icofont-edit"></i></button>
                        <button value="<?php echo $id; ?>" class="btn btn-sm btn-danger" onclick="confirm('Are You Sure to Delete !'); deleteproduct(this)" class="btn btn-sm btn-danger"><i class="icofont icofont-trash"></i></button>
                    </td>
                </tr>

            <?php } ?>

            </tbody>
        </table>
    </div>

<?php }

    
    
    
    



    //new start
    public function category(){
        $data=[];
        $data['title']="Category || Admin Panel";
        $data['menuList'] = $this->header->selectMenuheader();
        $data['userlistAll'] = $this->header->userlistAll();
        $this->load->view("header", $data); 

        
        $this->load->view("category");

        $this->load->view("footer");
    }
    public function categoryadded(){
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name','name','trim|required');

        $name = $this->input->post('name');

        if ($this->form_validation->run()==false) {
            $this->productadded();
        }else{

            $productss=array(
                'name' => $name
            );
            $this->db->insert('product',$productss);
        }
        redirect('home/category');
    }
    public function deletecat(){
        $delid = $this->input->post('delid');

        $this->db->where('proid',$delid);
        $this->db->delete('product');
    }
    public function editcat(){
        $editcat = $this->input->post('editcat');

        $this->db->where('proid',$editcat);
        $query = $this->db->get('product');

        foreach ($query->result_array() as $value) {
            $id = $value['proid'];
            $name = $value['name'];
    ?>
        <form action="<?php echo base_url() ?>home/categoryupdate" method="POST" role="form">       
        
            <div class="form-group imageform">
                <label for="">Category Name</label>
                <input type="hidden" name="proid" required value="<?php echo $id; ?>">
                <input type="text" name="name" class="form-control" required value="<?php echo $name; ?>">
            </div>
        
            
        
            <button type="submit" class="btn btn-primary" name="added">UPDATE</button>
        </form>


    <?php
        }
    }
    public function categoryupdate(){
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('proid','proid','trim|required');
        $this->form_validation->set_rules('name','name','trim|required');

        $proid = $this->input->post('proid');
        $name = $this->input->post('name');

        if ($this->form_validation->run()==false) {
            $this->productadded();
        }else{

            $productss=array(
                'name' => $name
            );
            $this->db->where('proid',$proid);
            $this->db->update('product',$productss);
        }
        redirect('home/category');
    }

    public function deletegallery(){
        $delid = $this->input->post('delid');

        $this->db->where('id',$delid);
        $this->db->delete('gallery');
    }
    public function editgallery(){
        $editg = $this->input->post('editg');

        $this->db->where('id',$editg);
        $query = $this->db->get('gallery');

        foreach ($query->result_array() as $value) {
            $id = $value['id'];
            $title = $value['title'];
    ?>
        <form action="<?php echo base_url() ?>home/galleryupdate" method="POST" role="form" enctype="multipart/form-data">
        
            <div class="form-group">
                <label for="">Category Name</label>
                <input type="hidden" name="id" required value="<?php echo $id; ?>">
                <input type="text" name="title" class="form-control" required value="<?php echo $title; ?>">
            </div>
            <div class="form-group">
                <img src="<?php echo base_url() ?>assest/images/gallery/<?php echo $id; ?>.jpg" width="130" onerror="this.src='<?php echo base_url(); ?>assest/images/gallery/alt.jpg'";>
            </div>

            <div class="form-group imageform">
                <label for="">Image</label>
                <input type="file" name="userfile">
            </div>
        
            
        
            <button type="submit" class="btn btn-primary" name="added">UPDATE</button>
        </form>


    <?php
        }
    }
    public function galleryupdate(){
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('id','id','trim|required');
        $this->form_validation->set_rules('title','title','trim|required');

        $id = $this->input->post('id');
        $title = $this->input->post('title');
        if ($this->form_validation->run()==false) {
            $this->all_gallery();
        }else{

            $gallerys=array(
                'title' => $title
            );
            $this->db->where('id',$id);
            $this->db->update('gallery',$gallerys);

            

            $config['upload_path'] = './assest/images/gallery/';

            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '200000';
            $config['max_width'] = '1524000';
            $config['max_height'] = '1000000';

            $this->load->library('upload', $config);
            $this->load->library('image_lib');
                        
            $upload = $this->upload->do_upload('userfile');


            if($upload == true){

                unlink('./assest/images/gallery/'.$id.'.jpg');

                $data1 = array('upload_data' => $this->upload->data());
                $image= $data1['upload_data']['file_name'];

                $configBig = array();
                $configBig['image_library'] = 'gd2';
                $configBig['source_image'] = './assest/images/gallery/'.$image;
                        
                        
                $configBig['create_thumb'] = TRUE;
                $configBig['maintain_ratio'] = FALSE;
                $configBig['width'] = 450;
                $configBig['height'] = 450;
                $configBig['thumb_marker'] = "_big";
                $this->image_lib->initialize($configBig);
                $this->image_lib->resize();
                $this->image_lib->clear();
                unset($configBig);

                $filename1 = $data1['upload_data']['raw_name'].'_big'.$data1['upload_data']['file_ext'];

                

                $rename = $this->input->post('userfile').$id.".jpg";

                rename('./assest/images/gallery/' .$filename1, './assest/images/gallery/' .$rename);

                unlink('./assest/images/gallery/'.$image);

                
            }

            redirect('home/all_gallery');


        }
    }
    public function deleteproduct(){
        $delid = $this->input->post('delid');

        $this->db->where('id',$delid);
        $this->db->delete('products');

        unlink('./assest/images/products/'.$delid.'_big.jpg');
        unlink('./assest/images/products/'.$delid.'_thumb.jpg');
    }
    public function editproduct(){
        $editg = $this->input->post('editg');

        $this->db->where('id',$editg);
        $query = $this->db->get('products');

        foreach ($query->result_array() as $value) {
            $id = $value['id'];
            $proid = $value['proid'];
            $title = $value['title'];
            $body = $value['body'];
    ?>

        <form action="<?php echo base_url() ?>home/productupdate" method="POST" role="form" enctype="multipart/form-data">
            <div class="col-md-6">

                <div class="form-group">
                    <label for="">Product Category</label>
                    <select name="proid" class="form-control">
                        <option value="">Select Category</option>
                        <?php 
                        $this->db->select("*");
                        $product_info=$this->db->get("product");
                        foreach ($product_info->result_array() as $product_cat_all) {
                            $cid = $product_cat_all['proid'];
                            $name = $product_cat_all['name'];
                        ?>
                        <option
                        <?php if ($proid == $cid): ?>
                            selected = selected
                        <?php endif ?>
                        value="<?php echo $cid; ?>"><?php echo $name; ?></option>
                        <?php } ?>

                    </select>
                </div>

                <div class="form-group">
                    <label for="">Product title</label>
                    <input type="hidden" name="id" required value="<?php echo $id; ?>">
                    <input type="text" name="title" class="form-control" required value="<?php echo $title; ?>">
                </div>
                <div class="form-group">
                    <img src="<?php echo base_url() ?>assest/images/products/<?php echo $id; ?>_big.jpg" width="140" onerror="this.src='<?php echo base_url(); ?>assest/images/products/alt.jpg'";>
                </div>
                <div class="form-group">
                    <img src="<?php echo base_url() ?>assest/images/products/<?php echo $id; ?>_thumb.jpg" width="90" onerror="this.src='<?php echo base_url(); ?>assest/images/products/alt.jpg'";>
                </div>

                <div class="form-group imageform">
                    <label for="">Image</label>
                    <input type="file" name="userfile">
                </div>
                
            </div>

            <div class="col-md-6">

                <div class="form-group">
                    <label for="">Description</label>
                    <textarea class="form-control" name="body" height="100"><?php echo $body; ?></textarea>
                </div>
                <script>
                    CKEDITOR.replace( 'body' );
                </script>
                
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary" name="added">UPDATE</button>
            </div>
            
        
            
        </form>


    <?php
        }
    }
    public function productupdate(){
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('id','id','trim|required');
        $this->form_validation->set_rules('proid','proid','trim|required');
        $this->form_validation->set_rules('title','title','trim|required');

        $id = $this->input->post('id');
        $proid = $this->input->post('proid');
        $title = $this->input->post('title');
        $body = $this->input->post('body');

        if ($this->form_validation->run()==false) {
            $this->all_product();
        }else{

            $productss=array(
                'proid' => $proid,
                'title' => $title,
                'body' => $body
            );
            $this->db->where('id',$id);
            $this->db->update('products',$productss);

            

            $config['upload_path'] = './assest/images/products/';

            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '200000';
            $config['max_width'] = '1524000';
            $config['max_height'] = '1000000';

            $this->load->library('upload', $config);
            $this->load->library('image_lib');
                        
            $upload = $this->upload->do_upload('userfile');


            if($upload == true){

                unlink('./assest/images/products/'.$id.'_big.jpg');
                unlink('./assest/images/products/'.$id.'_thumb.jpg');

                $data1 = array('upload_data' => $this->upload->data());
                $image= $data1['upload_data']['file_name'];

                $configBig = array();
                $configBig['image_library'] = 'gd2';
                $configBig['source_image'] = './assest/images/products/'.$image;
                        
                        
                $configBig['create_thumb'] = TRUE;
                $configBig['maintain_ratio'] = FALSE;
                $configBig['width'] = 450;
                $configBig['height'] = 430;
                $configBig['thumb_marker'] = "_big";
                $this->image_lib->initialize($configBig);
                $this->image_lib->resize();
                $this->image_lib->clear();
                unset($configBig);



                $configBig = array();
                $configBig['image_library'] = 'gd2';
                $configBig['source_image'] = './assest/images/products/'.$image;
                $configBig['create_thumb'] = TRUE;
                $configBig['maintain_ratio'] = FALSE;
                $configBig['width'] = 120;
                $configBig['height'] = 100;
                $configBig['thumb_marker'] = "_thumb";
                $this->image_lib->initialize($configBig);
                $this->image_lib->resize();
                $this->image_lib->clear();
                unset($configBig);



                $filename1 = $data1['upload_data']['raw_name'].'_big'.$data1['upload_data']['file_ext'];
                $filename2 = $data1['upload_data']['raw_name'].'_thumb'.$data1['upload_data']['file_ext'];

                

                $rename = $this->input->post('userfile').$id."_big.jpg";
                $rename_thumb = $this->input->post('userfile').$id."_thumb.jpg";

                rename('./assest/images/products/' .$filename1, './assest/images/products/' .$rename);
                rename('./assest/images/products/' .$filename2, './assest/images/products/' .$rename_thumb);

                unlink('./assest/images/products/'.$image);

                
            }

            redirect('home/all_product');



        }
    }
    public function userstatus(){
        $id = $this->input->post('editg');

        $this->db->where("id",$id);
        $category_info=$this->db->get("users");
        foreach ($category_info->result_array() as $category_info_all) {
            $status = $category_info_all['status'];
            if ($status==1) {
               $data=array(
                    'status' => 0
                );

                $this->db->where("id",$id); 
                $this->db->update('users',$data);
            }else{
                $data=array(
                    'status' => 1
                );

                $this->db->where("id",$id); 
                $this->db->update('users',$data);
            }

        }
    }
    public function userdel(){
        $delid = $this->input->post('delid');

        $this->db->where('id',$delid);
        $this->db->delete('users');
    }



} 
?>