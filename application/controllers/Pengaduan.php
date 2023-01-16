<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengaduan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pengaduan_model');
        $this->load->model('No_urut');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pengaduan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pengaduan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pengaduan/index.html';
            $config['first_url'] = base_url() . 'pengaduan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pengaduan_model->total_rows($q);
        $pengaduan = $this->Pengaduan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pengaduan_data' => $pengaduan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'pengaduan/pengaduan_list',
            'judul' => 'Data Pengaduan',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Pengaduan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'no_pengaduan' => $row->no_pengaduan,
		'tgl' => $row->tgl,
		'nama_pengadu' => $row->nama_pengadu,
		'alamat' => $row->alamat,
		'tlp' => $row->tlp,
        'konteks_pengaduan' => $row->konteks_pengaduan,
        'kepada' => $row->kepada,
        'keterangan' => $row->keterangan
	    );
            $this->load->view('pengaduan/pengaduan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengaduan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pengaduan/create_action'),
	        'no_pengaduan' => $this->No_urut->buat_kode_pengaduan(),
	        'tgl' => set_value('tgl'),
	    'nama_pengadu' => set_value('nama_pengadu'),
	    'alamat' => set_value('alamat'),
        'tlp' => set_value('tlp'),
        'konteks_pengaduan' => set_value('konteks_pengaduan'),
        'kepada' => set_value('kepada'),
        'keterangan' => set_value('keterangan'),
        'konten' => 'pengaduan/pengaduan_form',
            'judul' => 'Data Pengaduan',
	);
        $this->load->view('v_index', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'no_pengaduan' => $this->input->post('no_pengaduan',TRUE),
		'tgl' => $this->input->post('tgl',TRUE),
		'nama_pengadu' => $this->input->post('nama_pengadu',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
        'tlp' => $this->input->post('tlp',TRUE),
        'konteks_pengaduan' =>$this->input->post('konteks_pengaduan', TURE),
        'kepada' =>$this->input->post('kepada', TURE),
        'keterangan' =>$this->input->post('keterangan', TURE)
	    );

            $this->Pengaduan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pengaduan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pengaduan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pengaduan/update_action'),
		'no_pengaduan' => set_value('no_pengaduan', $row->no_pengaduan),
		'tgl' => set_value('tgl', $row->tgl),
		'nama_pengadu' => set_value('nama_pengadu', $row->nama_pengadu),
		'alamat' => set_value('alamat', $row->alamat),
        'tlp' => set_value('tlp', $row->tlp),
        'konteks_pengaduan' => set_value('konteks_pengaduan', $row->konteks_pengaduan),
        'kepada' => set_value('kepada', $row->kepada),
        'keterangan' => set_value('keterangan', $row->keterangan),
        'konten' => 'pengaduan/pengaduan_form',
            'judul' => 'Data Pengaduan',
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengaduan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('no_pengaduan', TRUE));
        } else {
        if ($_FILES == '') {
            
            $data = array(
        'tgl' => $this->input->post('tgl',TRUE),
        'nama_pengadu' => $this->input->post('nama_pengadu',TRUE),
        'alamat' => $this->input->post('alamat',TRUE),
        'tlp' => $this->input->post('tlp',TRUE),
        'konteks_pengaduan' =>$this->input->post('konteks_pengaduan', TURE),
        'kepada' =>$this->input->post('kepada', TURE),
        'keterangan' =>$this->input->post('keterangan', TURE)
        );

            $this->Pengaduan_model->update($this->input->post('no_pengaduan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pengaduan'));

        } else {
            $nmfile = "pengaduan_".time();

             $data = array(
        'tgl' => $this->input->post('tgl',TRUE),
        'nama_pengadu' => $this->input->post('nama_pengadu',TRUE),
        'alamat' => $this->input->post('alamat',TRUE),
        'tlp' => $this->input->post('tlp',TRUE),
        'konteks_pengaduan' =>$this->input->post('konteks_pengaduan', TURE),
        'kepada' =>$this->input->post('kepada', TURE),
        'keterangan' =>$this->input->post('keterangan', TURE)
        );

            $this->Pengaduan_model->update($this->input->post('no_pengaduan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pengaduan'));
        }

           
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pengaduan_model->get_by_id($id);

        if ($row) {
            $this->Pengaduan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pengaduan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengaduan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
	$this->form_validation->set_rules('nama_pengadu', 'nama barang', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('tlp', 'tlp', 'trim|required');
    $this->form_validation->set_rules('konteks_pengaduan', 'konteks_pengaduan', 'trim|required');
    $this->form_validation->set_rules('kepada', 'kepada', 'trim|required');
    $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('no_pengaduan', 'no_pengaduan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function pengaduan_excel()
    {
        $data = $this->Pengaduan_model->get_all();
        $objXLS   = new PHPExcel();
        $objSheet = $objXLS->setActiveSheetIndex(0);            

        $no = 1;
        $font = array('font' => array( 'bold' => true, 'color' => array(
            'rgb'  => 'FFFFFF')));
        $objXLS->setActiveSheetIndex(0);        
        $styleArray = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                        'color' => array(
                            'rgb'  => 'FFFFFF' 
                        ),
                    ),
                ),
            ),
        );

        $borderStyle = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb'  => 'FF0000' 
                    ),
                ),
            ),
        );

        $objSheet->setCellValue('A1', 'BUKU PENGADUAN');

        $cell  = 2;
        $objSheet->setCellValue('A'. $cell, 'No');
        $objSheet->setCellValue('B'. $cell, 'Tanggal');
        $objSheet->setCellValue('C'. $cell, 'Nama Pengadu');
        $objSheet->setCellValue('D'. $cell, 'Alamat');
        $objSheet->setCellValue('E'. $cell, 'Telepon');
        $objSheet->setCellValue('F'. $cell, 'Konteks Pengaduan');
        $objSheet->setCellValue('G'. $cell, 'Ditujukan Kepada');
        $objSheet->setCellValue('H'. $cell, 'Keterangan');

        $objXLS->getActiveSheet()
        ->getStyle('A' .  $cell . ':H' . $cell)
        ->applyFromArray($font);

        $objXLS->getActiveSheet()
        ->getStyle('A' .  $cell . ':H' . $cell)
        ->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()
        ->setRGB('000');
        $objXLS->getActiveSheet()->getStyle('A1')->getFont()->setBold( true );

        $cell++;
        $query = $this->db->query("SELECT * FROM pengaduan")->result();
        $total = 0;
        foreach ($query as $r) {
            $objSheet->setCellValueExplicit('A'.$cell, $r->no_pegaduan, PHPExcel_Cell_DataType::TYPE_STRING);
            $objSheet->setCellValueExplicit('B'.$cell, $r->tgl, PHPExcel_Cell_DataType::TYPE_STRING);
            $objSheet->setCellValueExplicit('C'.$cell, $r->nama_pengadu, PHPExcel_Cell_DataType::TYPE_STRING);
            $objSheet->setCellValueExplicit('D'.$cell, $r->alamat, PHPExcel_Cell_DataType::TYPE_STRING);
            $objSheet->setCellValueExplicit('E'.$cell, $r->tlp, PHPExcel_Cell_DataType::TYPE_STRING);
            $objSheet->setCellValueExplicit('F'.$cell, $r->konteks_pengaduan, PHPExcel_Cell_DataType::TYPE_STRING);
            $objSheet->setCellValueExplicit('G'.$cell, $r->kepada, PHPExcel_Cell_DataType::TYPE_STRING);
            $objSheet->setCellValueExplicit('H'.$cell, $r->keterangan, PHPExcel_Cell_DataType::TYPE_STRING);

            $cell++;
            $no++;
            $total += $rk->rencana_kegiatan_anggaran;
        }

        $objXLS->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $objXLS->getActiveSheet()->getColumnDimension('B')->setWidth(50);
        $objXLS->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $objXLS->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $objXLS->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        $objXLS->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        $objXLS->getActiveSheet()->getColumnDimension('G')->setWidth(15);
        $objXLS->getActiveSheet()->getColumnDimension('H')->setWidth(15);

        $font = array('font' => array( 'bold' => true, 'color' => array(
            'rgb'  => 'FFFFFF')));
        $objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel2007');

        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="BUKU PENGADUAN ' . time() .'.xlsx"'); 
        header('Cache-Control: max-age=0'); 
        $objWriter->save('php://output'); 
        exit();     
    }

}

