<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Buku_tamu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_tamu_model');
        $this->load->model('No_urut');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'buku_tamu/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'buku_tamu/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'buku_tamu/index.html';
            $config['first_url'] = base_url() . 'buku_tamu/index.html';
        }

        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Buku_tamu_model->total_rows($q);
        $tamu = $this->Buku_tamu_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tamu_data' => $tamu,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'buku_tamu/buku_tamu_list',
            'judul' => 'Buku Tamu',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Buku_tamu_model->get_by_id($id);
        if ($row) {
            $data = array(
		    'no_tamu' => $row->no_tamu,
            'tgl' => $row->tgl,
		    'nama_tamu' => $row->nama_tamu,
		    'alamat' => $row->alamat,
		    'tlp' => $row->tlp,
		    'keperluan' => $row->keperluan,
            'keterangan' => $row->keterangan,
	        );
            $this->load->view('buku_tamu/buku_tamu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('buku_tamu'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('buku_tamu/create_action'),
	        'no_tamu' => $this->No_urut->buat_no_tamu(),
            'tgl' => set_value('tgl'),
	        'nama_tamu' => set_value('nama_tamu'),
	        'alamat' => set_value('alamat'),
	        'tlp' => set_value('tlp'),
	        'keperluan' => set_value('keperluan'),
            'keterangan' => set_value('keterangan'),
            'konten' => 'buku_tamu/buku_tamu_form',
            'judul' => 'Buku Tamu',
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
                'no_tamu' => $this->input->post('no_tamu',TRUE),
                'tgl' => $this->input->post('tgl',TRUE),
		    'nama_tamu' => $this->input->post('nama_tamu',TRUE),
		    'alamat' => $this->input->post('alamat',TRUE),
		    'tlp' => $this->input->post('tlp',TRUE),
		    'keperluan' => $this->input->post('keperluan',TRUE),
            'keterangan' => $this->input->post('keterangan',TRUE),
	        );
            $this->Buku_tamu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('buku_tamu'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Buku_tamu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Edit',
                'action' => site_url('buku_tamu/update_action'),
		        'no_tamu' => set_value('no_tamu', $row->no_tamu),
                'tgl' => set_value('tgl', $row->tgl),
		        'nama_tamu' => set_value('nama_tamu', $row->nama_tamu),
		        'alamat' => set_value('alamat', $row->alamat),
		        'tlp' => set_value('tlp', $row->tlp),
		        'keperluan' => set_value('keperluan', $row->keperluan),
                'keterangan' => set_value('keterangan', $row->keterangan),
                'konten' => 'buku_tamu/buku_tamu_form',
                'judul' => 'Buku Tamu',
	        );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('buku_tamu'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('no_tamu', TRUE));
        } else {
            $data = array(
                'no_tamu' => $this->input->post('no_tamu',TRUE),
                'tgl' => $this->input->post('tgl',TRUE),
		'nama_tamu' => $this->input->post('nama_tamu',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'tlp' => $this->input->post('tlp',TRUE),
		'keperluan' => $this->input->post('keperluan',TRUE),
        'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Buku_tamu_model->update($this->input->post('no_tamu', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('buku_tamu'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Buku_tamu_model->get_by_id($id);

        if ($row) {
            $this->Buku_tamu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('buku_tamu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('buku_tamu'));
        }
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
	    $this->form_validation->set_rules('nama_tamu', 'nama_tamu', 'trim|required');
	    $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	    $this->form_validation->set_rules('tlp', 'tlp', 'trim|required');
	    $this->form_validation->set_rules('keperluan', 'keperluan', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	    $this->form_validation->set_rules('no_tamu', 'no_tamu', 'trim');
	    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function tamu_excel(){

        $data = $this->Buku_tamu_model->get_all();
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
                        'rgb'  => '0000FF' 
                    ),
                ),
            ),
        );

        $objSheet->setCellValue('A1', 'BUKU TAMU');

        $cell  = 2;
        $objSheet->setCellValue('A'. $cell,  'No Tamu');
        $objSheet->setCellValue('B'. $cell, 'Tanggal');
        $objSheet->setCellValue('C'. $cell, 'Nama Tamu');
        $objSheet->setCellValue('D'. $cell, 'Alamat');
        $objSheet->setCellValue('E'. $cell, 'Telepon');
        $objSheet->setCellValue('F'. $cell, 'Keperluan');
        $objSheet->setCellValue('G'. $cell, 'Keterangan');

        $objXLS->getActiveSheet()
        ->getStyle('A' .  $cell . ':G' . $cell)
        ->applyFromArray($font);

        $objXLS->getActiveSheet()
        ->getStyle('A' .  $cell . ':G' . $cell)
        ->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()
        ->setRGB('000');
        $objXLS->getActiveSheet()->getStyle('A1')->getFont()->setBold( true );

        $cell++;
        $query = $this->db->query("SELECT * FROM buku_tamu")->result();
        $total = 0;
        foreach ($query as $r) {
            $objSheet->setCellValueExplicit('A'.$cell, $r->no_tamu, PHPExcel_Cell_DataType::TYPE_STRING);
            $objSheet->setCellValueExplicit('B'.$cell, $r->tgl, PHPExcel_Cell_DataType::TYPE_STRING);
            $objSheet->setCellValueExplicit('C'.$cell, $r->nama_tamu, PHPExcel_Cell_DataType::TYPE_STRING);
            $objSheet->setCellValueExplicit('D'.$cell, $r->alamat, PHPExcel_Cell_DataType::TYPE_STRING);
            $objSheet->setCellValueExplicit('E'.$cell, $r->tlp, PHPExcel_Cell_DataType::TYPE_STRING);
            $objSheet->setCellValueExplicit('F'.$cell, $r->keperluan, PHPExcel_Cell_DataType::TYPE_STRING);
            $objSheet->setCellValueExplicit('G'.$cell, $r->keterangan, PHPExcel_Cell_DataType::TYPE_STRING);

            $cell++;
            $no++;
        }

        $objXLS->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $objXLS->getActiveSheet()->getColumnDimension('B')->setWidth(50);
        $objXLS->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $objXLS->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $objXLS->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        $objXLS->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        $objXLS->getActiveSheet()->getColumnDimension('G')->setWidth(15);

        $font = array('font' => array( 'bold' => true, 'color' => array(

            'rgb'  => 'FFFFFF')));
        $objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel2007');

        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="BUKU TAMU ' . time() .'.xlsx"'); 
        header('Cache-Control: max-age=0'); 
        $objWriter->save('php://output'); 
        exit();
    }

}
