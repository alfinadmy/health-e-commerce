<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends MY_Controller 
{

    public function obat($page = null)
    {
        $data['title']      = 'Produk Obat-obatan & Vitamin';
        $data['content']    = $this->shop->paginate($page)->where('type', 'Obat')->where('delete', 1)->get();
        $data['total_rows'] = $this->shop->where('type', 'obat')->where('delete', 1)->count();
        $data['pagination'] = $this->shop->makePagination(
            base_url('shop/obat'), 3, $data['total_rows']
        );
        $data['page']       = 'pages/users/obat';

        $this->view($data);
    }

    public function alat($page = null)
    {
        $data['title']      = 'Produk Alat Kesehatan';
        $data['content']    = $this->shop->paginate($page)->where('type', 'Alat')->where('delete', 1)->get();
        $data['total_rows'] = $this->shop->where('type', 'alat')->where('delete', 1)->count();
        $data['pagination'] = $this->shop->makePagination(
            base_url('shop/obat'), 3, $data['total_rows']
        );
        $data['page']       = 'pages/users/alat';

        $this->view($data);
    }

    public function category($category, $page = null)
	{
		$data['title']		= 'Belanja';
		$data['content']	= $this->shop->select(
				[
					'product.id', 'product.title AS product_title', 
					'product.image', 'product.price', 'product.slug As product_slug', 'category.title AS category_title', 'category.slug AS category_slug'
				]
			)
			->join('category')
            ->where('product.is_available', 1)
            ->where('delete', 1)
			->where('category.slug', $category)
			->paginate($page)
			->get();
		$data['total_rows']	= $this->shop->where('product.is_available', 1)->where('category.slug', $category)->join('category')->count();
		$data['pagination']	= $this->shop->makePagination(
			base_url("shop/category/$category"), 4, $data['total_rows']
		);
		$data['category']	= ucwords(str_replace('-', ' ', $category));
		$data['page']		= 'pages/users/shop';
		
		$this->view($data);
    }
    
    public function search($page = null)
	{
		if (isset($_POST['keyword'])) {
			$this->session->set_userdata('keyword', $this->input->post('keyword'));
		} else {
			redirect(base_url('/'));
		}

		$keyword	= $this->session->userdata('keyword');
		$data['title']		= 'Pencarian: Produk';
		$data['content']	= $this->shop->select(
				[
					'product.id', 'product.title AS product_title', 
					'product.image', 'product.price', 'product.slug As product_slug', 'category.title AS category_title', 'category.slug AS category_slug'
				]
			)
			->join('category')
			->like('product.title', $keyword)
			->orLike('product.description', $keyword)
			->paginate($page)
			->get();
		$data['total_rows']	= $this->shop->like('product.title', $keyword)->orLike('product.description', $keyword)->count();
		$data['pagination']	= $this->shop->makePagination(
			base_url('shop/search'), 3, $data['total_rows']
		);
		$data['page']		= 'pages/users/shop';
		
		$this->view($data);
	}

    public function detail($slug)
    {
        $data['title']      = 'Detail Produk';
        $data['content']    = $this->shop->select(
            ['product.id', 'product.title AS product_title', 'product.description', 'product.price', 'product.is_available', 'product.image', 'category.title AS category_title']
        )
        ->join('category')
        ->where('product.slug', $slug)
        ->first();
        $data['page']       = 'pages/users/detail';

        $this->view($data);
    }

}

/* End of file Shop.php */
