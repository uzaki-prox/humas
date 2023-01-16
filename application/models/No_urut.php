<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class No_urut extends CI_Model
{

    function buat_no_tamu()   {    
      $this->db->select('RIGHT(buku_tamu.no_tamu,5) as kode', FALSE);
      $this->db->order_by('no_tamu','DESC');    
      $this->db->limit(1);     
      $query = $this->db->get('buku_tamu');      //cek dulu apakah ada sudah ada kode di tabel.    
      if($query->num_rows() <> 0){       
       //jika kode ternyata sudah ada.      
       $data = $query->row();      
       $kode = intval($data->kode) + 1;     
      }
      else{       
       //jika kode belum ada      
       $kode = 1;     
      }
      return $kode;  
     }

     function buat_no_psb()   {    
      $this->db->select('RIGHT(psb.no_psb,4) as kode', FALSE);
      $this->db->order_by('no_psb','DESC');    
      $this->db->limit(1);     
      $query = $this->db->get('psb');      //cek dulu apakah ada sudah ada kode di tabel.    
      if($query->num_rows() <> 0){       
       //jika kode ternyata sudah ada.      
       $data = $query->row();      
       $kode = intval($data->kode) + 1;     
      }
      else{       
       //jika kode belum ada      
       $kode = 1;     
      }
      return $kode;  
     }

     function buat_kode_pengaduan()   {    
      $this->db->select('RIGHT(pengaduan.no_pengaduan,5) as kode', FALSE);
      $this->db->order_by('no_pengaduan','DESC');    
      $this->db->limit(1);     
      $query = $this->db->get('pengaduan');      //cek dulu apakah ada sudah ada kode di tabel.    
      if($query->num_rows() <> 0){       
       //jika kode ternyata sudah ada.      
       $data = $query->row();
       $kode = intval($data->kode) + 1;     
      }
      else{       
       //jika kode belum ada      
       $kode = 1;     
      }
      $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);    
      $kodejadi = "PGD".$kodemax;     
      return $kodejadi;  
     }

}
