<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {
    
   public function dashboard_list()
    {
        $this->load->model('Dashboard_model');
        
        $data['posts'] = $this->Dashboard_model->get_todays_reminder();
        $data['today'] = count($data['posts']);
        //print_r($data['posts']);exit();
        $data['categories'] = $this->Dashboard_model->get_all_todays_categories();
        
        $data['upcomings'] = $this->Dashboard_model->get_upcoming_reminder();
        $data['upcoming_count'] = count($data['upcomings']);
        $data['upcoming_categories'] = $this->Dashboard_model->get_all_upcoming_categories();
        //print_r($data['upcoming_categories']);exit();
        
        $data['completed'] = $this->Dashboard_model->get_completed_reminder();
        $data['completed_count'] = count($data['completed']);
        $data['completed_categories'] = $this->Dashboard_model->get_all_completed_categories();
        //print_r($data['completed_categories']);exit();
        
        $data['expired'] = $this->Dashboard_model->get_expired_reminder();
        $data['expired_count'] = count($data['expired']);
        $data['expired_categories'] = $this->Dashboard_model->get_all_expired_categories();
        //print_r($data['expired']);exit();
        
        $this->load->view('Admin/dashboard',$data);
    }
    
    public function showTodaysCategoryReminder()
    {
        $id = $this->uri->segment(2);
        $this->load->model('Dashboard_model');
        $data['posts'] = $this->Dashboard_model->getTodaysCategoryReminder($id);
        //print_r($data['posts']);exit();
        $this->load->view('Admin/show_todays_category_reminder',$data);
    }
    
    public function show_all_todays_reminder()
    {
        $this->load->model('Dashboard_model');
        $data['count_reminder'] = $this->Dashboard_model->count_todays_reminders();
	    $total = $data['count_reminder']->reminders;
	    //print_r($total);exit();
	    $this->load->library('pagination');
        $config['base_url'] = base_url().'showAllCompleted/';
        $config['total_rows'] = $total;
        $config['per_page'] = 10;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 5;
        $config['full_tag_open'] = "<ul class='pagination pull-center'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = "<li class='paginate_button '>";
        $config['num_tag_close'] = "</li>";
        $config['cur_tag_open'] = "<li class='active'><a aria-controls='example' data-dt-idx='3' tabindex='0'>";
        $config['cur_tag_close'] = "</a></li>";
        $config['next_tag_open'] = "<li class='paginate_button '>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li class='paginate_button '>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li class='paginate_button '>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li class='paginate_button '>";
        $config['last_tagl_close'] = "</li>";
        $config['first_link'] = 'FIRST';
        $config['prev_link'] = 'PREVIOUS';
        $config['next_link'] = 'NEXT';
        $config['last_link'] = 'LAST';
        $this->pagination->initialize($config);
        $prod_id = $this->uri->segment(2);
        $data['prod_id']=$prod_id;
    	if(empty($prod_id))
    	{        $product_id = 0;
    	}else{
            $product_id = $prod_id;
    	}
    	$data['links']=$this->pagination->create_links();
        $data['posts'] = $this->Dashboard_model->get_all_todays_reminder($product_id,$config['per_page']);
        $this->load->view('Admin/show_all_todays_reminder',$data);
    }
    
    public function showUpcomingCategoryReminder()
    {
        $id = $this->uri->segment(2);
        $this->load->model('Dashboard_model');
        $data['posts'] = $this->Dashboard_model->getUpcomingCategoryReminder($id);
        $this->load->view('Admin/show_upcoming_category_reminder',$data);
    }
    
    public function show_all_upcoming_reminder()
    {
        $this->load->model('Dashboard_model');
        $data['count_reminder'] = $this->Dashboard_model->count_upcoming_reminders();
	    $total = $data['count_reminder']->reminders;
	    //print_r($total);exit();
	    $this->load->library('pagination');
        $config['base_url'] = base_url().'showAllUpcoming/';
        $config['total_rows'] = $total;
        $config['per_page'] = 10;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 5;
        $config['full_tag_open'] = "<ul class='pagination pull-center'>"; 
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = "<li class='paginate_button '>";
        $config['num_tag_close'] = "</li>";
        $config['cur_tag_open'] = "<li class='active'><a aria-controls='example' data-dt-idx='3' tabindex='0'>";
        $config['cur_tag_close'] = "</a></li>";
        $config['next_tag_open'] = "<li class='paginate_button '>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li class='paginate_button '>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li class='paginate_button '>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li class='paginate_button '>";
        $config['last_tagl_close'] = "</li>";
        $config['first_link'] = 'FIRST';
        $config['prev_link'] = 'PREVIOUS';
        $config['next_link'] = 'NEXT';
        $config['last_link'] = 'LAST';
        $this->pagination->initialize($config);
        $prod_id = $this->uri->segment(2);
        $data['prod_id']=$prod_id;
    	if(empty($prod_id))
    	{        $product_id = 0;
    	}else{
            $product_id = $prod_id;
    	}
    	$data['links']=$this->pagination->create_links();
        $data['posts'] = $this->Dashboard_model->get_all_upcoming_reminder($product_id,$config['per_page']);
        //print_r($data['posts']);exit();
        $this->load->view('Admin/show_all_upcoming_reminder',$data);
    }
    
    public function showCompletedCategoryReminder()
    {
        $id = $this->uri->segment(2);
        //print_r($id);exit();
        $this->load->model('Dashboard_model');
        $data['posts'] = $this->Dashboard_model->getCompletedCategoryReminder($id);
        //print_r($data['posts']);exit();
        $this->load->view('Admin/show_completed_category_reminder',$data);
    }
    
    public function show_all_completed_reminder()
    {
        $this->load->model('Dashboard_model');
        $data['count_reminder'] = $this->Dashboard_model->count_completed_reminders();
	    $total = $data['count_reminder']->reminders;
	    //print_r($total);exit();
	    $this->load->library('pagination');
        $config['base_url'] = base_url().'showAllCompleted/';
        $config['total_rows'] = $total;
        $config['per_page'] = 10;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 5;
        $config['full_tag_open'] = "<ul class='pagination pull-center'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = "<li class='paginate_button '>";
        $config['num_tag_close'] = "</li>";
        $config['cur_tag_open'] = "<li class='active'><a aria-controls='example' data-dt-idx='3' tabindex='0'>";
        $config['cur_tag_close'] = "</a></li>";
        $config['next_tag_open'] = "<li class='paginate_button '>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li class='paginate_button '>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li class='paginate_button '>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li class='paginate_button '>";
        $config['last_tagl_close'] = "</li>";
        $config['first_link'] = 'FIRST';
        $config['prev_link'] = 'PREVIOUS';
        $config['next_link'] = 'NEXT';
        $config['last_link'] = 'LAST';
        $this->pagination->initialize($config);
        $prod_id = $this->uri->segment(2);
        $data['prod_id']=$prod_id;
    	if(empty($prod_id))
    	{        $product_id = 0;
    	}else{
            $product_id = $prod_id;
    	}
    	$data['links']=$this->pagination->create_links();
        $data['posts'] = $this->Dashboard_model->get_all_completed_reminder($product_id,$config['per_page']);
        //print_r($data['posts']);exit();
        $this->load->view('Admin/show_all_completed_reminder',$data);
    }
    
    public function showExpiredCategoryReminder()
    {
        $id = $this->uri->segment(2);
        $this->load->model('Dashboard_model');
        $data['posts'] = $this->Dashboard_model->getExpiredCategoryReminder($id);
        //print_r($data['posts']);exit();
        $this->load->view('Admin/show_expired_category_reminder',$data);
    }
    
    public function show_all_expired_reminder()
    {
        $this->load->model('Dashboard_model');
        $data['count_reminder'] = $this->Dashboard_model->count_expired_reminders();
	    $total = $data['count_reminder']->reminders;
	    //print_r($total);exit();
	    $this->load->library('pagination');
        $config['base_url'] = base_url().'showAllExpiredUnresolved/';
        $config['total_rows'] = $total;
        $config['per_page'] = 10;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 5;
        $config['full_tag_open'] = "<ul class='pagination pull-center'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = "<li class='paginate_button '>";
        $config['num_tag_close'] = "</li>";
        $config['cur_tag_open'] = "<li class='active'><a aria-controls='example' data-dt-idx='3' tabindex='0'>";
        $config['cur_tag_close'] = "</a></li>";
        $config['next_tag_open'] = "<li class='paginate_button '>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li class='paginate_button '>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li class='paginate_button '>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li class='paginate_button '>";
        $config['last_tagl_close'] = "</li>";
        $config['first_link'] = 'FIRST';
        $config['prev_link'] = 'PREVIOUS';
        $config['next_link'] = 'NEXT';
        $config['last_link'] = 'LAST';
        $this->pagination->initialize($config);
        $prod_id = $this->uri->segment(2);
        $data['prod_id']=$prod_id;
    	if(empty($prod_id))
    	{        $product_id = 0;
    	}else{
            $product_id = $prod_id;
    	}
    	$data['links']=$this->pagination->create_links();
        $data['posts'] = $this->Dashboard_model->get_All_Expired_Reminder($product_id,$config['per_page']);
        //print_r($data['posts']);exit();
        $this->load->view('Admin/show_all_unresolved_reminder',$data);
    }

    public function show_categories()
    { 
        $this->load->model('Category_model');
        $data['posts'] = $this->Category_model->get_categories();
    	$this->load->view('Admin/show_categories',$data);
    }
    

    public function add_category()
    {
    	$this->load->view('Admin/add_category');
    }

    public function store_category()
    {
    	$post = $this->input->post();
    	$array = array(
        'category' => $post['category']
    	);
    	$this->load->model('category_model');
    	$inserted = $this->category_model->store_category($array);
    	if($inserted == true)
    	{
    	    $this->session->set_flashdata('category_added','Category Added Successfully');
    		redirect('show_categories');
    	}else{
    		redirect('add_category');
    	}
    }

    public function delete_category()
    {
        $id = $this->uri->segment(2);
    	$this->load->model('category_model');
    	$this->category_model->delete_category($id);
    	$this->session->set_flashdata('category_deleted','Category Deleted Successfully');
    	redirect('show_categories');
    }

    public function update_category()
    {
    	redirect('dashboard');
    }
    
    public function show_maintenance_reminder()
    {
        $this->load->view('Admin/show_maintenance_reminder');
    }
    
    public function show_hr_reminder()
    {
        $this->load->view('Admin/show_hr_reminder');
    }
    
    public function show_marketing_reminder()
    {
        $this->load->view('Admin/show_marketing_reminder');
    }
    
    public function show_sales_reminder()
    {
        $this->load->view('Admin/show_sales_reminder');
    }
    
    public function show_admin_reminder()
    {
        $this->load->view('Admin/show_admin_reminder');
    }
    
    


    
}