<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clustering extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('model_clustering');
	}

  function index() {
    $this->load->view('admin/home');
  }

	public function search() {
		$data["data"] = $this->model_clustering->getSearch();
		$this->load->view("admin/home", $data);
	}

	function viewform_input() {
		$this->load->view('admin/input');
	}

	function viewform_edit_centroid_awal() {
		$where = array('nomor' => 1);
		$data['data'] = $this->model_clustering->edit_data($where, 'centroid_awal')->result();
		$this->load->view('admin/edit_centroid_awal', $data);
	}

	function tambah() {
		$no = $this->input->post('no');
		$provinsi = $this->input->post('provinsi');
		$terkonfirmasi = $this->input->post('terkonfirmasi');
		$tenaga_medis = $this->input->post('tenaga_medis');
		$Obat = $this->input->post('Obat');

		$data = array(
			'no' => $no,
			'provinsi' => $provinsi,
			'terkonfirmasi' => $terkonfirmasi,
			'tenaga_medis' => $tenaga_medis,
			'Obat' => $Obat
		);
		$this->model_clustering->input_data($data, 'data_corona');
		redirect('home');
	}

	function edit_centroid_awal() {
		$nomor = $this->input->post('nomor');
		$c1a = $this->input->post('c1a');
		$c1b = $this->input->post('c1b');
		$c1c = $this->input->post('c1c');
		$c2a = $this->input->post('c2a');
		$c2b = $this->input->post('c2b');
		$c2c = $this->input->post('c2c');
		$c3a = $this->input->post('c3a');
		$c3b = $this->input->post('c3b');
		$c3c = $this->input->post('c3c');

		$data = array(
			'nomor' => $nomor,
			'c1a' => $c1a,
			'c1b' => $c1b,
			'c1c' => $c1c,
			'c2a' => $c2a,
			'c2b' => $c2b,
			'c2c' => $c2c,
			'c3a' => $c3a,
			'c3b' => $c3b,
			'c3c' => $c3c
		);
		$this->model_clustering->edit_centroid_awal($data, 'centroid_awal');
		redirect('iterasi_awal');
	}

	function edit($no) {
		$where = array('no' => $no);
		$data['data'] = $this->model_clustering->edit_data($where, 'data_corona')->result();
		$this->load->view('admin/edit', $data);
	}

	function update(){
		$no = $this->input->post('no');
		$provinsi = $this->input->post('provinsi');
		$terkonfirmasi = $this->input->post('terkonfirmasi');
		$tenaga_medis = $this->input->post('tenaga_medis');
		$Obat = $this->input->post('Obat');

		$data = array(
			'no' => $no,
			'provinsi' => $provinsi,
			'terkonfirmasi' => $terkonfirmasi,
			'tenaga_medis' => $tenaga_medis,
			'Obat' => $Obat
		);

  	$where = array(
  		'no' => $no
  	);

  	$this->model_clustering->update_data($where,$data,'data_corona');
  	redirect('home');
  }

	function hapus($no) {
		$where = array('no' => $no);
		$this->model_clustering->hapus_data($where,'data_corona');
		redirect('home');
	}

  function hitung_rata() {
    $data_corona = $this->db->get('data_corona');
    $rata_rata = "";

    if(count($data_corona->result()) < 0) {
      $nilai = floor(($avg->terkonfirmasi + $avg->tenaga_medis + $avg->Obat) / 3);
      $rata_rata = "INSERT INTO rata_rata (no, rata_rata) VALUES ('".$avg->no."', '".$nilai."')";
      $this->db->query($rata_rata);
    }
    else {
      $this->db->query('TRUNCATE TABLE rata_rata');
      foreach($data_corona->result() as $avg) {
        $nilai = floor(($avg->terkonfirmasi + $avg->tenaga_medis + $avg->Obat) / 3);
        $rata_rata = "INSERT INTO rata_rata (no, rata_rata) VALUES ('".$avg->no."', '".$nilai."')";
        $this->db->query($rata_rata);
      }
    }

    $data['data_corona'] = $this->db->query('SELECT * FROM data_corona LEFT JOIN rata_rata ON data_corona.no = rata_rata.no');
    $this->load->view('admin/hitung_rata', $data);
  }

  function hitung_centroid() {
    $jumlah_cluster = 3;
		//0-50    = Butuh Bantuan
		//51-100   = Tercukupi
		$data['c1'] = rand(20,49);
		$data['c2'] = rand(50,79);
		$data['c3'] = rand(80,89);
		$data_corona = $this->db->query('SELECT * FROM data_corona LEFT JOIN rata_rata ON data_corona.no = rata_rata.no');
		$st = "";

		$this->db->query('TRUNCATE TABLE hasil');
		foreach($data_corona->result() as $ldata) {
      $jarak1 = abs($ldata->rata_rata - $data['c1']);
			$jarak2 = abs($ldata->rata_rata - $data['c2']);
			$jarak3 = abs($ldata->rata_rata - $data['c3']);

			$urutan_awal = array($jarak1, $jarak2, $jarak3);
			$urutan = $urutan_awal;

      for ($i = 1; $i<=$jumlah_cluster - 1; $i++) {
        for ($j = 0; $j<=$jumlah_cluster- 2; $j++) {
          if ($urutan[$j] > $urutan[$j + 1]) {
            $temp               = $urutan[$j];
            $urutan[$j]         = $urutan[$j + 1];
						$urutan[$j + 1] = $temp;
					}
        }
      }

      for ($i = 0; $i < $jumlah_cluster; $i++) {
        for($j = 0; $j < $jumlah_cluster; $j++) {
          if($urutan[0] == $urutan_awal[$j]) {
            if($j == 0)       $predikat =  "Sangat Butuh";
						else if($j == 1)  $predikat =  "Butuh";
						else if($j == 2)  $predikat =  "Tercukupi";
          }
        }
      }
			$this->db->query("INSERT INTO hasil (no, predikat, jarak1, jarak2, jarak3) VALUES('".$ldata->no."', '".$predikat."', '".$jarak1."', '".$jarak2."', '".$jarak3."')");
    }
		$data['data_corona'] = $this->db->query("SELECT * FROM data_corona LEFT JOIN (rata_rata, hasil) ON data_corona.no = rata_rata.no AND data_corona.no = hasil.no");
		$this->load->view('admin/hitung_centroid', $data);
	}

  function iterasi_awal() {
    $data = array(
			'data_corona' => $this->model_clustering->get('data_corona'),
			'centroid_awal' => $this->model_clustering->get('centroid_awal')
		);
    $this->load->view('admin/iterasi_awal', $data);
  }

  function iterasi_lanjut() {
		$data['data_corona'] = $this->db->get('data_corona');

		$maxhc = "";
		$maxhc = $this->db->query('SELECT MAX(nomor) AS maxhc FROM hasil_centroid');
		foreach($maxhc->result() as $id) {
      $maxhc = $id->maxhc;
    }
		$this->db->where('nomor', $maxhc);
		$data['centroid'] = $this->db->get('hasil_centroid');
		$data['id'] = $maxhc + 1;

		$maxit = "";
		$maxit = $this->db->query('SELECT MAX(iterasi) AS maxit FROM centroid_temp');
		foreach($maxit->result() as $id) {
      $maxit = $id->maxit;
    }

		$maxit_temp = $maxit - 1;
		$this->db->where('iterasi', $maxit_temp);
		$maxit_previous = $this->db->get('centroid_temp');
		$c1_previous = array();
		$c2_previous = array();
		$c2_previous = array();
		$c3_previous = array();
		$i = 0;
		foreach($maxit_previous->result() as $previous) {
      $c1_previous[$i] = $previous->c1;
			$c2_previous[$i] = $previous->c2;
			$c3_previous[$i] = $previous->c3;
			$i++;
    }

		$this->db->where('iterasi', $maxit);
		$maxit_next = $this->db->get('centroid_temp');
		$c1_next = array();
		$c2_next = array();
		$c2_next = array();
		$c3_next = array();
		$i = 0;
		foreach($maxit_next->result() as $next) {
			$c1_next[$i] = $next->c1;
			$c2_next[$i] = $next->c2;
			$c3_next[$i] = $next->c3;
			$i++;
    }

		if($c1_previous == $c1_next || $c2_previous == $c2_next || $c2_previous == $c2_next) {
      ?>
        <script>alert("Proses iterasi berakhir pada tahap ke-<?php echo $maxit; ?>");</script>
      <?php
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."iterasi_hasil'>";
		}
    else {
      $this->load->view('admin/iterasi_lanjut', $data);
		}
	}

  function iterasi_hasil() {
		$iterasi_hasil = $this->db->query("SELECT provinsi, c1, c2, c3 FROM data_corona INNER JOIN centroid_temp ON centroid_temp.no = data_corona.no WHERE iterasi=(SELECT MAX(iterasi) FROM centroid_temp)")->result();
		$data = array(
			'iterasi_hasil'	=> $iterasi_hasil
		);
    $data['data'] = $this->db->query('SELECT * FROM centroid_temp GROUP BY iterasi');
    $this->load->view('admin/iterasi_hasil', $data);
	}

}
