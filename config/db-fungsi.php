<?php 

function dbm_exec($q){
	return mysqli_query($GLOBALS['konek'], $q);
}

function fetch($ms, $single = false){
	$data = [];
	while($r = mysqli_fetch_object($ms))
		$data[] = $r;
	if($single)
		return $data[0];
	return $data;
}

function getKode($tbl, $prefix){
	$pr = mysqli_fetch_field_direct(dbm_exec('select * from '.$tbl), 0);
	$query = "select max(".$pr->name.") as maksi from ".$tbl;
	// var_dump($pr);
	// die;
	$hasil = dbm_exec($query);
	$data_oto  = mysqli_fetch_array($hasil);
	$do = '';
	if($data_oto['maksi'] != null)
		$do = $data_oto['maksi'];
	else{
		$do .= $prefix;
		for ($i=0; $i < $pr->length - strlen($prefix) ; $i++) { 
			$do .= '0';
		}
	}
	$angka = substr($do, strlen($prefix));
	$angkaAsli = ((int) $angka) + 1;
	$kode = '';
	for($i = 1; $i <= strlen($angka)-strlen($angkaAsli); $i++){
		$kode .= '0';
	}
	return $prefix.$kode.$angkaAsli;
}

function spareparts($id = null){
	$q = "select * from sparepart";
	if($id != null){
		$q .= " where id_sparepart = '".$id."'";
		return fetch(dbm_exec($q), true);
	}
	return fetch(dbm_exec($q));
}

function vendors($id = null){
	$q = "select * from vendor";
	if($id != null){
		$q .= " where id_vendor = '".$id."'";
		return fetch(dbm_exec($q), true);
	}
	return fetch(dbm_exec($q));
}

function perawatan($id = null){
	$q = "SELECT * FROM perawatan a inner join divisi b using(id_divisi) inner join mesin c using(id_mesin) inner join vendor d using(id_vendor) inner join sparepart e using(id_sparepart)";
	if($id != null){
		$q .= " where id_jadwal = '".$id."'";
		// var_dump(dbm_exec($q));
		// var_dump(mysqli_error($GLOBALS['konek']));
		// die;
		return fetch(dbm_exec($q.' ORDER BY id_jadwal'), true);
	}
	$q .= ' ORDER BY id_jadwal';
	return fetch(dbm_exec($q));
}

function perbaikan($id = null){
	$q = "SELECT * FROM perbaikan a inner join mesin c using(id_mesin) inner join vendor d using(id_vendor) inner join sparepart e using(id_sparepart) inner join user f using(id_user)";
	if($id != null){
		$q .= " where id_perbaikan = '".$id."'";
		return fetch(dbm_exec($q.' ORDER BY id_perbaikan'), true);
	}
	return fetch(dbm_exec($q));
}

function divisi(){
	$q = "SELECT * FROM divisi ORDER BY nama_divisi";
	return fetch(dbm_exec($q));
}

function mesin($id = null){
	$q  = "SELECT * FROM mesin";
	if($id != null){
		if(is_array($id)){
			foreach ($id as $key => $value) {
				$q .= " where ".$key." = '".$value."'";
			}
			return fetch(dbm_exec($q.' ORDER BY nama_mesin'));
		}else{
			$q .= " where id_mesin = '".$id."' ORDER BY nama_mesin";
			return fetch(dbm_exec($q), true);
		}
	}
	return fetch(dbm_exec($q.' ORDER BY nama_mesin'));
}