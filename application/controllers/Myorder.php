<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Options;
use Dompdf\Dompdf;

class Myorder extends MY_Controller 
{

    private $id;
    
    public function __construct()
    {
        parent::__construct();
        $is_login = $this->session->userdata('is_login');
        $this->id = $this->session->userdata('id');

        if (!$is_login) {
            redirect(base_url(),'refresh');
            return;
        }
    }

    public function index($page = null)
    {
        $data['title']      = "Daftar Order";
        $data['content']    = $this->myorder->where('id_user', $this->id)
                                        ->orderBy('date', 'DESC')->paginate($page)->get();
        $data['total_rows'] = $this->myorder->where('id_user', $this->id)->count();
        $data['pagination'] = $this->myorder->makePagination(base_url('admin/category'), 2, $data['total_rows']);
        $data['page']       = 'pages/users/orders';

        $this->view($data);
    }


    public function detail($invoice)
    {
        $data['order'] = $this->myorder->where('invoice', $invoice)->first();
        if (!$data['order']) {
            $this->session->set_flashdata('warning', 'Data tidak ditemukan.');
			redirect(base_url('/myorder'));
        }

        $this->myorder->table   = 'order_detail';
        $data['order_detail']   = $this->myorder->select([
                                    'order_detail.id_orders', 'order_detail.id_product', 'order_detail.quantity', 'order_detail.message', 'order_detail.sub_total', 'product.title', 'product.image', 'product.price'
                                ])
                                ->join('product')
                                ->where('order_detail.id_orders', $data['order']->id)
                                ->get();

        if ($data['order']->status !== 'waiting') {
            $this->myorder->table = 'order_confirm';
            $data['order_confirm']	= $this->myorder->where('id_orders', $data['order']->id)->first();
        }

        $data['page']           = 'pages/users/order_detail';
        
        $this->view($data);
    }

    public function confirm($invoice)
    {
        $data['order'] = $this->myorder->where('invoice', $invoice)->first();
        if (!$data['order']) {
            $this->session->set_flashdata('warning', 'Data tidak ditemukan.');
			redirect(base_url('/myorder'));
        }

        if ($data['order']->status != 'waiting') {
            $this->session->set_flashdata('warning', 'Bukti transfer sudah dikirim.');
            redirect(base_url("myorder/detail/$invoice"));
        }

        if (!$_POST) {
            $data['input'] = (object) $this->myorder->getDefaultValues();
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }

        if (!empty($_FILES) && $_FILES['image']['name'] !== '') {
			$imageName	= url_title($invoice, '-', true) . '-' . date('YmdHis');
			$upload		= $this->myorder->uploadImage('image', $imageName);
			if ($upload) {
				$data['input']->image	= $upload['file_name'];
			} else {
				redirect(base_url("myorder/confirm/$invoice"));
			}
        }
        
        if (!$this->myorder->validate()) {
			$data['title']			= 'Konfirmasi Order';
			$data['form_action']	= base_url("myorder/confirm/$invoice");
			$data['page']			= 'pages/users/confirm';

			$this->view($data);
			return;
        }
        
        $this->myorder->table = 'order_confirm';

		if ($this->myorder->create($data['input'])) {
			$this->myorder->table = 'orders';
			$this->myorder->where('id', $data['input']->id_orders)->update(['status' => 'paid']);
			$this->session->set_flashdata('success', 'Data berhasil disimpan!');
		} else {
			$this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan');
		}

		redirect(base_url("myorder/detail/$invoice"));
    }

    public function image_required()
	{
		if (empty($_FILES) || $_FILES['image']['name'] === '') {
			$this->session->set_flashdata('image_error', 'Bukti transfer tidak boleh kosong!');
			return false;
		}
		return true;
	}

    public function pdf($invoice)
    {
        $data['order'] = $this->myorder->where('invoice', $invoice)->first();
        if (!$data['order']) {
            $this->session->set_flashdata('warning', 'Data tidak ditemukan.');
            redirect(base_url('/myorder'));
        }

        $this->myorder->table   = 'order_detail';
        $data['order_detail']   = $this->myorder->select([
                                    'order_detail.id_orders', 'order_detail.id_product', 'order_detail.quantity', 'order_detail.message', 'order_detail.sub_total', 'product.title', 'product.image', 'product.price'
                                ])
                                ->join('product')
                                ->where('order_detail.id_orders', $data['order']->id)
                                ->get();

        $options = new \Dompdf\Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new \Dompdf\Dompdf($options);

        // Load view ke variabel
        $html = $this->load->view('pages/users/invoice_pdf', $data, true);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $output = $dompdf->output();

        // Set nama file PDF
        $file_name = 'invoice_' . $invoice . '.pdf';

        // Setel path tempat file PDF akan disimpan
        $file_path = FCPATH . 'assets/pdf/' . $file_name;

        // Simpan file PDF
        file_put_contents($file_path, $output);

        // Tampilkan pesan sukses dan redirect ke halaman detail order
        $this->session->set_flashdata('success', 'PDF Invoice berhasil di-generate.');
        redirect(base_url("assets/pdf/$file_name"));
    }
}

/* End of file Myorder.php */
